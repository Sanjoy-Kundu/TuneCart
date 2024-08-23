<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function customerDashoard(){

        echo Auth::user()->name;
        echo "<a a href='/logout'>Logout</a>";
       
    }
}
