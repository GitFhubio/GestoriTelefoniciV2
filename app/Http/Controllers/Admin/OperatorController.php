<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OperatorController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $users=User::where('id','>',1)->get();
    //     return view('user.operators.index', compact('users'));
    // }
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(User $operator)
    // {
    // return view('user.operators.show',  ['operator'=>$operator]);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(User $operator)
    // {
    //     return view('user.operators.edit', ['operator'=>$operator]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, User $operator)
    // {
    //     $this->validateForm($request);
    //     $data= $request->all();
    //     if($request->file('image')){
    //         $operator->img = $request->file('image')->store('images');
    //     }
    //     if ($request->file('banner')) {
    //         $operator->backimg = $request->file('banner')->store('images');
    //     }
    //     $operator->update($data);
    //     return redirect()->route('operators.index');
    // }
    // public function destroy(User $operator)
    // {
    //     $operator->delete();
    //     return redirect()->route('operators.index');
    // }

    // protected function validateForm(Request $request){
    //     $request->validate([
    //         'name'=>'required|max:50',
    //         'email'=>'required|email',
    //         'password'=>'required|min:8',
    //         'img'=>'image|mimes:jpg,png,jpeg,gif,svg',
    //         'backimg'=>'image|mimes:jpg,png,jpeg,gif,svg',
    //       ]);
    // }

 public function __invoke(){
     return view('admin');
 }
}
