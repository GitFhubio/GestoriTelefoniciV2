<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Offer;
use App\Category;
use App\Mail\MyReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Lead;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//test report
// $myleadsCollection=Lead::all();
// $totalLeads= $myleadsCollection->count();
// $totalTodayLeads= Lead::whereDate('created_at',date("Y-m-d"))->count();
// $totalLeadsToManage= $myleadsCollection->where('status','da gestire')->count();
// $totalOkLeads= $myleadsCollection->where('status','ok')->count();
// $totalNonOkLeads= $myleadsCollection->where('status','non ok')->count();
// $activeOffers=Offer::all()->where('data_fine','>',date("Y-m-d"))->count();

// $totalOffers=Offer::all();

// $ratio=[];
// foreach($totalOffers as $offer){
// $offer_id=$offer->id;
// $count=$offer->leads()->where('status','ok')->count() / $offer->count();
// $ratio[]=["offer_id"=>$offer->id,"count"=>$count];
// }
// //dd($percentage);
// $result=[
// "totalLeads"=>$totalLeads,
// "totalTodayLeads"=>$totalTodayLeads,
// "totalLeadsToManage"=>$totalLeadsToManage,
// "totalOkLeads"=>$totalOkLeads,
// "totalNonOkLeads"=>$totalNonOkLeads,
// "activeOffers"=>$activeOffers,
// "ratio"=>$ratio
// ];
// Mail::to(User::find(1))->send(new MyReport($result));
$offers=Offer::where('user_id', Auth::user()->id)->get();
        return view('user.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('user.offers.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateForm($request);
        $data=$request->all();
        $data['user_id']=Auth::id();
        $categories= $data['categories'];
        $offer= new Offer();
        $offer->fill($data);
        $offer->save();
        $offer->categories()->attach($categories);
        return redirect()->route('offers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        return view('user.offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        $categories=Category::all();
        return view('user.offers.edit', compact('offer','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $this->validateForm($request);
        $data= $request->all();
        $offer->update($data);
        $newcategories=$data['categories'];
        $offer->categories()->sync($newcategories);
        return redirect()->route('offers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offers.index');
    }
    protected function validateForm(Request $request){
        $request->validate([
            'name'=>'required|max:50',
            'costo_mensile'=>'required|numeric|between:0,99.99',
            'descrizione'=>'max:250',
            'data_inizio'=>'date',
            'data_fine'=>'date',
          ]);
    }
}
