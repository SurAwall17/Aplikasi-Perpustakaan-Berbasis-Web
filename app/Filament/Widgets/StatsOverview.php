<?php

namespace App\Filament\Widgets;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget

{
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        return [
            Stat::make('Buku', Buku::count() . ' Buku')
            ->description("Total Jumlah Buku")
            ->descriptionIcon('heroicon-o-book-open', IconPosition::Before)
            ->color('warning'),

            Stat::make('Users', User::count() . ' Users')
            ->description("Total Jumlah Users")
            ->descriptionIcon('heroicon-o-users', IconPosition::Before)
            ->color('success'),

            Stat::make('Peminjaman', Peminjaman::count() . ' Peminjaman')
            ->description("Total Jumlah Peminjaman")
            ->descriptionIcon('heroicon-o-inbox-arrow-down', IconPosition::Before)
            ->color('primary'),
        ];
    }
}
