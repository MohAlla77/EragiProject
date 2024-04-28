<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeesResource\Pages;
use App\Filament\Resources\EmployeesResource\RelationManagers;
use App\Models\Employees;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeesResource extends Resource
{
    protected static ?string $model = Employees::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required(),
                TextInput::make('phone_number')->numeric()->required(),
                TextInput::make('salary')->numeric()->required(),
                TextInput::make('workplace')->datalist([
                    'ينبع الصناعية',
                    'حي الياقوت',
                    'المدينة المنورة',

                ]),
                TextInput::make('department')->datalist([
                    'IT',
                    'Engeneering',
                    'Manager ',

                ]),
                DatePicker::make('direct_day'),
                TextInput::make('address'),
                Radio::make('marital_status')
                ->options([
                    'single' => 'single',
                    'married' => 'married',

                ]),
                Select::make('nationality')
                   ->label('nationality')
                   ->options([
                    'Sudan' => 'Sudan',
                    'KSA' => 'KSA',
                    'Egypt' => 'Egypt',
                ])
                   ->searchable()
                   ->native(false),

                FileUpload ::make('image'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('salary'),
                TextColumn::make('department'),
                TextColumn::make('direct_day'),
                TextColumn::make('workplace'),
                TextColumn::make('nationality'),
                TextColumn::make('marital_status'),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployees::route('/create'),
            'edit' => Pages\EditEmployees::route('/{record}/edit'),
        ];
    }
}
