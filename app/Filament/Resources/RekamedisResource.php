<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Obat;
use Filament\Tables;
use App\Models\Rekamedis;
use App\Models\Ruanginap;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkAction;
use App\Filament\Resources\RekamedisResource\Pages;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class RekamedisResource extends Resource
{
    protected static ?string $model = Rekamedis::class;
    protected static ?string $navigationLabel = 'Data Pasien';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Pasien')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('gender')
                ->label('Jenis Kelamin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_birth')
                ->label('Tanggal Lahir'),
                Forms\Components\TextInput::make('weight')
                ->label('Berat Badan'),
                Forms\Components\Textarea::make('address')
                ->label('Alamat Pasien')
                ->maxLength(65535),
                Forms\Components\Textarea::make('complaint')
                    ->maxLength(65535),
                Forms\Components\TextInput::make('tension')
                ->label('Tensi Darah'),
                Forms\Components\TextInput::make('temperature')
                ->label('Suhu Tubuh'),
                TextInput::make('title')
                ->label('jenis Perawatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\MultiSelect::make('obat_id')
                    ->options(Obat::query()->pluck('name','id'))
                    ->searchable(),
                Forms\Components\Select::make('ruanginap_id')
                    ->options(Ruanginap::query()->pluck('name_room','id'))
                    ->searchable()
                    ->required(false),
                Forms\Components\TextInput::make('total')
                    ->maxLength(255),
                Forms\Components\TextArea::make('action')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('name')
                ->label('Nama Pasien')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('gender')
                ->label('Jenis Kelamin')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                ->label('Tanggal Lahir')
                ->dateTime('d-M-Y')
                ->sortable()
                ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('ruanginap_id')
                ->label('Ruang Inap')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('complaint')
                ->label('Keluhan')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('action')
                ->label('Tindakan')
                    ->toggleable(),
                TextColumn::make('created_at')
                ->label('Tanggal Periksa')
                ->dateTime('d-M-Y')
                ->sortable()
                ->searchable(),

            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                BulkAction::make('delete')
                    ->label('Export Selected')
                    ->icon('heroicon-o-document-download'),
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
            'index' => Pages\ListRekamedis::route('/'),
            'create' => Pages\CreateRekamedis::route('/create'),
            'edit' => Pages\EditRekamedis::route('/{record}/edit'),
        ];
    }
}
