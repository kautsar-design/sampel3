<?php

namespace App\Filament\Resources\RekamedisResource\Pages;

use App\Filament\Resources\RekamedisResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRekamedis extends EditRecord
{
    protected static string $resource = RekamedisResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
