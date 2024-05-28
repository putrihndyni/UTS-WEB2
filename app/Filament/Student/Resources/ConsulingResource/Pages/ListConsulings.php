<?php

namespace App\Filament\Student\Resources\ConsulingResource\Pages;

use App\Filament\Student\Resources\ConsulingResource;
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
