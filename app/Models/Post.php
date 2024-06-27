<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'author_id',
        'post_title',
        'post_slug',
        'post_content',
        'featured_image',
    ];

    public function comments(){
        return $this->hasMany(Reviews::class);
    }
}
