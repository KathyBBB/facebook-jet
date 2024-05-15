<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Content extends Model
{
    use HasFactory;
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'title',
        'content',
        'image',
        'slug',
        'user_id',
        'issue_id',
    ];

    public function getSlugOptions(): SlugOptions
    {

        return SlugOptions::create()
            ->generateSlugsFrom(['title', substr('descripton', 50)])
            ->saveSlugsTo('slug');
    }

    /**
     * Get the user that owns the content.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the issue that owns the content.
     */

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

    /**
     * Get the answers for the content.
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
