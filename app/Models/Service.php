<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, HasSlug, Searchable;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'price',
        'views',
        'category_id',
        'user_id',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function toSearchableArray(): array
    {
        return [
            'id' => (int) $this['id'],
            'title' => $this['title'],
            'slug' => $this['slug'],
            'content' => $this['content'],
            'views' => (int) $this['views'],
            'price' => (float) $this['price'],
            'category' => (int) $this['category_id'],
            'user' => (int) $this['user_id'],
            'is_active' => (bool) $this['is_active'],
        ];
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
