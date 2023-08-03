@extends('back.layouts.base')

@section('title') Customer @stop

@section('style')
<link rel="stylesheet" href="{{ asset('global/vendor/datatables.net-bs4/dataTables.bootstrap4.min.css') }}">
@stop

@section('body')
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Customer</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Customer</li>
        </ol>
        <div class="page-header-actions">
            <a href="{{ route('admin.customers.create') }}" class="btn btn-md btn-icon btn-primary btn-round">
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
                            <th width="auto">Name</th>
                            <th width="auto">Nickname</th>
                            <th width="50">Action</th>
                        </tr>
                    </thead>
                </table>
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
            ajax: '{{ route("admin.datatable.customers") }}',
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'nickname', name: 'nickname' },
                { data: 'action', name: 'action', searchable: false, orderable: false },
            ]
        });

        $('.datatable').on('draw.dt', function () {
            $('.btn-delete').on('click', function(e) {
                let id = $(this).data('id');
                let name = $(this).data('name');

                let url = '{{ route("admin.customers.destroy", ':id') }}';
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
