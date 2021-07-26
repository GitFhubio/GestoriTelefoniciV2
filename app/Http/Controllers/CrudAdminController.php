<?php

namespace App\Http\Controllers;

// use App\Crud;
use App\User;
use Faker\Generator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CrudAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $users=User::where('id','>',1)->get();
        return response($users->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Generator $faker)
    {
        $crud=new User();
        $crud->name='test';
        $crud->email='test@outlook.it';
        $crud->password = Hash::make('beinformatica');
        $crud->api_token = Str::random(60);
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
        $crud = User::findOrFail($request->file('my_id'));
        $crud->name = $request->file('my_name');
        $crud->email=$request->file('my_email');
        $crud->img=$request->file('my_file')->store('images');
        $crud->save();
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
      $crud = User::findOrFail($id);
          $crud->name = $request->name;
          $crud->email= $request->email;
    //   if ($request->hasFile('my_file')) {
    //     $crud->img= $request->file('my_file')->store('images');
    // }
    if ($request->hasFile('my_file')) {
        // $path = $request->data->file('my_file')->store('images');
        $crud->img = 'https://i2.wp.com/www.pensierodistillato.it/wp-content/uploads/2012/11/uccellino-in-mano.jpg';
    } else{
        $crud->img='https://solobellenotizie.files.wordpress.com/2010/07/pesciolino1.jpg';


    }
    //  ->store('images');
      $crud->save();

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
      User::destroy($id);

      return response(null, Response::HTTP_OK);
    }
}
