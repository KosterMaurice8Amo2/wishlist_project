<?php

namespace App\Http\Controllers;


use App\User;
use App\wishes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\Console\Helper\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use DateTime;

class usersController extends Controller
{

    public function post (Request $request) {
        $user = new User();
        $wish = new wishes();
        $userid;

        if ($request->has('submit-edit-admin')) {
            $userid = $request->input('submit-edit-admin');
            $data = array('id'=>$userid, 'permission'=>'admin');

            $user->editUser($data);

        } elseif ($request->has("submit-edit-user")) {
            $userid = $request->input('submit-edit-user');
            $data = array('id'=>$userid, 'permission'=>'user');

            $user->editUser($data);

        } elseif ($request->has("submit-edit-wish")) {
            $wishid = $request->input('submit-edit-wish');
            $wishname = $request->input('wishname');
            $wishtext = $request->input('wishtext');
            $wishlink = $request->input('wishlink');
            $data = array('id'=>$wishid, 'wishname'=>$wishname, 'wishtext'=>$wishtext, 'wishlink'=>$wishlink,);

            $wish->updateWishes($data);

        } elseif ($request->has("submit-delete-wish")) {
            $wishid = $request->input('submit-delete-wish');
            $data = array('id'=>$wishid);

            $wish->deleteWishes($data);
        }
        
        $users = User::getAllUsers();
        $wishes = wishes::getAllWishes();
        return view('/admin')->with("users", $users)->with("wishes", $wishes);
    }

    public function indexPage(){
        $users = User::getAllUsers();
        $wishes = wishes::getAllWishes();
        return view('/admin')->with("users", $users)->with("wishes", $wishes);
    }
}
