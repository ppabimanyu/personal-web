<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('image_path')
                    ->hiddenLabel()
                    ->placeholder('-')
                    ->imageWidth('100%')
                    ->imageHeight(500)
                    ->disk('public')
                    ->columnSpanFull(),

                Section::make()
                    ->schema([
                        TextEntry::make('published_at')
                            ->hiddenLabel()
                            ->columnSpanFull()
                            ->date(),
                        TextEntry::make('title')
                            ->hiddenLabel()
                            ->size(TextSize::Large)
                            ->weight(FontWeight::Bold)
                            ->columnSpanFull()
                            ->placeholder('-'),
                        TextEntry::make('description')
                            ->hiddenLabel()
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])->columnSpanFull(),
                Section::make()
                    ->schema([
                        TextEntry::make('content')
                            ->hiddenLabel()
                            ->placeholder('-')
                            ->columnSpanFull()
                            ->markdown(),
                    ])->columnSpanFull(),
            ]);
    }
}
