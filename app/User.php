<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    /* more and more*/

    protected $guarded = [];
    protected $fillable = [
        'username',
        'email',
        'password',
        'token'
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }

    public static function findUserByEmail($email){
        $user = DB::table('users')->where('email', '=', $email)->first();
        return $user;
    }
    public static function newPassword(){
        return substr(hash('md5', time()), 0, 6);
    }
}
