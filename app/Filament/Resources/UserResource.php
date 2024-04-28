<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('name')->required(),
                TextInput::make('email')->email(),
                Select::make('role')
                ->options([
                    'ADMIN' => 'Admin',
                    'ENG'   => 'Engineer',
                    'USER'  => 'User'
                ])->native(),

                TextInput::make('password')->password(),



            ]);
    }

    public static function table(Table $table): Table
    {
        return

        $table
            ->columns([

                TextColumn::make('first_name')
                ->searchable()
                ->sortable(),
                TextColumn::make('email'),
                TextColumn::make('role')
                ->badge()
                ->searchable()
                ->sortable()
                ->color(function (string $state): string {

                    return match ($state){

                        'ADMIN' => 'danger',
                        'ENG' => 'info',
                        'USER' => 'success'
                    };
                }),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
