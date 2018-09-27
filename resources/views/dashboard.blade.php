@extends('admin_master')

@section('title','Dashboard')

@section('content')
    <style>
        .btn_center {
            text-align: center;
            margin-top: 10px;
        }

        .update_btn {
            display: none;
        }

        .hidealways {
            display: none;
        }

        .label_checkbox {
            display: inline-block;
        }

        .label_checkbox .cr {
            margin: 0px 5px;
        }

        .newrow {
            background: #1e81cd52 !important;
        }

    </style>

    <section class="box_containner">
        <div class="container-fluid">
            <div class="row">
                <section id="menu1">
                    <div class="home_brics_row">
                        @php
                            $category =\App\Category::where('category_status', '=', 1)->count();
                        @endphp
                        <a href="{{url('category')}}">
                            <div class="col-sm-3">
                                <div class="white_brics">
                                    <div class="white_icon_withtxt">
                                        <div class="white_icons_blk white_brics_clr4"><i
                                                    class="mdi mdi-gift"></i></div>
                                        <div class="white_brics_txt">Category</div>
                                        <div class="white_brics_count">{{$category}}</div>
                                    </div>
                                    <div class="brics_progress white_brics_border_clr4"></div>
                                </div>
                            </div>
                        </a>
                        <a href="{{url('user_master')}}">
                            <div class="col-sm-3">
                                <div class="white_brics">
                                    <div class="white_icon_withtxt">
                                        <div class="white_icons_blk"><i class="mdi mdi-tag"></i></div>
                                        <div class="white_brics_txt">Drivers List</div>
                                        <div class="white_brics_count">{{"0"}}</div>
                                    </div>
                                    <div class="brics_progress white_brics_border_clr1"></div>
                                </div>
                            </div>
                        </a>
                        <a href="{{url('user_master?type=active')}}">
                            <div class="col-sm-3">
                                <div class="white_brics">
                                    <div class="white_icon_withtxt">
                                        <div class="white_icons_blk white_brics_clr2"><i
                                                    class="mdi mdi-content-duplicate"></i></div>
                                        <div class="white_brics_txt">Drivers Daily Collections</div>
                                        <div class="white_brics_count">{{"0"}}</div>
                                    </div>
                                    <div class="brics_progress white_brics_border_clr2" style="
"></div>
                                </div>
                            </div>
                        </a>
                        <a href="{{url('user_master?type=inactive')}}">
                            <div class="col-sm-3">
                                <div class="white_brics">
                                    <div class="white_icon_withtxt">
                                        <div class="white_icons_blk white_brics_clr4"><i
                                                    class="mdi mdi-clipboard-plus"></i></div>
                                        <div class="white_brics_txt">InActive Users</div>
                                        <div class="white_brics_count">{{"0"}}</div>
                                    </div>
                                    <div class="brics_progress white_brics_border_clr4"></div>
                                </div>
                            </div>
                        </a>


                    </div>
                </section>
            </div>
            <div class="row">
                <section id="menu1">
                    <div class="home_brics_row">

                        {{--@php--}}
                        {{--$advertisement =\App\Advertisement::where(['is_active' => 1])->count();--}}
                        {{--$redeem_request = \App\RedeemRequest::count();--}}
                        {{--$gain_t = \App\GainTypePoints::count();--}}
                        {{--$keys = \App\UserKey::count();--}}
                        {{--@endphp--}}
                        <a href="{{url('advertisement')}}">
                            <div class="col-sm-3">
                                <div class="white_brics">
                                    <div class="white_icon_withtxt">
                                        <div class="white_icons_blk white_brics_clr3"><i
                                                    class="mdi mdi-forum"></i></div>
                                        <div class="white_brics_txt">Advertisement</div>
                                        <div class="white_brics_count">{{"0"}}</div>
                                    </div>
                                    <div class="brics_progress white_brics_border_clr3"></div>
                                </div>
                            </div>
                        </a>

                        <a href="{{url('redeem_requests')}}">
                            <div class="col-sm-3">
                                <div class="white_brics">
                                    <div class="white_icon_withtxt">
                                        <div class="white_icons_blk"><i class="mdi mdi-cellphone-android"></i></div>
                                        <div class="white_brics_txt">Redeem Requests</div>
                                        <div class="white_brics_count">{{"0"}}</div>
                                    </div>
                                    <div class="brics_progress white_brics_border_clr1"></div>
                                </div>
                            </div>
                        </a>
                        <a href="{{url('gain_type_points')}}">
                            <div class="col-sm-3">
                                <div class="white_brics">
                                    <div class="white_icon_withtxt">
                                        <div class="white_icons_blk white_brics_clr2"><i
                                                    class="mdi mdi-message-image"></i></div>
                                        <div class="white_brics_txt">Gain Type Points</div>
                                        <div class="white_brics_count">{{"0"}}</div>
                                    </div>
                                    <div class="brics_progress white_brics_border_clr2" style="
