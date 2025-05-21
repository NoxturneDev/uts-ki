<?php

namespace App\Filament\Admin\Resources\JamPelajaranResource\Pages;

use App\Filament\Admin\Resources\JamPelajaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJamPelajarans extends ListRecords
{
    protected static string $resource = JamPelajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
