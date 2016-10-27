
@extends('layouts.master')

@section('title')
    F.M.F.S | Identification Settings
@endsection

@section('styles')
    <link href="{{ asset('../assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Identification Settings
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
                            Identification Settings |
                            <a data-toggle="modal" href="#newId"> New</a>
                        </span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="portlet-body form">
                            <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                                <thead>
                                <tr class="">
                                    <th> ID Type Name </th>
                                    <th> Accepted Status</th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ids as $id)
                                    <tr>
                                        <td>{{ $id->name }}</td>
                                        <td>@if ($id->isAccepted == '1') Accepted @else Unaccepted @endif</td>
                                        <td>
                                            <a href="{{ route('settings.clients.id.edit', $id->name ) }}" type="button" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('settings.clients.ids.delete', $id->id) }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Portlet PORTLET-->
        </div>
    </div>

    <div class="modal fade" id="newId"  tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('settings.clients.id.saveNew') }}">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">New ID</h4>
                    </div>
                    <div class="modal-body">
                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name">Name:</label>
                              <input type="text" name="name" class="form-control" id="name" placeholder="Name ..." required>
                              @if ($errors->has('name'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                              @endif
                          </div>
                          <div class="form-group{{ $errors->has('isAccepted') ? ' has-error' : '' }}">
                              <label>Accepted Status  </label>
                              <div class="mt-radio-list">
                                  <label class="mt-radio"> Accepted
                                      <input type="radio" value="1" name="isAccepted" />
                                      <span></span>
                                  </label>
                                  <label class="mt-radio"> Unaccepted
                                      <input type="radio" value="0" name="isAccepted" />
                                      <span></span>
                                  </label>
                              </div>
                              @if ($errors->has('isAccepted'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('isAccepted') }}</strong>
                                    </span>
                              @endif
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn green" value="Save changes">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
