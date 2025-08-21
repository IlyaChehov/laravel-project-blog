<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use Sluggable;

    protected $table = 'categories';
    protected $fillable
        = [
            'title',
            'slug',
            'meta_desc',
        ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => mb_ucfirst(mb_strtolower($value)),
        );
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

//    protected static function booted()
//    {
//        static::creating(function ($category) {
//            $category->slug = Str::slug($category->title, '-');
//        });
//    }
}
