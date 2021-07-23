<?php

namespace App\Http\Controllers;

use App\Lead;
use App\Note;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
   public function store(Request $request){
        $this->validateForm($request);
        $checkLead= Lead::where('email', '=', $request->email )->first();
        if ($checkLead === null) {
        $newLead = new Lead();
        $newLead->offer_id = $request->offer_id;
        $newLead->nome = $request->nome;
        $newLead->cognome = $request->cognome;
        $newLead->telefono = $request->telefono;
        $newLead->email = $request->email;
        $newLead->status = $request->status;
        $newLead->save();
        }
        $newNote =new Note();
        $lead= $checkLead == null ? $newLead : $checkLead;
        $newNote->lead_id =$lead->id;
        $newNote->messaggio ='Inviato da '.$lead->nome.':'.$request->messaggio;
        $newNote->save();
        return redirect()->route('success-request');
    }
    protected function validateForm(Request $request){
        $request->validate([
            'nome'=>'required|max:50',
            'cognome'=>'required|max:50',
            'telefono'=>'required|digits:10',
            'email'=>'required|email',
          ]);
    }
}
