<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Image;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function likes()
    {
        return $this->belongsToMany(
            image::class,
            'image_likes',
        );
    }

    //この投稿に対して既にlikeしたかどうかを判別する
    public function isLike($imageId)
    {
        return $this->likes()->where('image_id',$imageId)->exists();
    }

    //いいねしたポストID取得
    public function getLikeimageId()
    {
        return $this->likes()->get(['image_id']);
    }

    //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
    public function like($imageId)
    {
        if($this->isLike($imageId)){
            //もし既に「いいね」していたら何もしない
        } else {
            $this->likes()->attach($imageId);
        }
    }

    //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
    public function unlike($imageId)
    {
        if($this->isLike($imageId)){
            //もし既に「いいね」していたら消す
            $this->likes()->detach($imageId);
        } else {
        }
    }

}
