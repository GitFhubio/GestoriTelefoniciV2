<h2>Report di oggi<h2>
<ul>
  <li> Total Leads : {{$report["totalLeads"]}} </li>
  <li>Total Today Leads : {{$report["totalTodayLeads"]}}</li>
  <li>Total Ok Leads : {{$report["totalOkLeads"]}}</li>
  <li>Total Non Ok Leads : {{$report["totalNonOkLeads"]}}</li>
  <li>Active Offers : {{$report["activeOffers"]}}</li>
<ul>
@foreach ($report["ratio"] as $el)
  <li>
    <h4>Offerta #{{$el["offer_id"]}}</h4>
    <p>Ratio OkLeads/TotalLeads : {{number_format($el["count"], 2, ',', '.')}} </p>
    <p>Percentage OkLeads/TotalLeads :{{number_format($el["count"]*100, 2, ',', '.')}} %</p>
  </li>
@endforeach
<ul>


