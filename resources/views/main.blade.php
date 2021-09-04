@extends('layouts.main')

@section('content')



@endsection
@push('styles')

    {{-- Bootstrap icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    {{-- Google fonts --}}
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet" type="text/css" >
    {{-- Bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    {{-- Core theme CSS (includes Bootstrap) --}}
<link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />

    {{-- Global site tag (gtag.js) - Google Analytics --}}
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3YV643GP6L"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-3YV643GP6L');
</script>

@endpush

@push('scripts')
{{-- Scripts --}}
    {{-- Popper --}}
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    {{-- Core theme JS --}}
<script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
    {{-- Clipboard JS --}}
<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
    {{-- Custom JS --}}
<script src="{{ asset('assets/js/script.js') }}"></script>

@if(session()->has('linkCreated'))
    <script>
        var linkCreatedModal = new bootstrap.Modal(document.getElementById('modal-linkCreated'));
        linkCreatedModal.show();
    </script>
@endif

@endpush


