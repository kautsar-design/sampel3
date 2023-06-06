<?php

namespace App\Filament\Resources\RekamedisResource\Pages;

use App\Filament\Resources\RekamedisResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRekamedis extends CreateRecord
{
    protected static string $resource = RekamedisResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
