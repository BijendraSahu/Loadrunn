<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="shortcut icon" type="images/png" href="{{url('assets/images/short.png')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/materialdesignicons.min.css')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/Dashboard.css')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/Autocomplete.css')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/my.css')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/media.css')}}"/>
    {{--    <link rel="stylesheet" href="{{url('assets/css/w3.css')}}"/>--}}
    <link rel="stylesheet" href="{{url('assets/css/form-wizard-green.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/dataTables.bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/text_editor.css')}}">
    <link href="{{ url('assets/css/datepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <script src="{{url('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/Global.js')}}"></script>
    <script src="{{url('assets/js/text_editor.js')}}"></script>
    <script src="{{url('assets/js/Autocomplete.js')}}"></script>
    <script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        function GetandSetOnEditor() {
            var htm = $("#txtEditor").Editor("getText");
            /* var sethtm = $(grandPar).html();
             $("#txtEditor").Editor("setText", sethtm);*/
        }

        $(document).ready(function () {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
            $(".text_editor").each(function () {
                $(this).Editor();
            });
            //$(".text_editor").Editor();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
        });
    </script>
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
    <script type="text/javascript">
        function HideTranparent() {
            $('.overlay_res').fadeOut();
            $('.dash_sidemenu').removeClass('dash_sidemenu_show');
            $('body').css('overflow', 'auto');
        }

        function ResponsiveMenuClick() {

            $('.overlay_res').fadeIn();
            $('.dash_sidemenu').addClass('dash_sidemenu_show');
            $('body').css('overflow', 'hidden');
        }

        $(document).ready(function () {
            /*date Picker*/
            /* $('.glo_date').datepicker({
             format: 'dd-M-yyyy', autoclose: true
             }).on('changeDate', function (event) {
             if ($('#date_of_birth').val() != "") {
             $("#date_of_birth").removeClass('vErrorRed');
             }
             });
             /!*-----Time Picker-----*!/
             $('.glo_timepicker').timepicker();
             /!*--------Autocomplete ------*!/
             $('.Glo_autocomplete').select2();
             /!*----Header Tooltip--------*!/*/
            // Tooltip jquery
            $('.Glo_autocomplete').select2();
            $('.grid_title').hover(function () {
                var headtxt = $(this).text();
                var left = $(this).offset().left;
                var top = $(this).offset().top;
                $('.icon_tp').css('margin', '0px');
                $('.icon_tp').show();
                $('.icon_txt').text(headtxt);
                $('.icon_tp').css("top", top - 30);
                $('.icon_tp').css("left", left);
            });
            $('.grid_title').mouseout(function () {
                $('.icon_tp').hide();
            });
        });

        function MenuClick(dis) {
            $('.dash_sub_menu').slideUp();
            $('.right_menu_li').find('i').removeClass('mdi-chevron-down');
            $('.right_menu_li').find('i').addClass('mdi-chevron-right');
            if ($(dis).find('.dash_sub_menu').is(':visible')) {
                $(dis).find('.dash_sub_menu').slideUp();
                $(dis).find('i').removeClass('mdi-chevron-down');
                $(dis).find('i').addClass('mdi-chevron-right');
            }
            else {
                $(dis).find('.dash_sub_menu').slideDown();
                $(dis).find('i').removeClass('mdi-chevron-right');
                $(dis).find('i').addClass('mdi-chevron-down');
            }
        }

        function GridHeaderCheck(dis) {
            $('input[type="checkbox"]').prop("checked", $(dis).prop("checked"));
        }
    </script>
    <style>
        .fab {
            cursor: pointer;
        }

        .fab-backdrop {
            color: rgba(255, 255, 255, 0);
        }

        .fab-primary, .fab-secondary {
            transition: all 0.35s ease-in-out;
        }

        .fab.active .fab-primary {
            opacity: 0;
            transform: rotate(225deg);
        }

        .fab-secondary {
            opacity: 0;
            transform: rotate(-225deg);
        }

        .fab.active .fab-secondary {
            opacity: 1;
            transform: rotate(0);
            margin-top: -2px;
        }

        #inbox .show-on-hover:hover > ul.dropdown-menu {
            display: block;

        }

        #inbox .show-on-hover {
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 9999;
        }

        #inbox .btn-io {
            border-radius: 50%;
            height: 54px;
            width: 54px;
            padding: 0 !important;
            box-shadow: 0px 3px 7px 0px rgba(202, 124, 124, 0.72);
        }

        #inbox .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu {
            top: auto;
            bottom: 100%;
            margin-bottom: 1px;
            margin-bottom: -5px;
            padding-bottom: 30px;
        }

        #inbox .dropdown-menu-right {
            right: 0 !Important;
            left: auto !Important;
        }

        #inbox .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 50px;
            padding: 5px 0;
            margin: 2px 0 0;
            font-size: 14px;
            text-align: center;
            list-style: none;
            background-color: rgba(255, 255, 255, 0) !Important;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: none;
            border-radius: 0px;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0) !Important;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0) !Important;
        }

        #inbox .fa-iox {
            font-size: 22px;
        }

        #inbox .dropdown-menu > li > a {
            display: block;
            padding: 0;
            padding-top: 4px;
            margin-top: 20px;
            clear: both;
            font-weight: normal;
            line-height: 1.42857143;
            color: #333;
            background: #fff;
            white-space: nowrap;
            width: 40px;
            height: 40px;
            border: solid 1px #ccc;
            border-radius: 50px;
            font-size: 21px;
            box-shadow: 0px 3px 7px 0px rgba(203, 203, 203, 0.72);
        }

        #inbox .dropdown-menu > li:first-child > a {
            background: #c67fd6 !important;
            color: #fff !important;
        }

        #inbox .dropdown-menu > li:last-child > a {
            background: #D3A516;
            color: #fff;
        }

        #inbox .dropdown-menu > li:nth-child(3) > a {
            background: #3C80F6;
            color: #fff;
        }

        #inbox .dropdown-menu > li:nth-child(2) > a {
            background: #2CAC26;
            color: #fff;
        }

        #inbox .fa-iosm {

            margin-top: 7px;
        }

        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 55;
            left: 11%;
            bottom: 22px;
            border-radius: 14px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 22px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 22px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 22px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 22px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }

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

        .border_none {
            border: none !important;
        }

        .valmy {
            border: 2px solid red;
            background-color: #dc464629;
        }

        .pcb {
            overflow-y: scroll;
            overflow-x: initial;
        }

        .pcb::-webkit-scrollbar {
            display: none;
        }

        .ali {
            margin-left: 685px;
        }

        .hidealways {
            display: none;
        }

        .container {
            margin-top: 20px;
        }

        .image-preview-input {
            position: relative;
            overflow: hidden;
            margin: 0px;
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }

        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .image-preview-input-title {
            margin-left: 2px;
        }

        p {
            font-size: 15px;
        }

        h3 {
            font-weight: bolder;
            font-size: 25px;

        }

        .blog_detail_box {
            font-size: 15px;
            font-weight: 300;
            letter-spacing: .3px;
            text-shadow: 1px 1px #e8e8e8;
            text-align: justify;
            line-height: 1.5;

        }

        .one {

            margin: 18px 60px 0px 0px;
            border-radius: 5px;
            text-align: center;
        }

        .shadow {
            margin-left: 26px;
            border-radius: 7px;
            display: inline-block;
            overflow: hidden;
            -webkit-box-shadow: 0 8px 17px 0 rgba(0, 0, 0, .2), 0 6px 20px 0 rgba(0, 0, 0, .19);
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, .2), 0 6px 20px 0 rgba(0, 0, 0, .19);
        }

        .two {
            margin-top: 20px;
        }

        .line {
            padding-bottom: 20px;
            border-bottom: solid thin #ccc;
        }

        .button {
            border-radius: 4px;
            background-color: #4285f4;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 15px;
            height: 37px;
            color: white;
            width: 130px;
            transition: all 0.5s;
            margin: 0px;

        }

        .first {
            height: 240px;
            border-radius: 5px;
            width: 320px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>
    <script>
        function myFunction() {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function () {
                x.className = x.className.replace("show", "");
            }, 3000);

        }
    </script>
    <script type="text/javascript">
        function toggleFullScreen(elem) {
            if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
                if (elem.requestFullScreen) {
                    elem.requestFullScreen();
                } else if (elem.mozRequestFullScreen) {
                    elem.mozRequestFullScreen();
                } else if (elem.webkitRequestFullScreen) {
                    elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
                } else if (elem.msRequestFullscreen) {
                    elem.msRequestFullscreen();
                }
                $('.expand_on').hide();
                $('.expand_off').show();
                $('#fixed_nav').addClass('on_fullscreen_fixed');
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
                $('.expand_on').show();
                $('.expand_off').hide();
                $('#fixed_nav').removeClass('on_fullscreen_fixed');
            }
        }

        function MenuShift(dis) {
            var checkclass = $('#page_body').attr('class');
            if (checkclass == "body_color") {
                $('#page_body').addClass('collapse_side');
                $(dis).find('.left_show').show();
                $(dis).find('.right_show').hide();
                $(dis).css('left', '83px');
            } else {
                $('#page_body').removeClass('collapse_side');
                $(dis).find('.right_show').show();
                $(dis).find('.left_show').hide();
                $(dis).css('left', '216px');
            }
        }
    </script>
    <script type="text/javascript">
        function settings() {
            var id = 2;
            $('#myheader').html('');
            $('#mybody').html('');
            $('#myfooter').html('');
            $('#myheader').html('Product view  <button type="button" class="close" onclick="aaoneeche();"  data-dismiss="modal">&times;</button>');
            $('#myfooter').html('<button type="button" onclick="aaoneeche();" class="btn btn-default" data-dismiss="modal">Close</button>');


            var editurl = '{{ url('settings') }}' + '/' + id;
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: editurl,
                data: '{"data":"' + id + '"}',
                success: function (data) {
                    $('#mybody').html(data);
                    $('#myModal').modal();

                },
                error: function (xhr, status, error) {
                    $('.modal-body').html(xhr.responseText);
                    //$('.modal-body').html("Technical Error Occured!");
                }
            });
        }
    </script>
    <style>
        .abc {
            position: fixed;
            z-index: 1000;
            left: 216px;
        }

        .loader {
            height: 4px;
            width: 100%;
            position: relative;
            overflow: hidden;
            background-color: #ddd;
        }

        .loader:before {
            display: block;
            position: absolute;
            content: "";
            left: -200px;
            width: 200px;
            z-index: 1000;
            height: 4px;
            background-color: #f10748;
            -webkit-animation: loading 2s linear infinite;
            animation: loading 2s linear infinite;
        }

        @-webkit-keyframes loading {
            from {
                left: -200px;
                width: 30%;
            }
            50% {
                width: 30%;
            }
            70% {
                width: 70%;
            }
            80% {
                left: 50%;
            }
            95% {
                left: 120%;
            }
            to {
                left: 100%;
            }
        }

        @keyframes loading {
            from {
                left: -200px;
                width: 30%;
            }
            50% {
                width: 30%;
            }
            70% {
                width: 70%;
            }
            80% {
                left: 50%;
            }
            95% {
                left: 120%;
            }
            to {
                left: 100%;
            }
        }

        .errorClass {
            border: 1px solid red;
        }

        .errorText {
            font-size: 11px;
            font-weight: bold;
            color: red;
            margin-top: 4px;
        }
    </style>
