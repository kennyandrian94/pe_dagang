@extends('back.layouts.base')

@section('title') Dashboard @stop

@section('style')
@stop

@section('body')
<!-- Page -->
<div class="page">
    <div class="page-content">
        <h2 style="margin-top: 0; margin-bottom: 30px;">Welcome, <span style="color: #cc3b2b;text-transform: capitalize;">{{ Auth::user()->name }}</span></h2>
        {{-- <div class="alert alert-primary" role="alert" style="margin-top: 25px;">
            <div>
                Silahkan memanfaatkan sebaik mungkin fitur yang disediakan.
            </div>
        </div> --}}
    </div>
</div>
<!-- End Page -->
@stop

@section('script')
@if($errors->any())
    <script>
        toastr["error"]("@foreach($errors->all() as $x) {{ $x }} <br> @endforeach", "Error");
    </script>
@endif
@if(session('message'))
    <script>
        toastr["success"]("{{ session('message') }}", "Success");
    </script>
@endif
@stop