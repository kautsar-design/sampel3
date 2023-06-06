<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlatkesehatanResource\Pages;
use App\Filament\Resources\AlatkesehatanResource\RelationManagers;
use App\Models\Alatkesehatan;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlatkesehatanResource extends Resource
{
    protected static ?string $model = Alatkesehatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Local';
    protected static ?string $navigationLabel = 'Data Alat Kesehatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->unique(ignoreRecord:true)
                            ->required(),
                        TextInput::make('title')
                            ->label('tipe alat')
                            ->required()
                            ]),
                        TextInput::make('total')
                            ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->sortable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('title')->sortable()->searchable()
                ->label('jenis alat'),
                TextColumn::make('total')->sortable()->searchable(),
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
            'index' => Pages\ManageAlatkesehatans::route('/'),
        ];
    }
}
