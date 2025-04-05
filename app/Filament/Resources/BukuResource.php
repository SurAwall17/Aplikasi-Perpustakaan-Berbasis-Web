<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Buku;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BukuResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BukuResource\RelationManagers;

class BukuResource extends Resource
{
    protected static ?string $model = Buku::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Management';


    public static function getNavigationLabel(): string
    {
        return "Buku";
    }

    public static function getPluralModelLabel(): string
    {
        return 'Buku';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('judul_buku')
                            ->required(),

                        TextInput::make('pengarang')
                            ->required(),

                        TextInput::make('tahun_terbit')
                            ->numeric()
                            ->step(1)
                            ->rules(['min:1900', 'max:'.date('Y')])
                            ->required(),

                        TextInput::make('no_inventaris')
                            ->required(),

                        TextInput::make('harga_buku')
                            ->required()
                            ->rules(['min:1000'])
                            ->numeric(),

                        DatePicker::make('tgl_masuk')
                            ->format('Y/m/d')
                            ->required()
                            ->rules(['after_or_equal:1900-01-01', 'before_or_equal:'.date('Y/m/d')]),
                            
                        TextInput::make('stok')->required()->numeric(),
                    ])
                    ->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul_buku'),
                TextColumn::make('pengarang'),
                TextColumn::make('tahun_terbit'),
                TextColumn::make('no_inventaris'),
                TextColumn::make('harga_buku'),
                TextColumn::make('tgl_masuk'),
                TextColumn::make('stok'),
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
            'index' => Pages\ListBukus::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
        ];
    }
}
