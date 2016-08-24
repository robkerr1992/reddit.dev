<?php

namespace App;

use App\Model\BaseModel;

class Vote extends BaseModel
{
    protected $table = 'votes';
//    public static $rules = array(
//        'user_id' => 'required|max:100',
//        'url'   => 'required|url',
//        'content'   => 'required',
//    );

    public function post(){
        return $this->hasOne(Post::class, 'post_id');

    }
    public function user(){
        return $this->hasOne(User::class, 'user_id');

    }
}
