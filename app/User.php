<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

    public static function getAllUsers()
    {
        $users = DB::table('users')->select(['id', 'name', 'email', 'permission', 'created_at'])->orderBy('created_at', 'ASC')->get();
        return $users;
    }

    public static function getUser($userid)
    {
        $user = DB::table('users')->select(['id', 'name', 'email', 'permission', 'created_at'])->where('id', $userid)->get()->first();
        return $user;
    }

    public static function editUser($post) {
        DB::table('users')->where('id', $post['id'])->update(['permission' => $post['permission']]);
    }
}
