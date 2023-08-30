<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts()   
{
    return $this->hasMany(Post::class);  
    // ここでgetpaginate引っ張ってくる。
}

    public function likes()   
{
    return $this->hasMany(Like::class);  
}

  // フォロワー→フォロー
    public function follows()
    {
        return $this->belongsToMany('App\User', 'followers', 'user_id', 'follower_id');
    }

    // フォロー→フォロワー
    public function followers()
    {
        return $this->belongsToMany('App\User', 'followers', 'follower_id', 'user_id');
    }
}

// class Post extends Model
// {
// public function getPaginateByLimit(int $limit_count = 5)
// {
//     // updated_atで降順に並べたあと、limitで件数制限をかける
//     // return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
//  return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->paginate();
    
// }
// }

// フォローボタン　フォロワー解除ボタン　あるURLにPOSTで飛ばして自分のIDはAUTHから持ってきて、フォローする相手を
// ルートパラメータから通す。　その画面にいった瞬間に相手のIDは分かる。
// likeも同じ。　ストアメソッド。　１つの試料を参考に。