<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['title','image','content','category_id','user_id'];
    public function usersFavourite(){
        return $this->belongsToMany(User::class,'favourite')
            ->withTimestamps();

    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function Rposts2(){
        return $this->belongsToMany(User::class)->withPivot('message')->withTimestamps();
    }
}
