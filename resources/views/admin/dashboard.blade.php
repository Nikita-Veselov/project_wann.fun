<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js" integrity="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@extends('layouts.profile')

@section('content')
    <h1>GREAT AND GLORIOUS ADMIN PAGE!</h1>
    <div>Registered users:{{ $users->count() }}</div>

    <div>Created links:{{ $links->count() }}</div>
    <div>All-time unique visitors:{{ $visitors->count() }}</div>
    <div>Unique visitors today:{{ $visitorsToday->count() }}</div>
    <div>All time clicks on our links:{{ $clicks->count() }}</div>

    
    <div class="row">
        {{-- unique visitors chart --}}
        <div class="p-2 col-12 col-lg-6">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <x-graph :data="$chart_data" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Number of links by used finisher --}}
        <div class="p-2 col-6 col-lg-3">
            <table class="table table-sm table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>Option</th>
                        <th>Number </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($linkOptionsCount as $option)
                        @foreach ($option as $link => $number)
                        <tr>
                            <td>{{ $link }}</td>
                            <td>{{ $number }}</td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- unique visitors by geo (first 15) --}}
        <div class="p-2 col-6 col-lg-3">
            <table class="table table-sm table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>Geo Mark</th>
                        <th>Number of Visitors</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visitorsCount->sortDesc()->forPage(1,15) as $country => $visitor)
                        <tr>
                            <td>{{ $country }}</td>
                            <td>{{ $visitor }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
