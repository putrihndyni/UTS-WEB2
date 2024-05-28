<?php

namespace App\Filament\Resources\ConsulingResource\Pages;

use App\Filament\Resources\ConsulingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConsuling extends EditRecord
{
    protected static string $resource = ConsulingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
