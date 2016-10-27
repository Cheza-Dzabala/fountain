
@extends('layouts.master')

@section('title')
    F.M.F.S | Permissions
@endsection

@section('styles')
    <link href="{{ asset('../assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
  {{ $role->display_name }}  Permissions
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user font-yellow-casablanca"></i>
                        <span class="caption-subject bold font-yellow-casablanca uppercase">
                           Permissions
                        </span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="portlet-body form">
                            <form class="form-horizontal" method="post" action="{{ route('settings.users.savePermissions', $role->id) }}">
                               {{ csrf_field() }}
                                <div class="md-checkbox-inline">
                                    @foreach($permissions as $permission)
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="{{ $permission->id }}" name="permission[]" value="{{ $permission->id }}"
                                                   class="md-check"
                                            @foreach($rolePerms as $rolePerm)
                                                @if($permission->name == $rolePerm->name)
                                                    checked
                                                @endif
                                            @endforeach
                                            >
                                            <label for="{{ $permission->id }}">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> {{ $permission->display_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <input type="submit" class="btn btn-info btn-sm">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Portlet PORTLET-->
        </div>
    </div>


@endsection


@section('plugins')
    <script src="{{ asset('../assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
@endsection





@section('scripts')
    <script src="{{ asset('../assets/pages/scripts/ui-modals.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/pages/scripts/table-datatables-fixedheader.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
@endsection