</head>

<body class="body_color" id="page_body">
<div id="myloaderid" class="loader"></div>
<nav class="top_navigationbar" id="fixed_nav">
    <div class="dash_menuicon" onclick="ResponsiveMenuClick();"><i class="mdi mdi-menu"></i>
    </div>
    <div class="option-container">

        <div class="user-info glo_menuclick">
            {{-- <img src="images/Male_default.png" class="profile_img">--}}
            <span>{{ucfirst($_SESSION['admin_master']['username'])}}</span>
            <span class="caret"></span>
            <div class="menu_basic_popup menu_popup_setting effect scale0">
                <div class="menu_popup_containner padding0">
                    {{-- <div class="menu_popup_settingrow effect">
                         <a href="#" class="menu_setting_row">
                             <i class="mdi mdi-account-edit global_color"></i>
                             Edit Profile
                         </a>
                     </div>--}}
                    <div class="menu_popup_settingrow effect">
                        <a href="#" onclick="settings()" class="menu_setting_row">
                            <i class="mdi mdi-account-settings-variant global_color"></i>
                            Setting
                        </a>
                    </div>

                    {{--<div class="menu_popup_settingrow effect" onclick="update_password();" data-toggle="modal2" data-target="#myModal_UpdatePassword">
                        <a href="#" class="menu_setting_row">
                            <i class="mdi mdi-lock-open-outline global_color"></i>
                            Change Password
                        </a>
                    </div>--}}
                    <div class="menu_popup_settingrow effect">
                        <a href="{{url('logout')}}" class="menu_setting_row">
                            <i class="mdi mdi-logout global_color"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="menu_basic_block glo_menuclick">--}}
        {{--<span class="mdi mdi-earth"></span>--}}
        {{--<div class="total_count">5</div>--}}
        {{--<div class="menu_basic_popup effect scale0 notification_popbox">--}}
        {{--<div class="menu_popup_head">Notification</div>--}}
        {{--<div class="menu_popup_containner">--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_text">--}}
        {{--<p class="popup_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,--}}
        {{--sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim--}}
        {{--veniam,</p>--}}
        {{--<div class="popup_iconwithtime"><i class="mdi mdi-calendar-clock global_color"></i>--}}
        {{--28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_text">--}}
        {{--<p class="popup_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,--}}
        {{--sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim--}}
        {{--veniam,</p>--}}
        {{--<div class="popup_iconwithtime"><i class="mdi mdi-calendar-clock global_color"></i>--}}
        {{--28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_showall">--}}
        {{--<a href="NotificationList.php"> See All </a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_basic_block glo_menuclick">--}}
        {{--<span class="mdi mdi-email"></span>--}}
        {{--<div class="total_count" id="spanShortList">2</div>--}}
        {{--<div class="menu_basic_popup effect scale0 massage_popbox">--}}
        {{--<div class="menu_popup_head">Messages</div>--}}
        {{--<div class="menu_popup_containner style-scroll">--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_massage">--}}
        {{--<div class="popup_user_namewithdate">--}}
        {{--Pinku Kesharwani--}}
        {{--<div class="popup_iconwithtime_right"><i--}}
        {{--class="mdi mdi-calendar-clock global_color"></i> 28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="popup_user_massagetxt">--}}
        {{--Lorem ipsum dolor sit amet, consectetur--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_massage">--}}
        {{--<div class="popup_user_namewithdate">--}}
        {{--Pinku Kesharwani--}}
        {{--<div class="popup_iconwithtime_right"><i--}}
        {{--class="mdi mdi-calendar-clock global_color"></i> 28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="popup_user_massagetxt">--}}
        {{--Lorem ipsum dolor sit amet, consectetur--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_massage">--}}
        {{--<div class="popup_user_namewithdate">--}}
        {{--Pinku Kesharwani--}}
        {{--<div class="popup_iconwithtime_right"><i--}}
        {{--class="mdi mdi-calendar-clock global_color"></i> 28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="popup_user_massagetxt">--}}
        {{--Lorem ipsum dolor sit amet, consectetur--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_massage">--}}
        {{--<div class="popup_user_namewithdate">--}}
        {{--Pinku Kesharwani--}}
        {{--<div class="popup_iconwithtime_right"><i--}}
        {{--class="mdi mdi-calendar-clock global_color"></i> 28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="popup_user_massagetxt">--}}
        {{--Lorem ipsum dolor sit amet, consectetur--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_massage">--}}
        {{--<div class="popup_user_namewithdate">--}}
        {{--Pinku Kesharwani--}}
        {{--<div class="popup_iconwithtime_right"><i--}}
        {{--class="mdi mdi-calendar-clock global_color"></i> 28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="popup_user_massagetxt">--}}
        {{--Lorem ipsum dolor sit amet, consectetur--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_massage">--}}
        {{--<div class="popup_user_namewithdate">--}}
        {{--Pinku Kesharwani--}}
        {{--<div class="popup_iconwithtime_right"><i--}}
        {{--class="mdi mdi-calendar-clock global_color"></i> 28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="popup_user_massagetxt">--}}
        {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit,--}}
        {{--sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim--}}
        {{--veniam,--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_showall">--}}
        {{--<a href="#"> See All </a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="expand_block" onclick="toggleFullScreen(document.body)">
            <i class="mdi mdi-arrow-expand-all expand_on"></i>
            <i class="mdi mdi-arrow-collapse-all expand_off"></i>
        </div>--}}
    </div>
</nav>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" id="myheader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body edit_item_container">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer" id="myfooter">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_title">Title</h4>
            </div>
            <div class="modal-body" id="mybody">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <div class=" pull-right">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    &nbsp;
                </div>
                &nbsp;
                <div id="modalBtn" class="pull-right hidden">&nbsp;</div>
                {{--<button id="extraBtn1" type="button" class="btn btn-primary" style="display:none">Save changes</button>--}}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="inbox">
    <div class="fab btn-group show-on-hover dropup">
        <div data-toggle="tooltip" data-placement="left" title="Compose">
            <button type="button" class="btn btn-danger btn-io dropdown-toggle" data-toggle="dropdown">
            <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x fab-backdrop"></i>
                <i class="fa fa-plus fa-stack-1x fa-inverse fab-primary"></i>
                <i class="fa fa-pencil fa-stack-1x fa-inverse fab-secondary"></i>
            </span>
            </button>
        </div>
        <ul class="dropdown-menu dropdown-menu-right" role="menu">
            <li style="display: none;"><a href="#" data-toggle="tooltip" data-placement="left" title="FullView"><i
                            class="mdi mdi-fullscreen"></i></a></li>
            <li><a href="#" onclick="toggleFullScreen(document.body);" data-toggle="tooltip" data-placement="left"
                   title="FullView"><i class="mdi mdi-fullscreen"></i></a></li>
            <li><a href="#" onclick="settings();" data-toggle="tooltip" data-placement="left" title="Settings"><i
                            class="mdi mdi-account-settings-variant"></i></a></li>
            <li><a href="{{url('/admin')}}" data-toggle="tooltip" data-placement="left" title="Dashboard"><i
                            class="mdi mdi-speedometer"></i></a></li>
        </ul>
    </div>
</div>

<div class="modal fade" id="myModalsmall" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="width:435px;">
            <div id="smallheader" class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div id="smallbody" class="modal-body">
                <p>This is a small modal.</p>
            </div>
            <div id="smallfooter" class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php $loginUser = \App\LoginModel::find($_SESSION['admin_master']['id']); ?>

<aside class="dash_sidemenu pcb">
    <div class="shift_iconbox abc" onclick="MenuShift(this);">
        <i class="mdi mdi-arrow-left-bold right_show"></i>
        <i class="mdi mdi-arrow-right-bold left_show"></i>
    </div>
    <div class="logo_block">
        <img src="{{url('assets/images/logo.png')}}" class="big_aside_icon"/>
        <img src="{{url('assets/images/short.png')}}" class="small_aside_icon"/>
    </div>
    <div class="dash_emp_details">
        <img src="{{url('admin_pic/').'/'.$loginUser->id.'/'.$loginUser->image}}"
             class="dash_profile_img"/>
        <div class="dash_emp_basic">
            <span class="dash_name">{{ucfirst($_SESSION['admin_master']['name'])}}</span>
            {{--<span class="dash_designation">Admin</span>--}}
        </div>
    </div>
    <ul class="list-group dash_menu_ul">
        <li class="right_menu_li">
            <a href="{{url('admin')}}">
                {{--     <a href="{{url('/userlist')}}">--}}
                <i class="dash_arrow mdi mdi-account-multiple global_color"></i>
                <span class="aside_menu_txt">Dashboard</span>
            </a>
        </li>
        <li class="right_menu_li">
            <a href="{{url('category')}}">
                {{--     <a href="{{url('/userlist')}}">--}}
                <i class="dash_arrow mdi mdi-account-multiple global_color"></i>
                <span class="aside_menu_txt">Category</span>
            </a>
        </li>

        <li class="right_menu_li" onclick="MenuClick(this);">
            <a href="javascript:;">
                <i class="dash_arrow mdi mdi-sitemap  global_color"></i>
                Drivers
                <i class="mdi mdi-chevron-right icon-left-arrow"></i>
            </a>
            <ul class="list-group dash_sub_menu">
                <li>
                    <a href="{{url('#')}}">Driver Registration</a>
                </li>
                <li>
                    <a href="{{url('#')}}">Drivers List</a>
                </li>
                <li>
                    <a href="{{url('#')}}">Online Drivers</a>
                </li>

            </ul>
        </li>
        <li class="right_menu_li" onclick="MenuClick(this);">
            <a href="javascript:;">
                <i class="dash_arrow mdi mdi-sitemap  global_color"></i>
                Collections
                <i class="mdi mdi-chevron-right icon-left-arrow"></i>
            </a>
            <ul class="list-group dash_sub_menu">
                <li>
                    <a href="{{url('#')}}">Drivers Daily Collection</a>
                </li>
                <li>
                    <a href="{{url('#')}}">Daily Collections</a>
                </li>

            </ul>
        </li>

        <li class="right_menu_li" onclick="MenuClick(this);">
            <a href="javascript:;">
                <i class="dash_arrow mdi mdi-sitemap  global_color"></i>
                Users
                <i class="mdi mdi-chevron-right icon-left-arrow"></i>
            </a>
            <ul class="list-group dash_sub_menu">
                <li>
                    <a href="{{url('#')}}">Users</a>
                </li>
                <li>
                    <a href="{{url('#')}}">Users Drives Summary</a>
                </li>

                <li>
                    <a href="{{url('#')}}">Users Drives</a>
                </li>
            </ul>
        </li>

        <li class="right_menu_li">
            {{-- <a href="{{url('/orderlist')}}">--}}
            <a href="{{url('#')}}">
                <i class="dash_arrow mdi mdi-clipboard-plus global_color"></i>
                <span class="aside_menu_txt">Locate Drives</span>
            </a>
        </li>

        <li class="right_menu_li">
            {{--<a href="{{url('/delivery')}}">--}}
            <a href="{{url('rates')}}">
                <i class="dash_arrow mdi mdi-gift global_color"></i>
                <span class="aside_menu_txt">Rate Card</span>
            </a>
        </li>

        <li class="right_menu_li">
            {{--<a href="{{url('/review')}}">--}}
            <a href="{{url('offers')}}">
                <i class="dash_arrow mdi mdi-forum global_color"></i>
                <span class="aside_menu_txt">Offers</span>
            </a>
        </li>

        <li class="right_menu_li">
            {{--<a href="{{url('/review')}}">--}}
            <a href="{{url('#')}}">
                <i class="dash_arrow mdi mdi-forum global_color"></i>
                <span class="aside_menu_txt">Admin Registration</span>
            </a>
        </li>

        <li class="right_menu_li">
            {{--<a href="{{url('/review')}}">--}}
            <a href="{{url('logout')}}">
                <i class="dash_arrow mdi mdi-forum global_color"></i>
                <span class="aside_menu_txt">Logout</span>
            </a>
        </li>
    </ul>

</aside>
@yield('content')

<div class="overlay_res" onclick="HideTranparent();"></div>
<div id="snackbar">New Categories added Successfully</div>
<script>
    $(document).ready(function () {
        $('#myloaderid').hide();
        $('[data-toggle="tooltip"]').tooltip();
        var table = $('#example').DataTable({
            "columnDefs": [
                {"width": "20px", "targets": 0}
            ],
            "order": [[0, "desc"]]
        });

        $('.datatable-col').on('keyup change', function () {
            table.column($(this).attr('id')).search($(this).val()).draw();
        });
    });

    $('.fab').hover(function () {
        $(this).toggleClass('active');
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script src="{{ url('assets/js/bootstrap-datepicker.js') }}"></script>

@if(session()->has('message'))
    <script type="text/javascript">
        setTimeout(function () {
            {{--            ShowSuccessPopupMsg('{{ session()->get('message') }}');--}}
            swal("Success!", "{{ session()->get('message') }}", "success");

        }, 500);


    </script>
@endif
@if($errors->any())
    <script type="text/javascript">
        setTimeout(function () {
            swal("Warning!", "{{$errors->first()}}", "info");
        }, 500);
    </script>
@endif

</body>
</html>
