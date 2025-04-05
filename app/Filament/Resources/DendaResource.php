<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Denda;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DendaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DendaResource\RelationManagers;

class DendaResource extends Resource
{
    protected static ?string $model = Denda::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';
    protected static ?string $navigationGroup = 'Denda';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('pengembalian.peminjaman.user');
    }

    public static function getNavigationLabel(): string{
        return "Denda";
    }

    public static function getPluralModelLabel(): string{
        return "Denda";
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pengembalian.peminjaman.buku.judul_buku'),
                TextColumn::make('pengembalian.peminjaman.user.name')->label('Peminjam'),
                TextColumn::make('pengembalian.peminjaman.buku.harga_buku')->label('Harga Buku'),
                TextColumn::make('pengembalian.kategori_denda.nama_kategori')->label('Kondisi Buku'),
                TextColumn::make('pengembalian.denda')->label('Total Denda'),
                TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Sudah Dibayar' => 'success',
                    'Belum Dibayar' => 'danger',
                })
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDendas::route('/'),
            'create' => Pages\CreateDenda::route('/create'),
            'edit' => Pages\EditDenda::route('/{record}/edit'),
        ];
    }
}
