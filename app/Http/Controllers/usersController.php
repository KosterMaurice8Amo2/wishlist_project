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
use Illuminate\Support\Facades\File;
use DateTime;

class usersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function post (Request $request) {
        $user = new User();
        $wish = new wishes();
        $error = "";

        if ($request->has('submit-edit-admin')) {
            $userid = $request->input('submit-edit-admin');
            $data = array('id'=>$userid, 'permission'=>'admin');

            $user->editUser($data);



        } elseif ($request->has("submit-edit-user")) {
            $userid = $request->input('submit-edit-user');
            $data = array('id'=>$userid, 'permission'=>'user');

            $user->editUser($data);


            
        } elseif ($request->has("submit-edit-wish")) {
            $data = "";
            $error = "";
            $wishid = $request->input('submit-edit-wish');
            $wishname = $request->input('wishname');
            $wishtext = $request->input('wishtext');
            $wishlink = $request->input('wishlink');
            $wishprice = $request->input('wishprice');
            $oldwishimage = $request->input('oldwishimage');

            if ($request->hasFile('wishimage')) {
                if ($request->wishimage->getClientSize() > 50000) {
                    $error = "Afbeelding is te groot";
                } else {

                    $request->wishimage->store('images', 'public');
                    $wishimage = $request->wishimage->hashName();

                    $data = array('id'=>$wishid, 'wishname'=>$wishname, 'wishtext'=>$wishtext, 'wishlink'=>$wishlink, 'wishprice'=>$wishprice, 'wishimage'=>$wishimage);
                }
            } else {
                $data = array('id'=>$wishid, 'wishname'=>$wishname, 'wishtext'=>$wishtext, 'wishlink'=>$wishlink, 'wishprice'=>$wishprice);
            }

            $wish->updateWishes($data);

            if(File::exists("storage/images/$oldwishimage")) {
                File::delete("storage/images/$oldwishimage");
            }



        } elseif ($request->has("submit-delete-wish")) {
            $oldwishimage = $request->input('oldwishimage');

            $wishid = $request->input('submit-delete-wish');
            $data = array('id'=>$wishid);

            $wish->deleteWishes($data);

            if(File::exists("storage/images/$oldwishimage")) {
                File::delete("storage/images/$oldwishimage");
            }
        }
        
        $users = User::getAllUsers();
        $wishes = wishes::getAllWishes();
        return view('/admin')->with("users", $users)->with("wishes", $wishes)->with("error", $error);
    }

    public function indexPage(){
        $users = User::getAllUsers();
        $wishes = wishes::getAllWishes();
        return view('/admin')->with("users", $users)->with("wishes", $wishes);
    }
}
