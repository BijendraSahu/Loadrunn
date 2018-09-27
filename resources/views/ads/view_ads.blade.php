@extends('admin_master')

@section('title','List of Advertisement')

@section('content')
    <style>
        .ads_img {
            height: 100px;
            width: 100px;
        }
    </style>
    {{--@if(session()->has('message'))--}}
    {{--<div class="alert alert-success">--}}
    {{--{{ session()->get('message') }}--}}
    {{--</div>--}}
    {{--@endif--}}
    {{--@if($errors->any())--}}
    {{--<div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>--}}
    {{--@endif--}}
    <div class="row box_containner">
        <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="dash_boxcontainner white_boxlist">
                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                         List of All Advertisement
                          <button onclick="add_ads()" class="btn btn-default pull-right"><i
                                      class="mdi mdi-plus"></i>Add</button>
                      </span>
                    <table id="example" class="table table-bordered dataTable table-striped" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="bg-info">
                            <th class="hidden">Id</th>
                            <th class="options">Options</th>
                            <th>File Type</th>
                            <th>Content</th>
                            <th>View Points</th>
                            <th>Visible Days</th>
                            <th>Visible Till</th>
                            <th>Active Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($ads)>0)
                            @foreach($ads as $ad)
                                <tr>
                                    <td class="hidden">{{$ad->id}}</td>
                                    <td id="{{$ad->id}}">
                                        <a href="#" id="{{$ad->id}}" onclick="edit_ads(this)"
                                           class="btn btn-sm btn-default edit-user_"
                                           title="Edit Advertisement" data-toggle="tooltip" data-placement="top">
                                            <span class="fa fa-pencil"></span></a>
                                        @if($ad->is_active == 1)
                                            <button type="button" onclick="inactive_ads(this)"
                                                    id="{{ $ad->id }}"
                                                    class="btn btn-sm btn-danger btnDelete"
                                                    title="Inactivate Advertisement" data-toggle="tooltip"
                                                    data-placement="top"><span
                                                        class="fa fa-trash-o" aria-hidden="true"></span>
                                            </button>
                                        @else
                                            <button type="button" onclick="active_ads(this)"
                                                    id="{{ $ad->id }}"
                                                    class="btn btn-sm btn-success btnActive"
                                                    title="Activate Advertisement" data-toggle="tooltip"
                                                    data-placement="top"><span
                                                        class="fa fa-align-center"
                                                        aria-hidden="true"></span></button>
                                        @endif
                                    </td>
                                    <td>{{$ad->file_type}}</td>
                                    <td>
                                        @if($ad->file_type == 'text')
                                            {!! $ad->text!!}
                                        @elseif($ad->file_type == 'video')
                                            {{$ad->file_path}}
                                        @else
                                            <img src="{{url('').'/'.$ad->file_path}}" class="ads_img" alt="image">
                                        @endif

                                    </td>
                                    <td>{{$ad->view_points}}</td>
                                    <td>{{$ad->visible_days." Days"}}</td>
                                    <td>{{ date_format(date_create($ad->visible_till), "d-M-Y h:i A")}}</td>
                                    <td>@if($ad->is_active == 1)
                                            <p class="bg-success">Active</p>
                                        @else
                                            <p class="bg-danger">Inactive</p>
                                        @endif
                                    </td>
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
        function inactive_ads(dis) {
            var id = $(dis).attr('id');
            $('#myModal').modal('show');
            $('#mybody').html('<img height="50px" class="center-block" src="{{ url('assets/images/loading.gif') }}"/>');
            $('#modal_title').html('Confirm Inactivation');
            $('#mybody').html('<h5>Are you sure want to Inactivate this Advertisement<h5/>');
            $('#modalBtn').removeClass('hidden');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('advertisement') }}/' + id +
                '/inactivate"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        }

        function active_ads(dis) {
            var id = $(dis).attr('id');
            $('#myModal').modal('show');
            $('#mybody').html('<img height="50px" class="center-block" src="{{ url('assets/img/loading.gif') }}"/>');
            $('#modal_title').html('Confirm Activation');
            $('#mybody').html('<h5>Are you sure want to activate this Advertisement<h5/>');
            $('#modalBtn').removeClass('hidden');
            $('#modalBtn').html('<a class="btn btn-sm btn-success" href="{{ url('advertisement') }}/' + id +
                '/activate"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        }

        function edit_ads(dis) {
            $('#myModal').modal('show');
            $('#modal_title').html('Edit Advertisement');
            $('#mybody').html('<img height="50px" class="center-block" src="{{url('assets/images/loading.gif')}}"/>');
            var id = $(dis).attr('id');
            var editurl = '{{ url('/') }}' + "/advertisement/" + id + "/edit";
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


        function add_ads() {
            $('#myModal').modal('show');
            $('#modal_title').html('Add New Advertisement');
            $('#mybody').html('<img height="50px" class="center-block" src="{{url('assets/images/loading.gif')}}"/>');
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('advertisement/create') }}",
                success: function (data) {
                    $('#mybody').html(data);
                },
                error: function (xhr, status, error) {
                    $('#mybody').html(xhr.responseText);
                }
            });
        }

    </script>
@stop
