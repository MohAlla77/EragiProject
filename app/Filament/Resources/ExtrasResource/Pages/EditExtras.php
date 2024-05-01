<?php

namespace App\Filament\Resources\ExtrasResource\Pages;

use App\Filament\Resources\ExtrasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExtras extends EditRecord
{
    protected static string $resource = ExtrasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
