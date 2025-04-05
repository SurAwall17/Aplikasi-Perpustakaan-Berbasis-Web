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
use App\Models\Pengembalian;
use App\Models\KategoriDenda;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengembalianResource\Pages;
use App\Filament\Resources\PengembalianResource\RelationManagers;

class PengembalianResource extends Resource
{
    protected static ?string $model = Pengembalian::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path';
    protected static ?string $navigationGroup = 'Management';


    public static function getNavigationLabel(): string{
        return "Pengembalian";
    }

    public static function getPluralModelLabel(): string{
        return "Pengembalian";
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['peminjaman', 'kategori_denda']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Hidden::make('id_peminjaman')
                            ->dehydrated(true),

                        Hidden::make('id_kategori_denda')
                            ->dehydrated(true),

                        Select::make('nis')
                        ->options(
                            User::whereIn(
                                'id',
                                Peminjaman::where('status', 'dipinjam')->pluck('id_user')
                            )
                            ->get()
                            ->pluck('nis', 'id')
                        )

                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set){
                            $user = User::find($state);
                            $set('name', $user?->name);
                            $set('kelas', $user?->kelas);
                            $set('judul_buku', null);
                            $set('harga_buku', null);
                            $set('kondisi_buku', null);
                            $set('denda', null);

                            $peminjaman = Peminjaman::where('id_user', $state)->latest()->first();
                            $set('id_peminjaman', $peminjaman?->id);
                        })
                        ->searchable()
                        ->required()
                        ->dehydrated(false),

                        TextInput::make('name')
                        ->disabled(),

                        TextInput::make('kelas')
                        ->disabled(),

                        Select::make('judul_buku')
                        ->label('Judul Buku')
                        ->options(function (callable $get) {
                            $userId = $get('nis');

                            if (!$userId) {
                                return [];
                            }

                            // Ambil ID buku yang dipinjam oleh user
                            $bukuIds = Peminjaman::where('id_user', $userId)
                                ->pluck('id_buku');

                            // Ambil judul buku berdasarkan id
                            return Buku::whereIn('id', $bukuIds)
                                ->pluck('judul_buku', 'id');
                        })
                        ->afterStateUpdated(
                            function ($state, callable $set, callable $get){
                                $userId = $get('nis');
                                $bukuId = $state;

                                $buku = Buku::find($state);
                                $set('harga_buku', $buku?->harga_buku);
                                $set('pengarang', $buku?->pengarang);

                                
                                $peminjaman = Peminjaman::where('id_user', $userId)
                                ->where('id_buku', $bukuId)
                                ->latest('created_at')
                                ->first();

                                $set('tgl_pengembalian', $peminjaman?->tgl_pengembalian);
                            }
                        )
                        ->searchable()
                        ->reactive()
                        ->dehydrated(false)
                        ->required(),

                        TextInput::make('pengarang')->disabled(),
                        TextInput::make('tgl_pengembalian')->disabled()->reactive(),
                        TextInput::make('harga_buku')->hidden(),

                        Select::make('kondisi_buku')
                            ->options(
                                KategoriDenda::all()->pluck('nama_kategori', 'id')
                            )
                            ->reactive()
                            ->disabled(fn (callable $get) => !$get('nis') || !$get('judul_buku'))
                            ->afterStateUpdated(
                                function($state, callable $set, callable $get){
                                    $kategori = KategoriDenda::find($state);
                                    $denda_kerusakan =  $kategori->jumlah_denda * $get('harga_buku');

                                    $tgl_pengembalian = $get('tgl_pengembalian');
                                    if($tgl_pengembalian && Carbon::parse($tgl_pengembalian)->isPast()){
                                        $set('denda', $denda_kerusakan + 20000 );

                                    }else{
                                        $set('denda', $denda_kerusakan);
                                    }
                                    $set('id_kategori_denda', $kategori?->id);
                                }
                            )
                            ->dehydrated(false),
                        
                        
                        TextInput::make('denda')
                        ->readOnly(),
                        ])
                        ->columns(2),
                

            ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('peminjaman.user.name'),
                TextColumn::make('peminjaman.user.kelas'),
                TextColumn::make('peminjaman.buku.judul_buku'),
                TextColumn::make('kategori_denda.nama_kategori')
                ->label('Kondisi Buku'),
                TextColumn::make('peminjaman.buku.pengarang')
                ->label('Pengarang'),
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
            'index' => Pages\ListPengembalians::route('/'),
            'create' => Pages\CreatePengembalian::route('/create'),
            'edit' => Pages\EditPengembalian::route('/{record}/edit'),
        ];
    }
}
