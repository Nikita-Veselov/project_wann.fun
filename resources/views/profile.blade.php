@extends('layouts.profile')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Links List </h1>
        {{-- <a href="{{ route('admin.news.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i>Add new report</a> --}}
    </div>

    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Link</th>
                    <th>Redirect</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>    
            </thead>
            <tbody>

        @forelse ($links as $link)
            <tr>
                <td>wann.fun/{{ $link->input_url }}</td>
                <td>{{ $link->output_url }}</td>
                <td>{{ $link->created_at }}</td>
                <td>
                    <a href="">Edit</a> &nbsp;
                    <a href="">Delete</a> 
                </td>
            </tr>
            
            @empty           
            <tr>
                <td colspan="4">No news</td>
            </tr>

        @endforelse

            </tbody>
        </table>
    </div>
@endsection