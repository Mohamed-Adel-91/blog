<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'email',
        'image',
        'name',
        'post_status',
        'user_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); //Relationship between Post and User model. One to Many relationship
    }

}