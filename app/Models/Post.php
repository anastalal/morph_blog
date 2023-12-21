<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable = [
        'title',
        'slog',
        'banner',
        'content',
        'user_id',
        'category_id',
        'published_at',
        'views',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}