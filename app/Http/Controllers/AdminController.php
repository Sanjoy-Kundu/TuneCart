<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashoard(){
        return view('pages.auth.admin.dashboard.index');
    }

    public function adminProfile(){
        return view('pages.auth.admin.profile.index');
    }
}
