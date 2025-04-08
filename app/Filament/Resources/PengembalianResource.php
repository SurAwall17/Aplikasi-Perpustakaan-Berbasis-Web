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
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengembalianResource\Pages;
use App\Filament\Resources\PengembalianResource\RelationManagers;

class PengembalianResource extends Resource
{
    protected static ?string $model = Pengembalian::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path';
    protected static ?string $navigationGroup = 'Management';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationLabel(): string{
        return "Pengembalian";
    }

    public static function getPluralModelLabel(): string{
        return "Pengembalian";
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['peminjaman.user', 'peminjaman.buku', 'kategori_denda']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Hidden::make('id_peminjaman')
                            ->dehydrated(true),
                        
                        Select::make('nis')
                        ->formatStateUsing(fn($record) => $record?->peminjaman?->user?->nis)
                        ->options(
                            User::whereIn(
                                'id',
                                Peminjaman::where('status', 'dipinjam')->pluck('id_user')
                            )
                            ->get()
                            ->pluck('nis', 'id')
                            )
                        ->disabled(fn($record)=>filled($record))

                        

                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set){
                            $user = User::find($state);
                            $set('name', $user?->name);
                            $set('kelas', $user?->kelas);
                            $set('judul_buku', null);
                            $set('harga_buku', null);
                            $set('id_kategori_denda', null);
                            $set('denda', null);
                            $set('baco', fn($record) => $record?->peminjaman?->user?->kelas);

                            $peminjaman = Peminjaman::where('id_user', $state)->latest()->first();
                            $set('id_peminjaman', $peminjaman?->id);
                        })
                        ->searchable()
                        ->required()
                        ->dehydrated(false),

                        TextInput::make('name')
                        ->formatStateUsing(fn($record) => $record?->peminjaman?->user?->name)
                        ->disabled(),

                        TextInput::make('kelas')
                        ->formatStateUsing(fn($record) => $record?->peminjaman?->user?->kelas)
                        ->disabled(),

                        Select::make('judul_buku')
                        ->label('Judul Buku')
                        ->formatStateUsing(fn($record) => $record?->peminjaman?->buku?->id)
                        ->options(function (callable $get, $record = null) {
                            $userId = $get('nis');
                    
                            // Jika sedang edit, tampilkan semua buku
                            if ($record) {
                                return Buku::pluck('judul_buku', 'id');
                            }
                    
                            // Jika create dan nis belum diisi, kembalikan array kosong
                            if (!$userId) {
                                return [];
                            }
                    
                            // Jika create dan nis ada, tampilkan buku yang pernah dipinjam user
                            if(!$record){
                                $bukuIds = Peminjaman::where('id_user', $userId)->where('status', 'dipinjam')->pluck('id_buku');
                            }else{
                                $bukuIds = Peminjaman::where('id_user', $userId)->pluck('id_buku');

                            }
                    
                            return Buku::whereIn('id', $bukuIds)
                                ->pluck('judul_buku', 'id');
                        })
                        ->afterStateUpdated(
                            function ($state, $record, callable $set, $get){
                                $userId = $get('nis');
                                $bukuId = $state;

                                $buku = Buku::find($state);
                                $set('harga_buku', $buku?->harga_buku);
                                $set('pengarang', $buku?->pengarang);

                                
                                $peminjaman = Peminjaman::where('id_user', $userId)
                                ->where('id_buku', $bukuId)
                                ->latest('created_at')
                                ->first();

                                if(!$record){

                                    $set('tgl_pengembalian', $peminjaman?->tgl_pengembalian);
                                }

                                if ($record) {
                                
                                    $kategori = KategoriDenda::find($get('id_kategori_denda'));
                                    
                                    $denda_kerusakan =  $kategori->jumlah_denda * $get('harga_buku');
                                    $tgl_pengembalian = $get('tgl_pengembalian');
                                    if($tgl_pengembalian && Carbon::parse($tgl_pengembalian)->isPast()){
                                        $set('denda', $denda_kerusakan + 20000 );

                                    }else{
                                        $set('denda', $denda_kerusakan);
                                    }
                                    $set('id_kategori_denda', $kategori?->id);
                                }
                                
                            }
                        )
                        ->searchable()
                        ->reactive()
                        ->dehydrated(false)
                        ->required(),

                        TextInput::make('pengarang')->disabled()->formatStateUsing(fn($record) => $record?->peminjaman?->buku?->pengarang),

                        DatePicker::make('tgl_pengembalian')->label('Tanggal Pengembalian')->reactive()->disabled()->formatStateUsing(fn($record) => $record?->peminjaman?->tgl_pengembalian),

                        DatePicker::make('tgl_kembali')->label('Tanggal Kembali')->default(Carbon::now()),

                        TextInput::make('harga_buku')->hidden(),

                        Select::make('id_kategori_denda')->label('Kondisi Buku')
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
                            ),
                        
                        
                        TextInput::make('denda')
                        ->prefix('Rp')
                        ->readOnly(),
                        ])
                        ->columns(2),
                

            ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('peminjaman.user.name')->searchable(),
                TextColumn::make('peminjaman.user.kelas')->searchable(),
                TextColumn::make('peminjaman.buku.judul_buku')->searchable(),
                TextColumn::make('kategori_denda.nama_kategori')->searchable()
                ->label('Kondisi Buku'),
                TextColumn::make('denda')->searchable()
                ->label('Total Denda'),
                TextColumn::make('peminjaman.buku.pengarang')->searchable() 
                ->label('Pengarang'),
                TextColumn::make('created_at')->label('Tanggal Kembali')->searchable()->sortable()->date('d-m-Y')
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
