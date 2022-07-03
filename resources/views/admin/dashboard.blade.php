@extends('layouts.admin_layout')
@section("links")
<!--begin::Page Vendors Styles(used by this page)-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<!--end::Page Vendors Styles-->
@endsection
@section('content')

            @if (session()->has('success'))
                <div class="alert alert-custom alert-light-success fade show mb-5 d-flex py-2" role="alert">
                    <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                    <div class="alert-text">{{ session()->get('success') }}
                    </div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div>
            @endif
            @if (session()->has('rejected'))
                <div class="alert alert-custom alert-light-danger fade show mb-5 d-flex py-2" role="alert">
                    <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                    <div class="alert-text">{{ session()->get('rejected') }}
                    </div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div>
            @endif
            @if (session()->has('warning'))
                <div class="alert alert-custom alert-light-warning fade show mb-5 d-flex py-2" role="alert">
                    <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                    <div class="alert-text">{{ session()->get('warning') }}
                    </div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div>
            @endif


            <div class="card">
                <div class="card-header flex-wrap">
                    <div class="row w-100 align-items-center justify-content-between">
                        <div class="col">
                            <h3>Templates Tracked</h3>
                        </div>
                        <div>
                            <button type="button" data-toggle="modal" data-target="#deleteAll" class="btn btn-sm btn-danger">Delete All</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered " id="timesheetDatatable">
                        <thead>

                            <tr class="text-center">
                                <th>#</th>
                                <th>IP</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Template Name</th>
                                <th>Date</th>
                                <th> Action </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($info as $value)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->IP  }}</td>
                                    <td>{{ $value->city  }}</td>
                                    <td>{{ $value->country  }}</td>
                                    <td>{{ $value->TemplateName  }}</td>
                                    <td> {{ \Carbon\Carbon::parse($value->created_at)->format('d M Y') }} </td>
                                    <th> <button  class="btn btn-danger btn-sm delete-button" data-info={{ $value->id }}  data-toggle="modal" data-target="#delete"><i data-info={{ $value->id }} class="flaticon-delete icon-md"> </i></button></th>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

@include("modals.delete_all")
@include("modals.delete")

@endsection

@section("scripts")
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script src="{{ asset("dev-assets/js/admin/dashboard.js") }}"></script>
<script>
    $(document).ready(function() {
        $('#timesheetDatatable').DataTable();
    });
</script>
@endsection
