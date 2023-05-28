<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Kategori;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
//    protected static ?string $model = Product::class;
    protected static ?string $modelLabel = 'Product';
    protected static ?string $navigationIcon = 'heroicon-o-cake';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\select::make('created_by')
                    ->label('Author')
                    ->options(User::query()->pluck('name','id'))
                    ->required(),
//                    ->hidden(),
                Forms\Components\select::make('supplier_id')
                    ->placeholder('Nama Supplier')
                    ->options(Supplier::query()->pluck('name','id'))
                    ->label('Supplier')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\select::make('id_kategori')
                    ->placeholder('Kategori')
                    ->options(Kategori::query()->pluck('namakategori','id'))
                    ->required(),
//                    ->maxLength(255),
                Forms\Components\TextInput::make('harga_produk')
                    ->required(),
                Forms\Components\TextInput::make('stock')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_by'),
                Tables\Columns\TextColumn::make('supplier_id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('deskripsi'),
                Tables\Columns\TextColumn::make('id_kategori'),
                Tables\Columns\TextColumn::make('harga_produk')
                ->money('idr'),
                Tables\Columns\TextColumn::make('stock'),
                Tables\Columns\TextColumn::make('created_at')
                    ->hidden()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->hidden()
                    ->dateTime(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
