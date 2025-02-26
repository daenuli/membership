<?php

namespace App\Filament\Resources\MemberResource\Pages;

use App\Filament\Resources\MemberResource;
use Filament\Actions;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Pages\Concerns\HasWizard;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

// https://github.com/filamentphp/demo/blob/main/app/Filament/Resources/Shop/OrderResource/Pages/CreateOrder.php
class CreateMember extends CreateRecord
{
    use HasWizard;

    protected static string $resource = MemberResource::class;

    public function form(Form $form): Form
    {
        return parent::form($form)
            ->schema([
                Wizard::make($this->getSteps())
                    ->startOnStep($this->getStartStep())
                    ->cancelAction($this->getCancelFormAction())
                    ->submitAction($this->getSubmitFormAction())
                    ->skippable($this->hasSkippableSteps())
                    ->contained(false),
            ])
            ->columns(null);
    }

    protected function getSteps(): array
    {
        return [
            Step::make('Data Pribadi')
                ->schema([
                    Section::make('Data Pribadi')->schema(MemberResource::getDetailsFormSchema())->columns()
                ]),
            Step::make('Data Keluarga')
                ->schema([
                    Section::make('Data Keluarga')->relationship('family')->schema(MemberResource::familyForm())->columns(2),
                ]),
            Step::make('Pendidikan')
                ->schema([
                    Section::make('Riwayat Pendidikan')->schema([
                        MemberResource::educationForm(),
                    ]),
                ]),
            Step::make('Organisasi')
                ->schema([
                    Section::make('Riwayat Organisasi')->schema([
                        MemberResource::organizationForm(),
                    ]),
                ]),
            Step::make('Ekonomi')
                ->schema([
                    Section::make('Ekonomi')->relationship('economy')->schema(MemberResource::economicForm())->columns(2),
                ]),
            Step::make('Pembinaan')
                ->schema([
                    Section::make('Pembinaan')->relationship('guidancehistories')->schema(MemberResource::guidanceForm())->columns(2),
                ]),
            Step::make('Amanah')
                ->schema([
                    Section::make('Amanah')->relationship('responsibilities')->schema(MemberResource::responsibilityForm())->columns(3),
                ]),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::user()->id;
        return $data;
    }
}
