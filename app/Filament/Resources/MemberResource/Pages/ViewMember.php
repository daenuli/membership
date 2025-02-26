<?php

namespace App\Filament\Resources\MemberResource\Pages;

use App\Filament\Resources\MemberResource;
use App\Models\Member;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Pages\ViewRecord;

class ViewMember extends ViewRecord
{
    protected static string $resource = MemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->url(MemberResource::getUrl())
                ->button(),
            Actions\EditAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make('Data Pribadi')
                            ->schema(MemberResource::getDetailsFormSchema())
                            ->columns(),
                        Section::make('Data Keluarga')
                            ->relationship('family')
                            ->schema(MemberResource::familyForm())
                            ->columns(2),
                        Section::make('Riwayat Pendidikan')
                            ->schema([
                                MemberResource::educationForm(),
                            ]),
                        Section::make('Riwayat Organisasi')
                            ->schema([
                                MemberResource::organizationForm(),
                            ]),
                        Section::make('Ekonomi')
                            ->relationship('economy')
                            ->schema(MemberResource::economicForm())
                            ->columns(2),
                        Section::make('Pembinaan')
                            ->relationship('guidancehistories')
                            ->schema(MemberResource::guidanceForm())
                            ->columns(2),
                        Section::make('Tugas dan Tanggung Jawab')
                            ->relationship('responsibilities')
                            ->schema(MemberResource::responsibilityForm())
                            ->columns(2),
                    ])
                    ->columnSpan(['lg' => fn (?Member $record) => $record === null ? 3 : 2])
            ]);
    }
}
