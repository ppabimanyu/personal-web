<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\Posts\PostResource;
use pxlrbt\FilamentActivityLog\Pages\ListActivities;

class ListPostActivities extends ListActivities
{
    protected static string $resource = PostResource::class;

    public function canRestoreActivity(): bool
    {
        return false;
    }
}
