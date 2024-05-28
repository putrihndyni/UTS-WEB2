<?php

namespace App\Filament\Resources\ConsulingResource\Pages;

use App\Filament\Resources\ConsulingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConsulings extends ListRecords
{
    protected static string $resource = ConsulingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
