<?php

namespace App\Filament\Resources\AlatkesehatanResource\Pages;

use App\Filament\Resources\AlatkesehatanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAlatkesehatans extends ManageRecords
{
    protected static string $resource = AlatkesehatanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
