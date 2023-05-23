<?php

namespace App\Filament\Resources\ObatResource\Pages;

use App\Filament\Resources\ObatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageObats extends ManageRecords
{
    protected static string $resource = ObatResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
