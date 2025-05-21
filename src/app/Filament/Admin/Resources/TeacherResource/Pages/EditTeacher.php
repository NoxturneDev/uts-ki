<?php

namespace App\Filament\Admin\Resources\TeacherResource\Pages;

use App\Filament\Admin\Resources\TeacherResource;
use Filament\Notifications\Notification;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditTeacher extends EditRecord
{
    protected static string $resource = TeacherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('requestApiToken')
                ->label('Request New API Token')
                ->color('danger')
                ->icon('heroicon-m-key')
                ->requiresConfirmation()
                ->action(function (){
                    $this->record->secret_token = Str::random(10);
                    $this->record->save();
                    $this->fillForm();
                    Notification::make()
                        ->title('New secret Token Generated')
                        ->success()
                        ->send();
                }),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['secret_token'])) {
            $data['secret_token'] = Str::random(10);
        }
        return $data;
    }
}
