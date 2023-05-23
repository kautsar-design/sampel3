<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pasien;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PasienResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PasienResource\RelationManagers;

class PasienResource extends Resource
{
    protected static ?string $model = Pasien::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                Forms\Components\TextInput::make('name')
                ->label('nama Pasien')
                ->placeholder('nama kalian')
                ->maxLength(255),
            Forms\Components\TextInput::make('gender')
                ->required()
                ->label('jenis kelamin')
                ->datalist([
                    'putra',
                    'putri'
                ]),
            Forms\Components\DatePicker::make('date_of_birth'),
            Forms\Components\TextInput::make('weight')
            ->numeric(),
            Forms\Components\Textarea::make('address')
                ->label('alamat rumah')
                ->placeholder('alamat kalian kalian')
                ->maxLength(65535),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    Tables\Columns\TextColumn::make('name')->label('Nama Customer'),
                    Tables\Columns\TextColumn::make('gender')
                        ->label('jenis kelamin'),
                    Tables\Columns\TextColumn::make('date_of_birth')
                        ->date(),
                    Tables\Columns\TextColumn::make('weight'),
                    Tables\Columns\TextColumn::make('address'),
                    Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
       
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPasiens::route('/'),
            'create' => Pages\CreatePasien::route('/create'),
            'edit' => Pages\EditPasien::route('/{record}/edit'),
        ];
    }    
}
