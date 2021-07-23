<?php

namespace App\Http\Controllers\Admin;

use App\Lead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Offer;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $user_id=Auth::id();
    //     $offers= Offer::where('user_id',$user_id);
    //     return view('user.leads.index', compact('leads'));
    // }

            /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        return view('user.leads.show', compact('lead'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        return view('user.leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        $this->validateForm($request);
        $data= $request->all();
        $lead->update($data);
        return redirect()->route('offers.index');
    }
    protected function validateForm(Request $request){
        $request->validate([
            'status'=>'required|in:da gestire,ok,non ok',
          ]);
    }

}
