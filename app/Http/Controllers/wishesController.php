<?php

namespace App\Http\Controllers;

use App\wishes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\Console\Helper\Table;
use Illuminate\Support\Facades\Auth;
use DateTime;

class wishesController extends Controller
{

    public static function getAllWishes()
    {
        $wishes = DB::table('wishes')->select(['id', 'user_id', 'wishname', 'wishtext', 'wishlink', 'created_at'])->orderBy('created_at', 'DESC')->get();
        return $wishes;
    }

    public function addWish(Request $request) {

            $userid = Auth::id();
            $wishname = $request->input('wishname');
            $wishtext = $request->input('wishtext');
            $wishlink = $request->input('wishlink');
            $date = new DateTime();
            $data = array('user_id'=>$userid, 'wishname'=>$wishname, 'wishtext'=>$wishtext, 'wishlink'=>$wishlink, 'created_at'=>$date);

            $wish = new wishes();
            $wish->addWishes($data);

            $wishes = wishes::getAllWishes();
            return view('wishes')->with("wishes", $wishes);

    }

    public function indexWishes(){
        $wishes = wishes::getAllWishes();
        return view('wishes')->with("wishes", $wishes);
    }

}
