<?php

namespace App\Http\Controllers\Admin;

use App\Offer;
use Faker\Generator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CrudOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offers=Offer::with(['categories'])->where('user_id', Auth::user()->id)->get();
        // dd($offers->jsonSerialize());
        return response($offers->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Generator $faker)
    {
      $crud = new Offer();
      $crud->name = '';
      $crud->costo_mensile = 0;
      $crud->descrizione ='';
      $crud->data_inizio = date("Y/m/d");
      $crud->data_fine= date("Y/m/d",strtotime("+92 day"));
      $crud->user_id = Auth::user()->id;
      $crud->save();
      return response($crud->jsonSerialize(), Response::HTTP_CREATED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $crud = Offer::findOrFail($id);
      $crud->name = $request->name;
      $crud->costo_mensile = $request->costo_mensile;
      $crud->descrizione = $request->descrizione;
      $crud->data_inizio = $request->data_inizio;
      $crud->data_fine = $request->data_fine;
      $crud->save();
      $crud->categories()->sync($request->categories);
    //   foreach ($request->categories as $category) {
    //       $crud->categories()->attach($category);
    //   }
      return response(null, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Offer::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}
