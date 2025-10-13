<?php

namespace App\Filament\Resources\Portfolios\Pages;

use App\Filament\Resources\Portfolios\PortfolioResource;
use pxlrbt\FilamentActivityLog\Pages\ListActivities;

class ListPortfolioActivities extends ListActivities
{
    protected static string $resource = PortfolioResource::class;

    public function canRestoreActivity(): bool
    {
        return false;
    }
}
