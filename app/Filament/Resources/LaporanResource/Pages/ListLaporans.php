<?php

namespace App\Filament\Resources\LaporanResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\LaporanResource;

class ListLaporans extends ListRecords
{
    protected static string $resource = LaporanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            Action::make('Export')
            ->label('Ekspor Data')
            ->icon('heroicon-m-arrow-down-tray')
            ->action(fn () => redirect('/export-link')),
        ];
    }
}
