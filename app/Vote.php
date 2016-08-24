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
        return $this->belongsTo(Post::class);

    }
    public function user(){
        return $this->belongsTo(User::class);

    }
}
