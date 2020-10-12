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
use Illuminate\Support\Collection;
use DateTime;

class wishesController extends Controller
{

    public function post(Request $request) {
        $user = new User();
        $wish = new wishes();
        $error = "";

        if ($request->has('submit-wish')) {
            $wishname = "";
            $wishtext = "";
            $wishlink = "";
            $wishprice = "";
            $wishimage = "";
            $date = "";
            $data = "";
            $userid = Auth::id();
    
            if ($request->wishimage->getClientSize() > 50000) {
                $error = "Afbeelding is te groot";
            } else {
                $wishname = $request->input('wishname');
                $wishtext = $request->input('wishtext');
                $wishlink = $request->input('wishlink');
                $wishprice = $request->input('wishprice');
    
                $request->wishimage->store('images', 'public');
    
                $wishimage = $request->wishimage->hashName();
                $date = new DateTime();
                $data = array('user_id'=>$userid, 'wishname'=>$wishname, 'wishtext'=>$wishtext, 'wishlink'=>$wishlink, 'wishprice'=>$wishprice, 'wishimage'=>$wishimage, 'created_at'=>$date);
    
                $wish->addWishes($data);
            }
    
        } elseif ($request->has("submit-edit-wish")) {
            $data = "";
            $error = "";
            $wishid = $request->input('submit-edit-wish');

            $userWishes = wishes::getWishes($wishid);
            
            if (!empty($userWishes)) {
                if ($userWishes[0]->user_id == Auth::id()) {
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
            }
        }


        } elseif ($request->has("submit-delete-wish")) {
            
            $oldwishimage = $request->input('oldwishimage');

            $wishid = $request->input('submit-delete-wish');
            $userWishes = wishes::getWishes($wishid);
            
            if (!empty($userWishes)) {
                if ($userWishes[0]->user_id == Auth::id()) {
                    $data = array('id'=>$wishid);

                    $wish->deleteWishes($data);

                    if(File::exists("storage/images/$oldwishimage")) {
                        File::delete("storage/images/$oldwishimage");
                    }
                } else {
                    $error = "er is iets fout gegaan";
                }
            } else {
                $error = "er is iets fout gegaan";
            }
        }
        
        $users = User::getAllUsers();
        $wishes = wishes::getAllWishes();
        return view('/wishes')->with("users", $users)->with("wishes", $wishes)->with("error", $error);
    }

    public function indexWishes(){
        $users = User::getAllUsers();
        $wishes = wishes::getWishesUser(Auth::id());
        return view('wishes')->with("users", $users)->with("wishes", $wishes);
    }

}
