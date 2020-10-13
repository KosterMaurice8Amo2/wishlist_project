<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\wishes;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\Console\Helper\Table;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::getAllUsers();
        $wishes = wishes::getAllWishes();
        return view('home')->with("users", $users)->with("wishes", $wishes);
    }
}
