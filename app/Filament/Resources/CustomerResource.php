<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Customer;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CustomerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CustomerResource\RelationManagers;
use Livewire\Features\Placeholder;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('nama customer')
                    ->placeholder('nama kalian')
                    ->maxLength(255),
                Forms\Components\TextInput::make('id_gender')
                    ->required(),
                Forms\Components\DatePicker::make('date_of_birth'),
                Forms\Components\TextInput::make('age'),
                Forms\Components\Textarea::make('address')
                    ->label('alamat rumah')
                    ->placeholder('alamat kalian kalian')
                    ->maxLength(65535),
            ])
            ->columns(2)
            
            
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
             ->columns([
            Tables\Columns\TextColumn::make('name')->label('Nama Customer'),
            Tables\Columns\TextColumn::make('id_gender'),
            Tables\Columns\TextColumn::make('date_of_birth')
                ->date(),
            Tables\Columns\TextColumn::make('age'),
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
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }    
}
