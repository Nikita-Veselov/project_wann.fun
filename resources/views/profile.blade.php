@extends('layouts.profile')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Links List </h1>
        {{-- <a href="{{ route('admin.news.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i>Add new report</a> --}}
    </div>

        @forelse ($links as $link)

            <div class="row pl-4 pb-2"> 
                <div class="col-lg-7 col-12">
                    <div class="row font-weight-bold">
                        <a class="main-link" href="http://wann.fun/{{ $link->input_url }}"> 
                                wann.fun/{{ $link->input_url }}
                        </a>  
                    </div>
                    
                    <div class="font-weight-light font-italic">
                        <a class="redirect-link" href="{{ $link->output_url }}">{{ $link->output_url }}</a>
                    </div>
                </div> 

                <div class="col-lg-3 col-12">
                    <p class="date-link">{{ $link->created_at }}</p>
                </div>  
                        
                <div class="col-lg-2 col-12">
                    <a class="btn btn-sm btn-primary" href="{{ route('link.show', $link->id) }}">Stats</a>
                    <a class="btn btn-sm btn-secondary" href="{{ route('link.edit', $link->id) }}">Edit</a>
                    <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#deleteModal{{ $link->id }}">Delete</a>
                </div>           
                
                <!-- Delete Modal-->
                <div class="modal fade" tabindex="-1" id="deleteModal{{ $link->id }}" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete the link?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Delete" below if you are sure to delete this link.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger" href="{{ route('link.destroy', $link->id) }}">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 divider pt-2"></div>
                
            </div> 

        @empty           
            <div>No links</div>

        @endforelse


    
@endsection