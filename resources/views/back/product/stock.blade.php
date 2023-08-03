@extends('back.layouts.base')

@section('title') Product @stop

@section('style')
<link rel="stylesheet" href="{{ asset('global/vendor/datatables.net-bs4/dataTables.bootstrap4.min.css') }}">
@stop

@section('body')
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Product - {{ $product->name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Product</a></li>
            <li class="breadcrumb-item active">Stock - {{ $product->name }}</li>
        </ol>
        <div class="page-header-actions">
            <a href="{{ route('admin.products.index') }}" class="btn btn-md btn-secondary btn-round">
                <i class="icon wb-chevron-left" aria-hidden="true"></i>
                <span class="text hidden-sm-down">Back</span>
            </a>
            <a href="javascript:void(0)" class="btn btn-md btn-icon btn-primary btn-round"
                onclick="$('#add-modal').modal('show')">
                <i class="icon wb-plus" aria-hidden="true"></i> &nbsp; Add New
            </a>
        </div>
    </div>
    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">
                <div class="panel-actions"></div>
                <h3 class="panel-title"></h3>
            </header>
            <div class="panel-body">
                <table class="table table-hover datatable table-striped w-full">
                    <thead>
                        <tr>
                            <th width="15">#</th>
                            <th width="auto">Quantity</th>
                            <th width="150">Created At</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-primary" id="add-modal" aria-hidden="true" aria-labelledby="add-modal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Add New</h4>
            </div>
            <div class="modal-body">
                <form class="addStockForm" method="POST" action="{{ route('admin.products.stock.store') }}"> @csrf
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control">
                    </div>
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary" onclick="$('.addStockForm').submit();">
                    Add
                </button>
            </div>
        </div>
    </div>
</div>

@include('back.layouts.modal')
@stop

@section('script')
<script src="{{ asset('global/vendor/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('global/vendor/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $('.datatable').DataTable({
            searchDelay: 1500,
            processing: true,
            serverSide: true,
            ajax: '{{ route("admin.datatable.products.stock", $product->id) }}',
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'quantity', name: 'quantity' },
                { data: 'created_at', orderable: false, searchable: false },
            ]
        });

        $('.datatable').on('draw.dt', function () {
            $('.btn-delete').on('click', function(e) {
                let id = $(this).data('id');
                let name = $(this).data('name');

                let url = '{{ route("admin.products.destroy", ':id') }}';
                url = url.replace(':id', id);

                $('.delete-type').html('Product');
                $('.delete-hint').html(name);

                $('.btn-confirm-delete').on('click', function(e) {
                    $('.hiddenDeleteForm').attr('action', url)
                    $('.hiddenDeleteForm').submit();
                });
            });
        });
    });
</script>
@if(session('message'))
    <script>
        toastr["success"]("{{ session('message') }}", "Success");
    </script>
@endif
@stop
