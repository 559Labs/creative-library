<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Tags\HasTags;
use App\Models\Traits\AssetAccessors;
use App\Models\Traits\AssetRelations;

class Asset extends Model
{
    use HasFactory, // Base Traits
        HasSlug, LogsActivity, HasTags, // Integrated Packages
        AssetAccessors, AssetRelations; // Organized Traits

    protected $fillable = [
        'name', 'slug',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo("slug")
            ->doNotGenerateSlugsOnUpdate();
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Sets logging options on model events.
     * 
     * @return Spatie\Activitylog\LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

}
