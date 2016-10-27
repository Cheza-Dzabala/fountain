
@extends('layouts.master')

@section('title')
    F.M.F.S | Employer Index
@endsection

@section('styles')
    <link href="{{ asset('../assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Employer Index
@endsection

@section('content')
    <div class="row widget-row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Employer Index <a href="{{ route('employer.new') }}">New</a></span>
                    </div>

                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                        <thead>
                            <tr class="">
                                <th> Company Name </th>
                                <th> Contact Person </th>
                                <th> Phone Number </th>
                                <th> Email Address </th>
                                <th> Physical Address </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($employers as $employer)
                            <tr>
                                <td>{{ $employer->name }}</td>
                                <td>{{ $employer->contactPerson }}</td>
                                <td>{{ $employer->primaryContactNumber }}</td>
                                <td>{{ $employer->emailAddress }}</td>
                                <td>{{ $employer->physicalAddress }}</td>
                                <td>
                                    <a href="{{ route('employer.edit', $employer->name) }}" type="button" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('employer.view', $employer->name) }}" type="button" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('employer.delete', $employer->id) }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('../assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/pages/scripts/table-datatables-fixedheader.min.js') }}" type="text/javascript"></script>
@endsection
