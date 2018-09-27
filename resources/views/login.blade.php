
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aranea | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <link rel="shortcut icon" type="images/png" href="{{url('assets/images/short.png')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/css/materialdesignicons.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/css/Dashboard.css')}}" />
    <link rel="stylesheet" href="{{url('assets/css/media.css')}}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{url('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    <style type="text/css">
        .login_txt {
            background-color: #fff;
        }
        .input-group-addon{
            background-color: #fff !important;
        }
    </style>
    <script type="text/javascript">
        $.getScript("https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js", function(){
            particlesJS('particles-js',
                {
                    "particles": {
                        "number": {
                            "value": 80,
                            "density": {
                                "enable": true,
                                "value_area": 800
                            }
                        },
                        "color": {
                            "value": "#ffffff"
                        },
                        "shape": {
                            "type": "circle",
                            "stroke": {
                                "width": 0,
                                "color": "#000000"
                            },
                            "polygon": {
                                "nb_sides": 5
                            },
                            "image": {
                                "width": 100,
                                "height": 100
                            }
                        },
                        "opacity": {
                            "value": 0.5,
                            "random": false,
                            "anim": {
                                "enable": false,
                                "speed": 1,
                                "opacity_min": 0.1,
                                "sync": false
                            }
                        },
                        "size": {
                            "value": 5,
                            "random": true,
                            "anim": {
                                "enable": false,
                                "speed": 40,
                                "size_min": 0.1,
                                "sync": false
                            }
                        },
                        "line_linked": {
                            "enable": true,
                            "distance": 150,
                            "color": "#ffffff",
                            "opacity": 0.4,
                            "width": 1
                        },
                        "move": {
                            "enable": true,
                            "speed": 6,
                            "direction": "none",
                            "random": false,
                            "straight": false,
                            "out_mode": "out",
                            "attract": {
                                "enable": false,
                                "rotateX": 600,
                                "rotateY": 1200
                            }
                        }
                    },
                    "interactivity": {
                        "detect_on": "canvas",
                        "events": {
                            "onhover": {
                                "enable": true,
                                "mode": "repulse"
                            },
                            "onclick": {
                                "enable": true,
                                "mode": "push"
                            },
                            "resize": true
                        },
                        "modes": {
                            "grab": {
                                "distance": 400,
                                "line_linked": {
                                    "opacity": 1
                                }
                            },
                            "bubble": {
                                "distance": 400,
                                "size": 40,
                                "duration": 2,
                                "opacity": 8,
                                "speed": 3
                            },
                            "repulse": {
                                "distance": 200
                            },
                            "push": {
                                "particles_nb": 4
                            },
                            "remove": {
                                "particles_nb": 2
                            }
                        }
                    },
                    "retina_detect": true,
                    "config_demo": {
                        "hide_card": false,
                        "background_color": "#b61924",
                        "background_image": "",
                        "background_position": "50% 50%",
                        "background_repeat": "no-repeat",
                        "background_size": "cover"
                    }
                }
            );

        });
    </script>
</head>
<body class="login_bg">
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-md-offset-8 login_form" style="background: #00000047">
            <div class="logo_images">
                <img style="height: 80px;" src="{{url('assets/images/logo.png')}}" />
            </div>
            <h2 class="login-caption" style="color: #ffcfcf;"><span style="color: #ffcfcf;" class="first_letter">L</span>ogin</h2>
            <div align="center" id="errorsec"></div>
            <p class="clearfix"></p>
            <div class="form-group" style="backface-visibility: hidden;">
                <div class="input-group" style="backface-visibility: hidden;">
                    <input type="text" class="form-control login_txt" placeholder="Type your Username" style="backface-visibility: hidden;" id="username">
                    <span class="input-group-addon" style="backface-visibility: hidden;">
                                          <i class="glyphicon glyphicon-user" style="backface-visibility: hidden;"></i>
                                      </span>
                </div>
            </div>
            <div class="form-group" style="backface-visibility: hidden;">
                <div class="input-group" style="backface-visibility: hidden;">
                    <input type="password" class="form-control login_txt" placeholder="Type your password" style="backface-visibility: hidden;" id="password">
                    <span class="input-group-addon" style="backface-visibility: hidden;">
                                          <i class="glyphicon glyphicon-lock" style="backface-visibility: hidden;"></i>
                                      </span>
                </div>
            </div>
            <input type="button" class="submit_btn btn btn-primary" value="Log in" onclick="logincheck();" />
        </div>
    </div>
</div>
<div></div>
<div class="particules" id="particles-js"></div>
<script>
    document.onkeydown=function(){
        if(window.event.keyCode=='13'){
            logincheck();
        }
    }


    function logincheck() {
        var username = $("#username").val();
        var password = $("#password").val();
        /*alert(username+password);*/
        $.get('{{url('logincheck')}}', {username: username, password: password}, function (data) {
            if(data=='success')
            {
                window.location.href = '{{url('/admin')}}';
            }
            else {
                $('#errorsec').addClass("alert alert-danger").html('Username or Password Invalid');

            }
            });
    }
</script>
<script type="text/javascript" src="{{url('assets/js/Animate_Particules.js')}}"></script>
</body>
</html>