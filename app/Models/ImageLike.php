<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageLike extends Model
{
    protected $fillable = ['user_id', 'image_id'];
}
