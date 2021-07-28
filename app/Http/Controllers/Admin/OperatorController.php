<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OperatorController extends Controller
{
public function admin(){
        $user=User::find(1);
        //dd($offers);
        return response()->json($user);
    }

 public function viewAdmin(){
     return view('admin');
 }
}
