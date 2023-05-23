<?php

namespace App\Filament\Resources\RuanginapResource\Pages;

use App\Filament\Resources\RuanginapResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageRuanginaps extends ManageRecords
{
    protected static string $resource = RuanginapResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
