@extends('layouts.profile')

@section('content')

<div class="row">
    <div class="col-8 offset-2">
        <h2 id="name">Edit link</h2>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            
        @endif

        <form method="get" action=" {{ route('link.update', $link->id) }} ">
            @csrf

            <div class="form-group">
                <label for="input_url">Link</label>
                <input type="text" name="input_url" class="form-control" value="{{ $link->input_url }}">
            </div>
            <div class="form-group">
                <label for="output_url">Redirect</label>
                <input type="text" name="output_url" class="form-control" value="{{ $link->output_url }}">
            </div>
            <br>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>


</div>



@endsection