<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostHasLike extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ownedByPost(){
        return $this->hasMany(Post::class, 'id', 'post_id');
    }

    public function likesByUser(){
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
