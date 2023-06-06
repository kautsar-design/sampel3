<?php

namespace App\Filament\Widgets;

use App\Models\Rekamedis;
use Closure;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestRekamediss extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';
    protected function getTableQuery(): Builder
    {
        return Rekamedis::query()
            ->latest()
            ->take(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')->sortable()->toggleable(),
            Tables\Columns\TextColumn::make('name')
                ->label('Nama Pasien')
                ->toggleable(),
            Tables\Columns\TextColumn::make('gender')
                ->label('Jenis Kelamin')
                ->toggleable(),
            Tables\Columns\TextColumn::make('date_of_birth')
                ->label('Tanggal Lahir')
                ->dateTime('d-M-Y')
                ->sortable()
                ->searchable()
                ->toggleable(),
            Tables\Columns\TextColumn::make('ruanginap_id')
                ->label('Ruang Inap')
                ->toggleable(),
            Tables\Columns\TextColumn::make('complaint')
                ->label('Keluhan')
                ->toggleable(),
            Tables\Columns\TextColumn::make('action')
                ->label('Tindakan')
                ->toggleable(),
            TextColumn::make('created_at')
                ->label('Tanggal Periksa')
                ->dateTime('d-M-Y')
                ->sortable()
                ->searchable(),
        ];
    }
    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
