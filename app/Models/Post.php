<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Sluggable, SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'meta_desc',
        'slug',
        'excerpt',
        'content',
        'category_id',
        'preview_img',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id', 'posts');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
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

    public function getDate(string $format): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', (string) $this->created_at)->format($format);
    }

    public function getImage(): string
    {
        return asset($this->preview_img ?? 'assets/img/no-img.jpg');
    }
}
