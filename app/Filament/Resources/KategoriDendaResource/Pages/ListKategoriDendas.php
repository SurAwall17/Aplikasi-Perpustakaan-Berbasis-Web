<?php

namespace App\Filament\Resources\KategoriDendaResource\Pages;

use App\Filament\Resources\KategoriDendaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriDendas extends ListRecords
{
    protected static string $resource = KategoriDendaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
