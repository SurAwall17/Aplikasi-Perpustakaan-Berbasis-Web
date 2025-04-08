<?php

namespace App\Filament\Resources\DendaResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use App\Filament\Resources\DendaResource;
use Filament\Resources\Pages\ListRecords;

class ListDendas extends ListRecords
{
    protected static string $resource = DendaResource::class;

    protected function getHeaderActions(): array
    {
        return [
           
        ];
    }
    
}
