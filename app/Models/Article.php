<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $fillable = [
        'category_id ',
        'writer_id',
        'writer_token',
        'writer_name',
        'h_title',
        'top_title',
        'top_text',
        'text',
        'image',
        'alt_image',
        'keywords',
        'last_user_view',
        'view_count',
        'last_user_like',
        'like_count',
        'is_active',
        'is_best'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'writer_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
