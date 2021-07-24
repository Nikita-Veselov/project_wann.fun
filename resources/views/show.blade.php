@extends('layouts.profile')

@section('content')

  <div><a class="main-link" href="https://wann.fun/{{ $link->input_url }}">wann.fun/{{ $link->input_url }}</a></div>

  <div>Visits: {{ $stats->count() }}</div>

  @php
    $countries = [];
    $geo_clicks = [];
    $date = [];
    $date_clicks = [];
    
    if ($stats->count() == 0) {
      
    } else {
      $date_test = $stats[0]->created_at->diffInDays(now());

      for ($i=0; $i < $date_test+2; $i++) { 
        $date[$i] = $stats[0]->created_at->addDay($i)->isoFormat('DD.MM.YY'); 
        $date_clicks[$i] = 0;
      }

      foreach ($stats as $stat) {
        if(in_array($stat->geo, $countries)) {
          $geo_clicks[array_search($stat->geo, $countries)]++;
        } else {
          array_push($countries, $stat->geo);
          array_push($geo_clicks, 1);
        }

        $stat = $stat->created_at->isoFormat('DD.MM.YY');
        
        if(in_array($stat, $date)) {$date_clicks[array_search($stat, $date)]++;}
      }
    }

    

  @endphp
    
  {{-- MOVE THIS BLOCK TO PROFILE LINK SHOW PAGE --}}
  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous">
  </script>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js" integrity="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <div class="geoChartData" style="display: none">{{ json_encode($geo_clicks) }}</div>
  <div class="geoChartLabels" style="display: none">{{ json_encode($countries) }}</div>   

  <div class="clicksChartData" style="display: none">{{ json_encode($date_clicks) }}</div>
  <div class="clicksChartLabels" style="display: none">{{ json_encode($date) }}</div>   

  {{-- PUT THIS WHERE CHARTS GONNA BE --}}
  <div class="row">
    <div class="col-12 col-md-6"><canvas class="clicksChart" width="100%" height="65px"></canvas></div>
    <div class="col-12 col-md-4"><canvas class="geoChart" width="100%" height="auto"></canvas></div>
  </div>

  {{-- PUT THIS SCRIPT IN SEPARATE CHARTS FILE --}}
  <script>
    ctx = $("canvas.geoChart")

    data = $("div.geoChartData").html();
    dataJSON = JSON.parse(data);

    labels = $("div.geoChartLabels").html();
    labelsJSON = JSON.parse(labels);

    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labelsJSON,
            datasets: [{
                label: "geoClicks",
                data: dataJSON,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(155, 55, 235, 0.2)',
                    'rgba(55, 205, 86, 0.2)',
                    'rgba(200, 125, 135, 0.2)',
                    'rgba(95, 225, 86, 0.2)',
                    'rgba(185, 35, 235, 0.2)',
                    'rgba(65, 195, 135, 0.2)',
                    'rgba(235, 85, 165, 0.2)',
                    'rgba(50, 215, 75, 0.2)',
                ],
                borderColor: [
                  'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(155, 55, 235, 1)',
                    'rgba(55, 205, 86, 1)',
                    'rgba(200, 125, 135, 1)',
                    'rgba(95, 225, 86, 1)',
                    'rgba(185, 35, 235, 1)',
                    'rgba(65, 195, 135, 1)',
                    'rgba(235, 85, 165, 1)',
                    'rgba(50, 215, 75, 1)',
                ],
                borderWidth: 1,
                hoverOffset: 4,
            }]
        },

    });

    ctx2 = $("canvas.clicksChart")

    data2 = $("div.clicksChartData").html();
    dataJSON2 = JSON.parse(data2);
    labels2 = $("div.clicksChartLabels").html();
    labelsJSON2 = JSON.parse(labels2);

    var myChart = new Chart(ctx2, {
      type: 'line',
      data: {
        labels: labelsJSON2,
        datasets: [{
          label: "Clicks",
          data: dataJSON2,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)'
          ],
          tension: 0.3,
          fill: true,
        }]
      },      
    });

  </script>

@endsection