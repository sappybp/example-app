<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str; // UUIDを使用する場合

use App\Models\User;

class Image extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid', 'name','author', 'synopsis', 'path', 'size'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // モデルが作成される前に、UUIDを生成して割り当てます。
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid();
            }
        });
    }

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'image_likes',
        );
    }

}
