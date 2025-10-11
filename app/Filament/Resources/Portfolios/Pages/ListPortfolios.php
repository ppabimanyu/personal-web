<?php

namespace App\Filament\Resources\Portfolios\Pages;

use App\Filament\Resources\Portfolios\PortfolioResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPortfolios extends ListRecords
{
    protected static string $resource = PortfolioResource::class;

    protected ?string $heading = 'Portfolios';

    protected ?string $subheading = 'Manage and organize your portfolio items.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
