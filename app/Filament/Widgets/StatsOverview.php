<?php

namespace App\Filament\Widgets;

use App\Models\Alatkesehatan;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Rekamedis;
use App\Models\Ruanginap;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getCards(): array
    {
        return [
            Card::make('Total Pasien', Rekamedis::count())
                ->description('32k increase')
                ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('Total Obat', Obat::count())
                ->description('7% increase')
                ->descriptionIcon('heroicon-s-trending-down'),
            Card::make('Total ruang Inap', Ruanginap::count())
                ->description('3% increase')
                ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('Total alat kehatan', Alatkesehatan::count())
                ->description('3% increase')
                ->descriptionIcon('heroicon-s-trending-up'),
             ];
    }
}
