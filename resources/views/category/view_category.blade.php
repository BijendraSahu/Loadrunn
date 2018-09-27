@extends('admin_master')

@section('title','List of Categories')

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
                         List of Categories
                          <button onclick="add_category()" class="btn btn-default pull-right"><i
                                      class="mdi mdi-plus"></i>Add</button>
                      </span>
                    <table id="example" class="table table-bordered dataTable table-striped" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="bg-info">
                            <th class="hidden">Id</th>
                            <th class="options">Options</th>
                            <th>Category</th>
                            <th>Dimension</th>
                            <th>Rates</th>
                            <th>Description</th>
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($categories)>0)
                            @foreach($categories as $category)
                                <tr>
                                    <td class="hidden">{{$category->category_id}}</td>
                                    <td id="{{$category->category_id}}">
                                        <a href="#" id="{{$category->category_id}}" onclick="edit_category(this)"
                                           class="btn btn-sm btn-default edit-user_"
                                           title="Edit Category" data-toggle="tooltip" data-placement="top">
                                            <span class="fa fa-pencil"></span></a>
                                        @if($category->category_status == 1)
                                            <button type="button" onclick="inactive_category(this)"
                                                    id="{{ $category->category_id }}"
                                                    class="btn btn-sm btn-danger btnDelete"
                                                    title="Delete Category" data-toggle="tooltip"
                                                    data-placement="top"><span
                                                        class="fa fa-trash-o" aria-hidden="true"></span>
                                            </button>

                                        @endif
                                    </td>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{"Length: ".$category->category_length}} <br>{{"Width: ".$category->category_width}} <br>{{"Height: ".$category->category_height}}</td>
                                    <td>{{"Per Km: ".$category->category_rates}} <br>{{"Per Min: ".$category->category_minrates}}</td>
                                    <td>{{$category->category_desc}}</td>
                                    <td> <img src="{{url('').'/'.$category->category_image}}" class="ads_img" alt="image"></td>
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
        function inactive_category(dis) {
            var id = $(dis).attr('id');
            $('#myModal').modal('show');
            $('#mybody').html('<img height="50px" class="center-block" src="{{ url('assets/images/loading.gif') }}"/>');
            $('#modal_title').html('Confirm Deletion');
            $('#mybody').html('<h5>Are you sure want to Delete this Category<h5/>');
            $('#modalBtn').removeClass('hidden');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('category') }}/' + id +
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

        function edit_category(dis) {
            $('#myModal').modal('show');
            $('#modal_title').html('Edit Category');
            $('#mybody').html('<img height="50px" class="center-block" src="{{url('assets/images/loading.gif')}}"/>');
            var id = $(dis).attr('id');
            var editurl = '{{ url('/') }}' + "/category/" + id + "/edit";
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


        function add_category() {
            $('#myModal').modal('show');
            $('#modal_title').html('Add New Advertisement');
            $('#mybody').html('<img height="50px" class="center-block" src="{{url('assets/images/loading.gif')}}"/>');
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('category/create') }}",
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
