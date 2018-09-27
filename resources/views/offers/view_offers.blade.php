@extends('admin_master')

@section('title','List of Offers')

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
                         List of Drive Offers
                          <button onclick="add_offer()" class="btn btn-default pull-right"><i
                                      class="mdi mdi-plus"></i>Add</button>
                      </span>
                    <table id="example" class="table table-bordered dataTable table-striped" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="bg-info">
                            <th class="hidden">Id</th>
                            <th class="options">Options</th>
                            <th>Code</th>
                            <th>Cab</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Offer</th>
                            <th>Min Fare</th>
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($offers)>0)
                            @foreach($offers as $offer)
                                <tr>
                                    <td class="hidden">{{$offer->offer_id}}</td>
                                    <td id="{{$offer->offer_id}}">
                                        @if($offer->offer_status == 1)
                                            <button type="button" onclick="inactive_offers(this)"
                                                    id="{{ $offer->offer_id }}"
                                                    class="btn btn-sm btn-danger btnDelete"
                                                    title="Delete Offers" data-toggle="tooltip"
                                                    data-placement="top"><span
                                                        class="fa fa-trash-o" aria-hidden="true"></span>
                                            </button>

                                        @endif
                                    </td>
                                    <td>{{$offer->offer_code}}</td>
                                    <td>{{$offer->category->category_name}}</td>
                                    <td>{{$offer->offer_from}}</td>
                                    <td>{{$offer->offer_to}}</td>
                                    <td>{{$offer->offer_percent}}</td>
                                    <td>{{$offer->offer_min}}</td>
                                    <td> <img src="{{url('').'/'.$offer->offer_image}}" class="ads_img" alt="image"></td>
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
        function inactive_offers(dis) {
            var id = $(dis).attr('id');
            $('#myModal').modal('show');
            $('#mybody').html('<img height="50px" class="center-block" src="{{ url('assets/images/loading.gif') }}"/>');
            $('#modal_title').html('Confirm Deletion');
            $('#mybody').html('<h5>Are you sure want to Delete this offer<h5/>');
            $('#modalBtn').removeClass('hidden');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('offer') }}/' + id +
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
            var editurl = '{{ url('/') }}' + "/offers/" + id + "/edit";
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


        function add_offer() {
            $('#myModal').modal('show');
            $('#modal_title').html('Add New Offer');
            $('#mybody').html('<img height="50px" class="center-block" src="{{url('assets/images/loading.gif')}}"/>');
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('offers/create') }}",
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
