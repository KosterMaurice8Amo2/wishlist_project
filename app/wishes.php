<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class wishes extends Model
{
    public static function getWishes($id)
    {
        $wishes = DB::table('wishes')->select(['id', 'user_id', 'wishname', 'wishtext', 'wishlink', 'wishprice', 'wishimage'])->where('id', $id)->orderBy('id', 'DESC')->get();
        return $wishes;
    }

    public static function getWishesUser($id)
    {
        $wishes = DB::table('wishes')->select(['id', 'user_id', 'wishname', 'wishtext', 'wishlink', 'wishprice', 'wishimage'])->where('user_id', $id)->orderBy('id', 'DESC')->get();
        return $wishes;
    }

    public static function getAllWishes()
    {
        $wishes = DB::table('wishes')->select(['id', 'user_id', 'wishname', 'wishtext', 'wishlink', 'wishprice', 'wishimage'])->orderBy('created_at', 'DESC')->get();
        return $wishes;
    }

    public function addWishes($post) {
        DB::table('wishes')->insert($post);
    }

    public function updateWishes($post) {
        if (!empty($post['wishimage'])) {
            DB::table('wishes')->where('id', $post['id'])->update([
                'wishname' => $post['wishname'],
                'wishtext' => $post['wishtext'],
                'wishlink' => $post['wishlink'],
                'wishprice' => $post['wishprice'],
                'wishimage' => $post['wishimage'],
            ]);
        } else {
            DB::table('wishes')->where('id', $post['id'])->update([
                'wishname' => $post['wishname'],
                'wishtext' => $post['wishtext'],
                'wishlink' => $post['wishlink'],
                'wishprice' => $post['wishprice'],
            ]);
        }
    }

    public function deleteWishes($post) {
        DB::table('wishes')->where('id', $post['id'])->delete();
    }
}
