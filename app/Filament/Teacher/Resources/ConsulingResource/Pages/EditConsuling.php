<?php

namespace App\Filament\Teacher\Resources\ConsulingResource\Pages;

use App\Filament\Teacher\Resources\ConsulingResource;
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
