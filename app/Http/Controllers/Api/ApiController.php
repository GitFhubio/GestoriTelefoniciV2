<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\Offer;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function categories(){
        $categories=Category::all();
        return response()->json($categories);
}

public function operators(){
    $operators=User::Where('id','>',1)->take(9)->get();
    return response()->json($operators);
}

public function offers(){
    $offers=Offer::orderBy('created_at','desc')->take(9)->get();
    //dd($offers);
    return response()->json($offers);
}

public function filteredOffers($name){
$offers = Offer::with(['categories'])->whereHas('categories', function($query) use($name) {
    $query->where('nome', $name);
})->get();
return response()->json($offers);
}
}
