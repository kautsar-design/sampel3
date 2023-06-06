<?php

namespace App\Filament\Resources\RekamedisResource\Pages;

use App\Filament\Resources\RekamedisResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRekamedis extends ListRecords
{
    protected static string $resource = RekamedisResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
