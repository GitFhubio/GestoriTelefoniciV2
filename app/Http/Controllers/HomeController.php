<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::id()>1) {
        $user = User :: find( Auth::id());
            $role = Role :: findById(2); //ti registri come operatore
           if (!$user->hasRole($role)) {
               $user->assignRole($role);
           }
            // return redirect()->route('offers.index');
            return redirect()->route('crudoffer');
        } else{
            return redirect()->route('admin-dashboard');
        }
    }
}
