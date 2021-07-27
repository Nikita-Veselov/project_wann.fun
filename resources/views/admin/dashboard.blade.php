<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">
</script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js" integrity="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@extends('layouts.profile')

@section('content')

    <h1>ADMIN PAGE!</h1>
    <div>Registred users:{{ $users->count() }}</div>
    <div>Created links:{{ $links->count()  }}</div>


<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <x-graph :data="$chart_data" />
                <x-table :columns="['Date', 'Visitors']">
                    @forelse ($visitors as $day)
                    <x-table-row :row="[date('d.m.Y', strtotime($day->date)), $day->total]" />
                    @empty
                    <x-table-row :row="['-', 'No data available']" />
                    @endforelse
                </x-table>
            </div>
        </div>
    </div>
</div>

@endsection