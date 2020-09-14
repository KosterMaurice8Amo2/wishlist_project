<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class wishes extends Model
{
    public static function getWishes($user_id)
    {
        $wishes = DB::table('wishes')->select(['id', 'user_id', 'wishname', 'wishtext', 'wishlink'])->where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        return $wishes;
    }

    public static function getAllWishes()
    {
        $wishes = DB::table('wishes')->select(['id', 'user_id', 'wishname', 'wishtext', 'wishlink'])->orderBy('created_at', 'DESC')->get();
        return $wishes;
    }

    public function addWishes($post) {
        DB::table('wishes')->insert($post);
    }
}
