<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Blog extends Model
{
    use HasFactory;

    protected $fillable=['title','slug','intro','body'];

    protected $with=['category','author'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function subscribers(){
        return $this->belongsToMany(User::class);
    }

    public function unsubscribe(){
        return $this->subscribers()->detach(auth()->id());
    }

    public function subscribe(){
        return $this->subscribers()->attach(auth()->id());
    }

    public function scopeFilter($query,$filter){
        $query->when($filter['search']??false , function($query,$search){
            $query->where(function($query) use ($search){       //logical grouping
                $query->where('title','Like','%'.$search.'%')
                    ->orWhere('body','Like','%'.$search.'%');
            });
        });

        $query->when($filter['category']??false,function($query,$slug){
            $query->whereHas('category',function($query) use ($slug){
                $query->where('slug',$slug);
            });
        });

        $query->when($filter['author']??false,function($query,$username){
            $query->whereHas('author',function($query) use ($username){
                $query->where('username',$username);
            });
        });
 
    }

}




