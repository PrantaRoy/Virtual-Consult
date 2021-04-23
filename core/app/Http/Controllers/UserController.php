<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home (){

       return $page_title = "Dashboard";
        return view(activeTheme().'pages.home',compact('page_title'));
    }
}
