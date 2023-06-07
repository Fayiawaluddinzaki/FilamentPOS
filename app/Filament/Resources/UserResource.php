<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
//    protected static ?string $model = User::class;
    protected static ?string $modelLabel ='Manage User';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Alamat Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at')
                    ->hidden(),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state)=>Hash::make($state))
                    ->dehydrated(fn ($state)=>filled($state))
//                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('two_factor_secret')
                    ->hidden()
                    ->maxLength(65535),
                Forms\Components\Textarea::make('two_factor_recovery_codes')
                    ->hidden()
                    ->maxLength(65535),
                Forms\Components\DateTimePicker::make('two_factor_confirmed_at')
                    ->hidden(),
                Forms\Components\TextInput::make('current_team_id'),
                Forms\Components\FileUpload::make('profile_photo_path')
//                    ->maxLength(2048)
                    ->image()
                    ->label('Profile Photo')
                    ->required()
                    ->maxSize(5000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('two_factor_secret')
                ->hidden(),
                Tables\Columns\TextColumn::make('two_factor_recovery_codes')
                ->hidden(),
                Tables\Columns\TextColumn::make('two_factor_confirmed_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('current_team_id')
                    ->label('Team ID'),
                Tables\Columns\ImageColumn::make('profile_photo_path'),
                Tables\Columns\TextColumn::make('created_at')
//                    ->hidden()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
