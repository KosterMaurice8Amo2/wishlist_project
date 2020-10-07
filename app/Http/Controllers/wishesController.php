<?php

namespace App\Http\Controllers;

use App\wishes;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\Console\Helper\Table;
use Illuminate\Support\Facades\Auth;
use DateTime;

class wishesController extends Controller
{

    public function addWish(Request $request) {
        $wishname = "";
        $wishtext = "";
        $wishlink = "";

        $userid = Auth::id();
        $wishname = $request->input('wishname');
        $wishtext = $request->input('wishtext');
        $wishlink = $request->input('wishlink');
        $date = new DateTime();
        $data = array('user_id'=>$userid, 'wishname'=>$wishname, 'wishtext'=>$wishtext, 'wishlink'=>$wishlink, 'created_at'=>$date);

        $wish = new wishes();
        $wish->addWishes($data);

        $wishes = wishes::getAllWishes();
        $users = User::getAllUsers();
        return view('wishes')->with("users", $users)->with("wishes", $wishes);

    }

    public function indexWishes(){
        $users = User::getAllUsers();
        $wishes = wishes::getAllWishes();
        return view('wishes')->with("users", $users)->with("wishes", $wishes);
    }

}