"></div>
                                </div>
                            </div>
                        </a>
                        <a href="{{url('key')}}">
                            <div class="col-sm-3">
                                <div class="white_brics">
                                    <div class="white_icon_withtxt">
                                        <div class="white_icons_blk white_brics_clr2"><i
                                                    class="mdi mdi-message-image"></i></div>
                                        <div class="white_brics_txt">Key</div>
                                        <div class="white_brics_count">{{"0"}}</div>
                                    </div>
                                    <div class="brics_progress white_brics_border_clr2" style=""></div>
                                </div>
                            </div>
                        </a>


                    </div>
                </section>
            </div>

        </div>
    </section>

    {{--////////////////////////////////////////////////*****Start Menu 3******//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}}

    {{--////////////////////////////////////////////////*****End Menu 3******//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}}

    {{--////////////////////////////////////////////////*****Start Menu 2******//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}}
    <script>
        function validate() {
            var cat_name = $('#cat_name').val();
            var cat_description = $('#cat_description').val();
            if (cat_name == "") {
                $('#cat_name').addClass("w3-border-red");
                return false;
            }
            else if (cat_description == "") {
                $('#cat_description').addClass("w3-border-red");
                return false;

            }
            else {
                sendcat();
            }
        }

        function sendcat() {
            var cat_name = $('#cat_name').val();
            var cat_description = $('#cat_description').val();
            $.ajax({
                type: "post",
                url: "{{url('add_cat')}}",
                data: "cat_name= " + cat_name + "&cat_description= " + cat_description,
                success: function (data) {
                    $('#snackbar').html('');
                    $('#snackbar').html('Categories added successfully');
                    $('#myModal').modal('hide');
                    myFunction();
                    $("#item_form").load(location.href + " #item_form");
                    $("#mytablereload").load(location.href + " #mytablereload");


                },
                error: function (data) {

                }
            });
        }

        $(document).ready(function () {
            $('#open_item_form').click(function () {
                $('#item_list').hide();
                $('#item_form').show();
            });
            $('#open_modal').click(function () {
                $('#myheader').html('');
                $('#mybody').html('');
                $('#myfooter').html('');
                $('#myheader').append('<div><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Add Categories</h4></div>');
                $('#mybody').append('<div class="panel-body dash_table_containner"><input type="text" class="form-control vRequiredTex" name="cat_name" placeholder="Enter Your Category Name " id="cat_name"><p class="clearfix"></p><textarea name="cat_description" id="cat_description" class="form-control vRequiredTex" rows="4" cols="50" placeholder="Enter Your Description "></textarea></p></div>');
                $('#myfooter').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="validate();" class="btn btn-primary">Add</button>');
                $('#myModal').modal();
            });
        });

    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function () {
                x.className = x.className.replace("show", "");
            }, 3000);

        }

        function abcd($id) {
            $('.edittable' + $id).attr('contenteditable', 'true');
            $('.edit' + $id).hide();
            $('.update' + $id).show();

        }
        function abcdd($id) {
            $('.edittable' + $id).attr('contenteditable', 'false');
            $('.edit' + $id).show();
            $('.update' + $id).hide();

        }
        function abcddd($id) {
            $('.edittable' + $id).attr('contenteditable', 'false');
            $('.edit' + $id).show();
            $('.update' + $id).hide();
            $('.hiderow' + $id).hide();

        }
        function update(dis, id) {
            var ID = id;
            var name = $(dis).parent().parent("#" + id).children('.name').html();
            var slug = $(dis).parent().parent("#" + id).children('.slug').html();
            var des = $(dis).parent().parent("#" + id).children('.description').html();
            /*alert(ID+one+two+three);*/
            $.ajax({
                type: "post",
                url: "{{url('updatecat')}}",
                data: "name= " + name + "&slug= " + slug + "&des= " + des + "&ID= " + ID,
                success: function (data) {
                    abcdd(ID);
                    $('#snackbar').html('');
                    $('#snackbar').html('Categories Updated successfully');
                    myFunction();
                    $("#item_form").load(location.href + " #item_form");


                },
                error: function (data) {
                    alert("Error")
                }
            });


        }
        function deletecat(id) {
            var ID = id;
            $.ajax({
                type: "post",
                url: "{{url('deletecat')}}",
                data: "&ID= " + ID,
                success: function (data) {
                    abcddd(ID);
                    $('#snackbar').html('')
                    $('#snackbar').html('Successfully Deleted');
                    myFunction();
                    $("#item_form").load(location.href + " #item_form");

                },
                error: function (data) {
                    alert("Error")
                }
            });
        }

    </script>
    {{--///////////////////////////////////////////////////////////////////*****end Menu2*****//////////////////////////////////////////////////////////////////////////////////////////////////--}}
@stop
{{--$("#item_form").load(location.href + " #item_form");--}}
{{--window.location.reload();--}}
