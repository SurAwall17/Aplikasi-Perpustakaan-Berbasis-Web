<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\KategoriDenda;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KategoriDendaResource\Pages;
use App\Filament\Resources\KategoriDendaResource\RelationManagers;

class KategoriDendaResource extends Resource
{
    protected static ?string $model = KategoriDenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Denda';


    public static function getNavigationLabel(): string{
        return "Kategori Denda";
    }

    public static function getPluralModelLabel(): string{
        return "Kategori Denda";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nama_kategori')->required(),
                        TextInput::make('jumlah_denda')->numeric()->required(),
                        
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_kategori'),
                TextColumn::make('jumlah_denda')
                ->formatStateUsing(function ($state) {
                    return ($state * 100) . '% x Harga Buku';
                }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListKategoriDendas::route('/'),
            'create' => Pages\CreateKategoriDenda::route('/create'),
            'edit' => Pages\EditKategoriDenda::route('/{record}/edit'),
        ];
    }
}
