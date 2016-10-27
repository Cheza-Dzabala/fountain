
@extends('layouts.master')

@section('title')
    F.M.F.S | Client Index
@endsection

@section('styles')
    <link href="{{ asset('../assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Client Index
@endsection

@section('content')
    <div class="row widget-row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Client Index <a href="{{ route('clients.new') }}">New</a></span>
                    </div>

                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                        <thead>
                        <tr class="">
                            <th> Client First Name </th>
                            <th> Client Last Name </th>
                            <th> Contact Number </th>
                            <th> Gender </th>
                            <th> Employment Status </th>
                            <th> Location </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->firstName }}</td>
                                <td>{{ $client->lastName }}</td>
                                <td>{{ $client->primaryContactNumber }}</td>
                                <td>{{ $client->gender }}</td>
                                <td>@if($client->employmentStatus  == '1') Employed @else Unemployed @endif</td>
                                <td>{{ $client->location }}</td>
                                <td>
                                    <a href="{{ route('client.view', $client->id) }}" type="button" class="btn btn-info btn-sm">View</a>
                                    <a href="" type="button" class="btn btn-info btn-sm">Activate </a>
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
