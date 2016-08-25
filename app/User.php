<?php

namespace App;

use App\Model\BaseModel;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;

class User extends BaseModel implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    public static $rules = array(
        'name' => 'required|max:100',
        'email'   => 'required',
        'password'   => 'required',
//        'confirmPassword'   => 'required|min:6',
    );

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function posts(){
        return $this->hasMany(Post::class, 'created_by');

    }

    public function votes(){
        return $this->hasMany(Vote::class, 'user_id');

    }

    public function voteScore(){
        $up = $this->votes()->where('vote', '=', 1)->count();
        $down = $this->votes()->where('vote', '=', 0)->count();
//        dd($up, $down);
        return $up - $down;
    }

    /**
     * @param $searchTerm
     * @return mixed
     */
    public static function searchPosts($searchTerm){
        return static::join('users', 'users.id', '=', 'posts.created_by')->where('users.id', '=', Auth::user()->id)
            ->orWhere('title', 'LIKE', "%$searchTerm%")
            ->orWhere('content', 'LIKE', "%$searchTerm%")
            ->orWhere('url', 'LIKE', "%$searchTerm%");
    }


}
