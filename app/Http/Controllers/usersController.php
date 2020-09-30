<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\Console\Helper\Table;
use Illuminate\Support\Facades\Auth;
use DateTime;

class usersController extends Controller
{

    public function updatePermission (Request $request){
        
        // $article = new articles();
        // $pageId = $request->input('page_id');
        // $titel = $request->input('titel');
        // $subtitel = $request->input('subtitel');
        // $content = $request->input('text');
        // $author = "comming soon";
        // $editPermission = 1;
        // $pos = $request->input('pos');
        // $imgUrl = "comming soon";

        // $data = array('page_id'=>$pageId, 'titel'=>$titel, 'subtitel'=>$subtitel, 'text'=>$content,
        //     'img_url'=>$imgUrl, 'author'=>$author, 'editPermission'=>$editPermission, 'pos'=>$pos);
        // $article->editArticles($data);

        $user = new User();
        $userid;
        if ($request->has('submit-edit-admin')) {
            $userid = $request->input('submit-edit-admin');
            $data = array('id'=>$userid, 'permission'=>'admin');
        } else {
            $userid = $request->input('submit-edit-user');
            $data = array('id'=>$userid, 'permission'=>'user');
        }
        // dd($data);
        $user->editUser($data);

        $users = User::getAllUsers();
        return view('/admin')->with("users", $users);
    }

    public function indexPage(){
        $users = User::getAllUsers();
        return view('/admin')->with("users", $users);
    }
}
