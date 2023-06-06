<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Components\Card;
use Pages\EditUser;
use App\Models\Obat;
use Filament\Tables;
use Pages\CreateUser;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ObatResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ObatResource\RelationManagers;

class ObatResource extends Resource
{
    protected static ?string $model = Obat::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';
    protected static ?string $navigationLabel = 'Data Obat';
    protected static ?string $navigationGroup = 'Local';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('name')
                    ->unique(ignoreRecord:true)
                    ->required(),
                    TextInput::make('category')
                    ->required()
                    ->datalist([
                        'syrup',
                        'tablet',
                        'pil',
                        'kapsul',
                        'salep'
                    ]),
                    TextInput::make('stock')
                    ->numeric(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('category')->sortable()->searchable(),
                TextColumn::make('stock')->sortable()->searchable(),
                TextColumn::make('created_at')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageObats::route('/'),
        ];
    }
}
