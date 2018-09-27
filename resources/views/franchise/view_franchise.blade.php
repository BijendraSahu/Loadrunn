@extends('admin_master')

@section('title','List of Franchises')

@section('content')
    <div class="row box_containner">
        <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="dash_boxcontainner white_boxlist">
                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                         List of Franchises
                        <button onclick="add_frn()" class="btn btn-default pull-right"><i
                                    class="mdi mdi-plus"></i>Add</button>
                      </span>
                    <table id="example" class="table table-bordered dataTable table-striped" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="bg-info">
                            <th class="hidden">Id</th>
                            <th class="options">Options</th>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Username</th>
                            <th>Active Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($user_masters)>0)
                            @foreach($user_masters as $user_master)
                                <tr>
                                    <td class="hidden">{{$user_master->id}}</td>
                                    <td id="{{$user_master->id}}">
                                        @if($user_master->is_active == 1)
                                            <a href="#" id="{{$user_master->id}}" onclick="inactive_user(this)"
                                               class="btn btn-sm btn-danger"
                                               title="Inactivate" data-toggle="tooltip"
                                               data-placement="top">
                                                <span class="mdi mdi-delete"></span> Inactivate</a>
                                        @else
                                            <a href="#" id="{{$user_master->id}}" onclick="active_user(this)"
                                               class="btn btn-sm btn-primary"
                                               title="Activate" data-toggle="tooltip" data-placement="top">
                                                <span class="mdi mdi-check"></span> Activate</a>

                                        @endif
                                        <a href="#" onclick="reset_pass(this)" id="{{$user_master->id}}"
                                           class="btn btn-sm btn-info reset-pass"
                                           title="Reset Password" data-toggle="tooltip" data-placement="top">
                                            <span class="fa fa-repeat"></span></a>
                                    </td>
                                    <td>
                                        <div class="post_imgblock_admin"><img style="height: 100%"
                                                                              src="{{url('').'/'.$user_master->image}}"/>
                                        </div>
                                    </td>
                                    <td>{{$user_master->name}}</td>
                                    <td>{{$user_master->contact}}</td>
                                    <td>{{$user_master->username}}</td>
                                    <td>
                                        @if($user_master->is_active == 1)
                                            <p class="bg-success">Active</p>
                                        @else
                                            <p class="bg-danger">Inactive</p>

                                        @endif
                                    </td>
                                    {{--<td> {{ date_format(date_create($user_master->last_login), "d-M-Y h:i A")}}</td>--}}
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
                url: "{{ url('franchise/create') }}",
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
            $('#mybody').html('<h5>Are you sure want to Inactivate this franchise<h5/>');
            $('#modalBtn').removeClass('hidden');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('franchise') }}/' + id +
                '/inactivate"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        }

        function active_user(dis) {
            var id = $(dis).attr('id');
            $('#myModal').modal('show');
            $('#mybody').html('<img height="50px" class="center-block" src="{{ url('assets/images/loading.gif') }}"/>');
            $('#modal_title').html('Confirm Activation');
            $('#mybody').html('<h5>Are you sure want to activate this franchise<h5/>');
            $('#modalBtn').removeClass('hidden');
            $('#modalBtn').html('<a class="btn btn-sm btn-success" href="{{ url('franchise') }}/' + id +
                '/activate"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        }

        function reset_pass(dis) {
            $('#myModal').modal('show');
            $('#modal_title').html('Reset Password');
            $('#mybody').html('<img height="50px" class="center-block" src="{{url('assets/images/loading.gif')}}"/>');

            var id = $(dis).attr('id');
            var editurl = '{{ url('/') }}' + "/franchise/" + id + "/resetPassword";
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
