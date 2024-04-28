<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Notifications\Action;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function afterCreate(): void
    {
        $user = auth()->user();

        Notification::make()
        ->title('New User Add Successfully')
        ->icon('heroicon-m-user-plus')
        ->body('The User add by -> ')


        ->sendToDatabase(auth()->user());
    }
}
