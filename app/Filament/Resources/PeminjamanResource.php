<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\Buku;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Peminjaman;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PeminjamanResource\Pages;
use App\Filament\Resources\PeminjamanResource\RelationManagers;

class PeminjamanResource extends Resource
{
    protected static ?string $model = Peminjaman::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';
    protected static ?string $navigationGroup = 'Management';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationLabel(): string{
        return "Peminjaman";
    }

    public static function getPluralModelLabel(): string{
        return "Peminjaman";
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['user', 'buku']);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()
                ->schema([
                    Select::make('id_user')
                ->label('Peminjam')
                ->options(User::all()->pluck('nis', 'id'))
                ->reactive()
                ->afterStateUpdated(function ($state, callable $set) {
                    $user = User::find($state);
                    $set('name', $user?->name);
                    $set('kelas', $user?->kelas);
                })
                ->afterStateHydrated(function ($state, callable $set) {
                    $user = User::find($state);
                    $set('name', $user?->name);
                    $set('kelas', $user?->kelas);
                })
                ->searchable(),
        
            TextInput::make('name')
                ->label('Nama Lengkap')
                ->disabled()
                ->dehydrated(false),
        
            TextInput::make('kelas')
                ->label('Kelas')
                ->disabled()
                ->dehydrated(false),
        
            DatePicker::make('tgl_peminjaman')
                ->format('Y/m/d')
                ->reactive()
                ->rules([
                    "after_or_equal:1900-01-01",
                    "before_or_equal:" . date('Y/m/d')
                ])
                ->afterStateUpdated(
                    function ($state, callable $set){
                        $pengembalian = Carbon::parse($state)->addDays(10)->format('Y-m-d');
                        $set('tgl_pengembalian', $pengembalian);
                    }
                )
                ->required(),
        
            Select::make('id_buku')
                ->label('Buku')
                ->options(Buku::all()->pluck('judul_buku', 'id'))
                ->reactive()
                ->afterStateUpdated(function ($state, callable $set){
                    $buku = Buku::find($state);
                    $set('pengarang', $buku?->pengarang);
                    $set('stok', $buku?->stok);
                    $stok = $buku->stok;
                    if ($stok == 0) {
                        Notification::make()
                            ->title('Stok Habis')
                            ->body('Stok barang ini sudah habis. Tidak bisa melakukan pemesanan.')
                            ->danger()
                            ->persistent()
                            ->send();
                    }
                })
                ->afterStateHydrated(function ($state, callable $set){
                    $buku = Buku::find($state);
                    $set('pengarang', $buku?->pengarang);
                    $set('stok', $buku?->stok);
                    
                })
                ->searchable(),
        
            TextInput::make('pengarang')
                ->label('Pengarang')
                ->disabled()
                ->dehydrated(false),

            TextInput::make('stok')
                ->label('Stok')
                ->readOnly()
                ->dehydrated(false),
        
            DatePicker::make('tgl_pengembalian')
            ->readOnly()
        
            
                ])
                ->columns(2),
            
                ]);
        
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.nis')->label('Nis')->searchable(),
                TextColumn::make('user.name')->label('Nama User')->searchable(),
                TextColumn::make('user.kelas')->label('Kelas')->searchable(),
                TextColumn::make('buku.pengarang')->label('Pengarang')->searchable(),
                TextColumn::make('tgl_peminjaman')->searchable()->sortable(),
                TextColumn::make('tgl_pengembalian')->searchable()->sortable(),
                TextColumn::make('status')->searchable()
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'dipinjam' => 'warning',
                    'kembali' => 'success',
                })


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
            'index' => Pages\ListPeminjamen::route('/'),
            'create' => Pages\CreatePeminjaman::route('/create'),
            'edit' => Pages\EditPeminjaman::route('/{record}/edit'),
        ];
    }
}
