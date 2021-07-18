@extends('layouts.profile')

@section('content')
  <a href="/profile"><div>Back</div></a>
  <div><a href="https://wann.fun/{{ $link->input_url }}">wann.fun/{{ $link->input_url }}</a></div>

  <div>Visits {{ $stats->count() }}</div>

  @foreach ( $stats as $stat)
    <div class="row">
      <div class="col-6">{{ $stat->geo }}</div>
      <div class="col-6">{{ $stat->created_at }}</div> 
    </div>
    
  @endforeach
  



@endsection