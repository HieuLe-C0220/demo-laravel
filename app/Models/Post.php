<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'baiviet';

    protected $fillable = ['title', 'content', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tag() {
        return $this->belongsToMany(Tag::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
