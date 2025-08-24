<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use Sluggable;

    protected $table = 'tags';

    protected $fillable
        = [
            'title',
            'slug',
            'meta_desc',
        ];

    public $timestamps = false;

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id',
            'post_id');
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => mb_ucfirst(mb_strtolower($value)),
        );
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}
