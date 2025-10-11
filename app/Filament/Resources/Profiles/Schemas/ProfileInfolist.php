<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProfileInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('title'),
                TextEntry::make('greeting_text')
                    ->columnSpanFull(),
                TextEntry::make('bio'),
                ImageEntry::make('image_path')
                    ->disk('public')
                    ->visibility('public')
                    ->placeholder('-'),
                TextEntry::make('linkedin_url'),
                TextEntry::make('github_url'),
                TextEntry::make('resume_path'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
