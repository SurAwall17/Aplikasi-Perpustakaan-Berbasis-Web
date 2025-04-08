<?php

namespace App\Filament\Resources;

use Midtrans\Snap;
use Filament\Forms;
use Filament\Tables;
use App\Models\Denda;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DendaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DendaResource\RelationManagers;

class DendaResource extends Resource
{
    protected static ?string $model = Denda::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';
    protected static ?string $navigationGroup = 'Denda';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
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

                TextInput::make('judul_buku')
                ->disabled()
                ->formatStateUsing(fn($record) => $record->pengembalian->peminjaman->buku->judul_buku),

                TextInput::make('nama')->label('Nama')
                ->disabled()
                ->formatStateUsing(fn($record) => $record->pengembalian->peminjaman->user->name),

                TextInput::make('harga_buku')->label('Harga Buku')
                ->disabled()
                ->formatStateUsing(fn($record) => $record->pengembalian->peminjaman->buku->harga_buku),

                TextInput::make('kondisi_buku')->label('Kondisi Buku')
                ->disabled()
                ->formatStateUsing(fn($record) => $record->pengembalian->kategori_denda->nama_kategori),

                TextInput::make('total_denda')->label('Total Denda')
                ->disabled()
                ->formatStateUsing(fn($record) => $record->pengembalian->denda)
                ->prefix('Rp'),

                Select::make('status')
                ->default(fn($record) => $record->status)
                ->options([
                    "Sudah Dibayar" => "Sudah Dibayar",
                    "Belum Dibayar" => "Belum Dibayar"
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pengembalian.peminjaman.buku.judul_buku')->searchable(),
                TextColumn::make('pengembalian.peminjaman.user.name')->label('Peminjam')->searchable(),
                TextColumn::make('pengembalian.peminjaman.buku.harga_buku')->label('Harga Buku'),
                TextColumn::make('pengembalian.kategori_denda.nama_kategori')->label('Kondisi Buku')->searchable(),
                TextColumn::make('pengembalian.denda')->label('Total Denda')->searchable(),
                TextColumn::make('status')->searchable()
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
                Action::make('bayar')
                ->label('Bayar Sekarang')
                ->icon('heroicon-o-credit-card')
                ->color('success')
                ->action(function ($record) {
                    
                    $params = [
                    'transaction_details' => [
                        'order_id' => $record->order_id,
                        'gross_amount' => $record->pengembalian->denda,
                    ],
                    'customer_details' => [
                    'first_name' => $record->pengembalian->peminjaman->user->name,
                    'email' => $record->pengembalian->peminjaman->user->email,
                    ],
                    'item_details' => [
                        [
                            'id' => 'denda-' . $record->id,
                            'price' => $record->pengembalian->denda,
                            'quantity' => 1,
                            'name' => 'Denda Buku',
                        ],
                    ],
                    'callbacks' => [
                        'finish' => route('midtrans.finish'),
                    ],
                    ];

                    $snapToken = Snap::getSnapToken($params);

                    return redirect()->away("https://app.sandbox.midtrans.com/snap/v2/vtweb/$snapToken");
                })
                ->visible(fn ($record) => $record->status == 'Belum Dibayar'),

                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),

                ])->link()
                ->label('Actions')
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
            // 'create' => Pages\CreateDenda::route('/create'),
            // 'edit' => Pages\EditDenda::route('/{record}/edit'),
        ];
    }
}
