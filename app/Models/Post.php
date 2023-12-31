<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content'
    ];

    protected $hidden = [
        'post_id',
    ];

    protected $primaryKey = 'post_id';

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

}
