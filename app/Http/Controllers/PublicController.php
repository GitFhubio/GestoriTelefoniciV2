<?php

namespace App\Http\Controllers;

use App\Lead;
use App\User;
use App\Offer;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function show($id)
    {
        $user= User::where('id', $id)->get()->first();
        return view('public-menu', compact('user'));
    }
    public function detail($id)
    {
        $offer= Offer::where('id', $id)->get()->first();
        return view('offer-detail', compact('offer'));
    }

}
