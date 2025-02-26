<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Filament\Resources\MemberResource\Widgets\MemberGenderStats;
use App\Models\Education;
use App\Models\Member;
use App\Models\Subdistrict;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
        return Filament::auth()->user()->hasRole('member') && is_null(Filament::auth()->user()->member); // Allow only 'admin' role
    }

    // public static function canCreate(): bool
    // {
    //     dd(auth()->user()?->can('create'));
    //     return auth()->user()?->can('create', Member::class);
    // }

    public static function canEdit($record): bool
    {
        $user = Filament::auth()->user();

        // Admins cannot edit
        if ($user->hasRole('admin')) {
            return false;
        }

        // Allow other roles but only if they created the record
        return $record->user_id === $user->id;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        $user = Filament::auth()->user();
        return $table
            ->query(self::getQuery())
            ->searchable($user->hasRole('admin'))
            ->paginated($user->hasRole('admin'))
            ->columns([
                TextColumn::make('full_name')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('birth_date')
                    ->label('Nama Lengkap')
                    ->sortable(),
                TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => $state === 'male' ? 'Laki-laki' : 'Perempuan'),
                TextColumn::make('marital_status')
                    ->label('Status Perkawinan')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => $state === 'single' ? 'Belum Menikah' : ($state === 'married' ? 'Menikah' : 'Cerai')),
            ])
            ->filters([
                SelectFilter::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        'male' => 'Laki-laki',
                        'female' => 'Perempuan',
                    ]),
                SelectFilter::make('marital_status')
                    ->label('Status Perkawinan')
                    ->options([
                        'single' => 'Belum Menikah',
                        'married' => 'Menikah',
                        'divorced' => 'Cerai',
                    ]),
                SelectFilter::make('subdistrict_id')
                    ->label('Kecamatan')
                    ->relationship('subdistrict', 'name'),
                SelectFilter::make('blood_type')
                    ->label('Golongan Darah')
                    ->options([
                        'A' => 'A',
                        'B' => 'B',
                        'AB' => 'AB',
                        'O' => 'O',
                    ]),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'view' => Pages\ViewMember::route('/{record}'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }

    public static function getDetailsFormSchema(): array
    {
        return [
            TextInput::make('full_name')->label('Nama Lengkap')->readOnly()->default(auth()->user()->name)->required(),
            TextInput::make('nick_name')->label('Nama Panggilan')->required(),
            TextInput::make('birth_place')->label('Tempat Lahir')->required(),
            DatePicker::make('birth_date')->label('Tanggal Lahir')->required(),
            Radio::make('gender')->label('Jenis Kelamin')->options([
                'male' => 'Laki-laki',
                'female' => 'Perempuan',
            ])->required(),
            Radio::make('marital_status')->label('Status Perkawinan')->options([
                'single' => 'Belum Menikah',
                'married' => 'Menikah',
                'divorced' => 'Cerai',
            ])->required(),
            TextInput::make('height')->label('Tinggi Badan')->numeric()->required(),
            TextInput::make('weight')->label('Berat Badan')->numeric()->required(),
            Radio::make('blood_type')->label('Golongan Darah')
                ->options([
                    'A' => 'A',
                    'B' => 'B',
                    'AB' => 'AB',
                    'O' => 'O',
                ])
                ->inline()->inlineLabel(false)->required(),
            Select::make('subdistrict_id')->label('Kecamatan')->options(Subdistrict::all()->pluck('name', 'id'))->required(),
            TextInput::make('street')->label('Nama Jalan')->required(),
            TextInput::make('rt_rw')->label('RT/RW'),
            TextInput::make('neighborhood')->label('Lingkungan'),
            TextInput::make('village')->label('Kelurahan'),
        ];
    }

    public static function educationForm(): Repeater
    {
        return Repeater::make('Pendidikan')
            ->relationship('educations')
            ->schema([
                Select::make('education_id')
                    ->label('Jenjang Pendidikan')
                    ->options(Education::query()->pluck('name', 'id'))
                    ->required()
                    ->reactive()
                    ->searchable(),
                TextInput::make('start_year')
                    ->label('Tahun Mulai')
                    ->numeric()
                    ->required(),
                TextInput::make('end_year')
                    ->label('Tahun Selesai')
                    ->numeric()
                    ->nullable(),
            ])
            ->hiddenLabel()
            ->columns(3);
    }

    public static function familyForm(): array
    {
        return [
            TextInput::make('spouse_name')->label('Nama Istri/Suami')->required(),
            TextInput::make('number_of_sons')->label('Jumlah Anak Laki-laki')->numeric()->required(),
            TextInput::make('number_of_daughters')->label('Jumlah Anak Perempuan')->numeric()->required(),
            TextInput::make('number_of_siblings')->label('Jumlah Saudara')->numeric()->required(),
            Radio::make('house_status')->label('Status Rumah')->options([
                'owned' => 'Milik Sendiri',
                'rented' => 'Sewa/Kontrak',
                'living_with_parents_or_in_laws' => 'Numpang Dengan Orang Tua / Istri',
            ])->required()->columnSpanFull(),
        ];
    }

    public static function organizationForm(): Repeater
    {
        return Repeater::make('organizations')
            ->relationship('organizations')
            ->schema([
                TextInput::make('name')->label('Nama Organisasi')->required()->columnSpanFull(),
            ])
            ->hiddenLabel()
            ->columns();
    }

    public static function economicForm(): array
    {
        return [
            TextInput::make('occupation')->label('Pekerjaan')->required(),
            TextInput::make('average_monthly_income')->label('Penghasilan Rata-Rata Bulanan')->numeric()->required(),
            Toggle::make('bpjs')->label('BPJS'),
            Toggle::make('pkh')->label('PKH'),
        ];
    }

    public static function guidanceForm(): array
    {
        return [
            DatePicker::make('start_date')->label('Mulai Ikut Pembinaan')->required(),
            TextInput::make('membership_level')->label('Jenjang Anggota')->required(),
            DatePicker::make('last_promotion_date')->label('Pelantikan Jenjang Terakhir')->required(),
            TextInput::make('upa_mentor')->label('Pembina UPA')->required(),
        ];
    }

    public static function responsibilityForm(): array
    {
        return [
            TextInput::make('upa_supervisor')->label('Pembina UPA')->required(),
            TextInput::make('cadre_structure')->label('Struktur Kaderisasi')->required(),
            TextInput::make('party_structure')->label('Struktur Partai')->required(),
        ];
    }

    protected static function getQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->when(
                FacadesAuth::user()->role !== 'admin',
                fn ($query) => $query->where('user_id', auth()->user()->id)
            );
    }

}
