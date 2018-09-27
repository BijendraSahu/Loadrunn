@extends('admin_master')

@section('title','List of Keys')

@section('content')
    <div class="row box_containner">
        <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="dash_boxcontainner white_boxlist">
                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                         List of Keys
                        <button onclick="add_frn()" class="btn btn-default pull-right"><i
                                    class="mdi mdi-plus"></i>Add</button>
                      </span>
                    <table id="example" class="table table-bordered dataTable table-striped" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="bg-info">
                            <th class="hidden">Id</th>
                            <th class="options">Options</th>
                            <th>Key</th>
                            <th>Assigned to</th>
                            <th>Remaining</th>
                            <th>Active Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($keys)>0)
                            @foreach($keys as $key)
                                <tr>
                                    <td class="hidden">{{$key->id}}</td>
                                    <td id="{{$key->id}}">
                                        @if($key->is_active == 1)
                                            <a href="#" id="{{$key->id}}" onclick="inactive_user(this)"
                                               class="btn btn-sm btn-danger"
                                               title="Inactivate" data-toggle="tooltip"
                                               data-placement="top">
                                                <span class="mdi mdi-delete"></span> Inactivate</a>
                                        @else
                                            <a href="#" id="{{$key->id}}" onclick="active_user(this)"
                                               class="btn btn-sm btn-primary"
                                               title="Activate" data-toggle="tooltip" data-placement="top">
                                                <span class="mdi mdi-check"></span> Activate</a>

                                        @endif
                                        @if(!isset($key->franchise_id))
                                            <a href="#" id="{{$key->id}}" onclick="assign_key(this)"
                                               class="btn btn-sm btn-success"
                                               title="Assign to any franchise" data-toggle="tooltip"
                                               data-placement="top">
                                                <span class="mdi mdi-check"></span> Assign</a>
                                        @else
                                            <a href="#" id="{{$key->id}}" onclick="empty_key(this)"
                                               class="btn btn-sm btn-success"
                                               title="Empty Key" data-toggle="tooltip"
                                               data-placement="top">
                                                <span class="mdi mdi-check"></span> Empty</a>
                                        @endif
                                    </td>
                                    <td>{{$key->key_name}}</td>
                                    <td>{{isset($key->franchise_id)?$key->franchise->name:'N/A'}}</td>
                                    <td>{{isset($key->franchise_id)?$key->remaining:'N/A'}}</td>
                                    <td>
                                        @if($key->is_active == 1)
                                            <p class="bg-success">Active</p>
                                        @else
                                            <p class="bg-danger">Inactive</p>

                                        @endif
                                    </td>
                                    {{--<td> {{ date_format(date_create($key->last_login), "d-M-Y h:i A")}}</td>--}}
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <script>

        function add_frn() {
            $('#myModal').modal('show');
            $('#modal_title').html('Add New Franchise');
            $('#mybody').html('<img height="50px" class="center-block" src="{{url('assets/images/loading.gif')}}"/>');
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('key/create') }}",
                success: function (data) {
                    $('#mybody').html(data);
                },
                error: function (xhr, status, error) {
                    $('#mybody').html(xhr.responseText);
                }
            });
        }

        function inactive_user(dis) {
            var id = $(dis).attr('id');
            $('#myModal').modal('show');
            $('#mybody').html('<img height="50px" class="center-block" src="{{ url('assets/images/loading.gif') }}"/>');
            $('#modal_title').html('Confirm Inactivation');
            $('#mybody').html('<h5>Are you sure want to Inactivate this key<h5/>');
            $('#modalBtn').removeClass('hidden');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('key') }}/' + id +
                '/inactivate"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        }

        function active_user(dis) {
            var id = $(dis).attr('id');
            $('#myModal').modal('show');
            $('#mybody').html('<img height="50px" class="center-block" src="{{ url('assets/images/loading.gif') }}"/>');
            $('#modal_title').html('Confirm Activation');
            $('#mybody').html('<h5>Are you sure want to activate this key<h5/>');
            $('#modalBtn').removeClass('hidden');
            $('#modalBtn').html('<a class="btn btn-sm btn-success" href="{{ url('key') }}/' + id +
                '/activate"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        }
        function empty_key(dis) {
            var id = $(dis).attr('id');
            $('#myModal').modal('show');
            $('#mybody').html('<img height="50px" class="center-block" src="{{ url('assets/images/loading.gif') }}"/>');
            $('#modal_title').html('Confirm Activation');
            $('#mybody').html('<h5>Are you sure want to empty this key<h5/>');
            $('#modalBtn').removeClass('hidden');
            $('#modalBtn').html('<a class="btn btn-sm btn-success" href="{{ url('key') }}/' + id +
                '/empty"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        }

        function assign_key(dis) {
            $('#myModal').modal('show');
            $('#modal_title').html('Assign key to franchise');
            $('#mybody').html('<img height="50px" class="center-block" src="{{url('assets/images/loading.gif')}}"/>');

            var id = $(dis).attr('id');
            var editurl = '{{ url('/') }}' + "/assign_key/" + id;
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: editurl,
                data: '{"data":"' + id + '"}',
                success: function (data) {
                    $('#mybody').html(data);
                },
                error: function (xhr, status, error) {
                    $('#mybody').html(xhr.responseText);
                    //$('.modal-body').html("Technical Error Occured!");
                }
            });
        }
    </script>
@stop
