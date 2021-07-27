<?php
namespace App\Http\Controllers\Admin;
use App\Lead;
use App\Note;
use App\Offer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CrudLeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $offers=Offer::where('user_id', Auth::user()->id)->get();
     $leads = [];
     foreach ($offers as $offer){
         $leads[] =$offer->leads()->get();
     }
     foreach($leads as $lead){
         $lead->load('notes');
        //  return $lead;
     }
     $myfinal=[];
     foreach($leads as $lead){
         $myfinal[] = $lead->toArray();
     }
     $result = call_user_func_array("array_merge", $myfinal);
//  dd($myfinal);

    //  $leadsB = DB::table('offers')
    //  ->select('leads.*','notes.lead_id','notes.messaggio')
    //  ->join('users','offers.user_id','=','users.id')
    //  ->join('leads','leads.offer_id','=','offers.id')
    //  ->join('notes','notes.lead_id','=','leads.id')
    //  ->where('offers.user_id', Auth::user()->id)
    //  ->get();
    //  $leadsAll = Lead::with('notes')->get();

    //  $newleads=$leadsB->toArray();

    //  $result = array_reduce($newleads, function($carry, $item) {
    //      if(!isset($carry[$item->offer_id])) {
    //          $carry[$item->offer_id] = $item;
    //      }
    //     //  else {
    //     //      $carry[$item->messaggio] += $item->messaggio;
    //     //  }
    //      return $carry;
    //  });
// dd($leads);
    //  $result = array_values($result);
    return response($result, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $crud = Lead::findOrFail($id);
        $crud->status=$request->status;
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
        Lead::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}
