<?php

namespace App;

use App\Model\BaseModel;
use Illuminate\Support\Facades\DB;

class Post extends BaseModel
{
    public static $rules = array(
        'title' => 'required|max:100',
        'url'   => 'required|url',
        'content'   => 'required',
    );

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function votes(){
        return $this->hasMany(Vote::class, 'post_id');

    }

//    public static function searchByTitle($searchTerm){
//        return static::where('title', 'LIKE', "%$searchTerm%");
//    }
//
//    public static function searchByUser($searchTerm){
//        return static::join('users', 'users.id', '=', 'posts.created_by')->where('users.name', 'LIKE', "%$searchTerm%");
//    }

    public static function searchBy($searchTerm){
        return static::join('users', 'users.id', '=', 'posts.created_by')->where('users.name', 'LIKE', "%$searchTerm%")
            ->orWhere('title', 'LIKE', "%$searchTerm%")
            ->orWhere('content', 'LIKE', "%$searchTerm%")
            ->orWhere('url', 'LIKE', "%$searchTerm%");
    }

}
