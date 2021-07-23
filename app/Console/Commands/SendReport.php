<?php

namespace App\Console\Commands;

use App\Lead;
use App\User;
use App\Offer;
use App\Mail\MyReport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

            $myleadsCollection=Lead::all();
            $totalLeads= $myleadsCollection->count();
            $totalTodayLeads= Lead::whereDate('created_at',date("Y-m-d"))->count();
            $totalLeadsToManage= $myleadsCollection->where('status','da gestire')->count();
            $totalOkLeads= $myleadsCollection->where('status','ok')->count();
            $totalNonOkLeads= $myleadsCollection->where('status','non ok')->count();
            $activeOffers=Offer::all()->where('data_fine','>',date("Y-m-d"))->count();

            $totalOffers=Offer::all();

            $ratio=[];
            foreach($totalOffers as $offer){
            $count=$offer->leads()->where('status','ok')->count() / $offer->count();
            $ratio[]=["offer_id"=>$offer->id,"count"=>$count];
            }
            $result=[
            "totalLeads"=>$totalLeads,
            "totalTodayLeads"=>$totalTodayLeads,
            "totalLeadsToManage"=>$totalLeadsToManage,
            "totalOkLeads"=>$totalOkLeads,
            "totalNonOkLeads"=>$totalNonOkLeads,
            "activeOffers"=>$activeOffers,
            "ratio"=>$ratio
            ];
            Mail::to(User::find(1))->send(new MyReport($result));
    }
}
