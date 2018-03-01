<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'user_posts';

    protected $fillable = [
        'title', 
        'description', 
        'location', 
        'numberOfRooms',
        'imageName',
        'price',
        'user_id'
    ];
}
