@extends('admin_master')

@section('title','List of Rates')

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
                         List of Cab Rates
                          <button onclick="add_rate()" class="btn btn-default pull-right"><i
                                      class="mdi mdi-plus"></i>Add</button>
                      </span>
                    <table id="example" class="table table-bordered dataTable table-striped" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="bg-info">
                            <th class="hidden">Id</th>
                            <th class="options">Options</th>
                            <th>Cab</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Amount/K.M.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($rates)>0)
                            @foreach($rates as $rate)
                                <tr>
                                    <td class="hidden">{{$rate->rates_id}}</td>
                                    <td id="{{$rate->rates_id}}">
                                        <a href="#" id="{{$rate->rates_id}}" onclick="edit_rates(this)"
                                           class="btn btn-sm btn-default edit-user_"
                                           title="Edit Rates" data-toggle="tooltip" data-placement="top">
                                            <span class="fa fa-pencil"></span></a>
                                        @if($rate->rates_status == 1)
                                            <button type="button" onclick="inactive_rates(this)"
                                                    id="{{ $rate->rates_id }}"
                                                    class="btn btn-sm btn-danger btnDelete"
                                                    title="Delete Rates" data-toggle="tooltip"
                                                    data-placement="top"><span
                                                        class="fa fa-trash-o" aria-hidden="true"></span>
                                            </button>

                                        @endif
                                    </td>
                                    <td>{{$rate->category->category_name}}</td>
                                    <td>{{$rate->rates_from}}</td>
                                    <td>{{$rate->rates_to}}</td>
                                    <td>{{$rate->rates_amount}}</td>
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
        function inactive_rates(dis) {
            var id = $(dis).attr('id');
            $('#myModal').modal('show');
            $('#mybody').html('<img height="50px" class="center-block" src="{{ url('assets/images/loading.gif') }}"/>');
            $('#modal_title').html('Confirm Deletion');
            $('#mybody').html('<h5>Are you sure want to Delete this rates<h5/>');
            $('#modalBtn').removeClass('hidden');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('rates') }}/' + id +
                '/inactivate"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        }

        function active_ads(dis) {
            var id = $(dis).attr('id');
            $('#myModal').modal('show');
            $('#mybody').html('<img height="50px" class="center-block" src="{{ url('assets/images/loading.gif') }}"/>');
            $('#modal_title').html('Confirm Activation');
            $('#mybody').html('<h5>Are you sure want to activate this Advertisement<h5/>');
            $('#modalBtn').removeClass('hidden');
            $('#modalBtn').html('<a class="btn btn-sm btn-success" href="{{ url('category') }}/' + id +
                '/activate"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        }

        function edit_rates(dis) {
            $('#myModal').modal('show');
            $('#modal_title').html('Edit Rate');
            $('#mybody').html('<img height="50px" class="center-block" src="{{url('assets/images/loading.gif')}}"/>');
            var id = $(dis).attr('id');
            var editurl = '{{ url('/') }}' + "/rates/" + id + "/edit";
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


        function add_rate() {
            $('#myModal').modal('show');
            $('#modal_title').html('Add New Rate');
            $('#mybody').html('<img height="50px" class="center-block" src="{{url('assets/images/loading.gif')}}"/>');
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('rates/create') }}",
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
