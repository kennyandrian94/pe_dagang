@extends('back.layouts.base')

@section('title') Order @stop

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('global/vendor/select2/select2.min.css') }}">
@stop

@section('body')
<div class="page">
    {{ Form::open(['route' => $route == 'admin.orders.store' ? $route : [$route, $order->id], 'method' => $route == 'admin.orders.store' ? 'POST' : 'PUT', 'files' => 'true']) }}
        <div class="page-header">
            <h1 class="page-title">{{ $route == 'admin.orders.store' ? 'Create Order' : 'Edit Order' }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Order</a></li>
                <li class="breadcrumb-item active">{{ $route == 'admin.orders.store' ? 'Create' : 'Edit' }}</li>
            </ol>
            <div class="page-header-actions">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-md btn-secondary btn-round">
                    <i class="icon wb-chevron-left" aria-hidden="true"></i>
                    <span class="text hidden-sm-down">Back</span>
                </a>
                @if ($route == 'admin.orders.store')
                    <button type="submit" class="btn btn-md btn-success btn-round">
                        <i class="icon wb-check" aria-hidden="true"></i>
                        <span class="text hidden-sm-down">Save</span>
                    </button>
                @else
                    <button type="submit" class="btn btn-md btn-warning btn-round">
                        <i class="icon wb-pencil" aria-hidden="true"></i>
                        <span class="text hidden-sm-down">Save</span>
                    </button>
                @endif
            </div>
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-xs-12 col-12">
                    <div class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions"></div>
                            <h3 class="panel-title"></h3>
                        </header>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('product_id', 'Product', ['class' => 'form-control-label']) }}
                                    {!! Form::select('product_id', $product_array, $product_select, ['autocomplete' => 'off', 'class' => 'form-control', 'id' => 'product_id']) !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('customer_id', 'Customer', ['class' => 'form-control-label']) }}
                                    {!! Form::select('customer_id', $customer_array, $customer_select, ['autocomplete' => 'off', 'class' => 'form-control', 'id' => 'customer_id']) !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('quantity', 'Quantity', ['class' => 'form-control-label']) }}
                                    {{ Form::text('quantity', $order->quantity, ['autocomplete' => 'off', 'class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('status', 'Status', ['class' => 'form-control-label']) }}
                                    {{ Form::select('status', ['belum_lunas' => 'Belum Lunas', 'lunas' => 'Lunas'], $order->status, ['autocomplete' => 'off', 'class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{ Form::close() }}
</div>
@stop

@section('script')
<script type="text/javascript" src="{{ asset('global/vendor/select2/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#customer_id').select2(select2Ajax('Pilih Customer', '{{ route("admin.select2.customers") }}'));
        $('#product_id').select2(select2Ajax('Pilih Product', '{{ route("admin.select2.products") }}'));
    });
</script>
<script type="text/javascript">
function select2Ajax(placeholder, url) {

    return {
        placeholder: placeholder,
        allowClear: true,
        ajax : {
            url : url,
            dataType : 'json',
            delay : 200,
            data : function(params){
                return {
                    q : params.term,
                    page : params.page
                };
            },
            processResults : function(data, params){
                params.page = params.page || 1;

                return {
                    results : data.data,
                    pagination: {
                        more : (params.page  * 10) < data.total
                    }
                };
            }
        },
        minimumInputLength : 0,
        templateResult : function (repo)
        {
            if(repo.loading) return 'Searching ...';

            var markup =  repo.name;

            return markup;
        },
        templateSelection : function(repo)
        {
            var markup2 = repo.text || repo.name;
                
            return markup2;
        },
        escapeMarkup : function(markup){ return markup; }
    }
}
</script>
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
