<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
   protected $fillable = [
    'title',
    'body',
    'user_id',
    // 'category_id'
];

public function getPaginateByLimit(int $limit_count = 5)
{
    // updated_atで降順に並べたあと、limitで件数制限をかける
    // return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
 return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->paginate();
    
}

public function user()
{
    return $this->belongsTo(User::class);
}

public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
public function images()
    {
        return $this->hasMany(Image::class);
    }
    
public function followers()
    {
        return $this->hasMany(Follower::class);
    }
    
public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
