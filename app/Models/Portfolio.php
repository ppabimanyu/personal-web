<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Portfolio extends Model
{
    /** @use HasFactory<\Database\Factories\PortfolioFactory> */
    use HasFactory, LogsActivity;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'project_url',
        'github_url',
        'published_at',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('portfolio')
            ->logAll()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
