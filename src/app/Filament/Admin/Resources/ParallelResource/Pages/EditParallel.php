<?php

namespace App\Filament\Admin\Resources\ParallelResource\Pages;

use App\Filament\Admin\Resources\ParallelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParallel extends EditRecord
{
    protected static string $resource = ParallelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
