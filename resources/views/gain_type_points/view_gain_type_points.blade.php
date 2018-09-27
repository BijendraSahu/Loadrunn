@extends('admin_master')

@section('title','List of Gain Type Points')

@section('content')
    <style>
        .ads_img {
            height: 200px;
            width: 200px;
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
                         List of Gain Type Points
                      </span>
                    <table id="example" class="table table-bordered dataTable table-striped" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="bg-info">
                            <th class="hidden">Id</th>
                            <th class="options">Options</th>
                            <th>Gain Type</th>
                            <th>Points</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($gain_types)>0)
                            @foreach($gain_types as $gain_type)
                                <tr>
                                    <td class="hidden">{{$gain_type->id}}</td>

                                    <td>  <a href="#" id="{{$gain_type->id}}" onclick="edit_gain_type(this)"
                                             class="btn btn-sm btn-default edit-user_"
                                             title="Edit Gain Type Points" data-toggle="tooltip" data-placement="top">
                                            <span class="fa fa-pencil"></span></a></td>
                                    <td>{{$gain_type->gain_type}}</td>
                                    <td>{{$gain_type->points}}</td>
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
        function edit_gain_type(dis) {
            $('#myModal').modal('show');
            $('#modal_title').html('Edit Gain Type Points');
            $('#mybody').html('<img height="50px" class="center-block" src="{{url('assets/images/loading.gif')}}"/>');
            var id = $(dis).attr('id');
            var editurl = '{{ url('/') }}' + "/gain_type_points/" + id + "/edit";
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
