<script src="{{ url('assets/js/validation.js') }}"></script>
<script src="{{ url('assets/js/validation.js') }}"></script>
<link rel="stylesheet" href="{{url('assets/css/text_editor.css')}}">
<script src="{{url('assets/js/text_editor.js')}}"></script>
<style>
    .Editor-container {
        width: 81%;
        margin-left: 18%;
    }
</style>
{!! Form::open(['url' => 'advertisement/'.$ad->id, 'class' => 'form-horizontal', 'id'=>'user_master', 'method'=>'put', 'files'=>true]) !!}
<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class='form-group'>
                {!! Form::label('name', 'File Type *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-10'>
                    <select name="file_type" id="file_type" onchange="getType(this)" class="form-control">
                        <option {{$ad->file_type == 'img'?'selected':''}} value="img">Image</option>
                        <option {{$ad->file_type == 'video'?'selected':''}} value="video">Video</option>
                        <option {{$ad->file_type == 'text'?'selected':''}} value="text">Text</option>
                    </select>
                </div>
            </div>
            <div class='form-group' id="file_link">
                {!! Form::label('file_path', 'Select File *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-10'>
                    {!! Form::file('file_path', null, ['class' => 'form-control input-sm' ,'id'=>'file_path']) !!}
                </div>
            </div>
            <div class='form-group hidden' id="video_link">
                {!! Form::label('video_link', 'Enter Link *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-10'>
                    {!! Form::text('video_link', $ad->file_path, ['class' => 'form-control input-sm', 'placeholder'=>'Enter Youtube Link']) !!}
                </div>
            </div>
            <div class="form-group hidden" id="getText">
                {!! Form::label('text', 'Text *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-10'>
                    {!! Form::text('text', $ad->text, ['class' => 'form-control hidden input-sm', 'placeholder'=>'Enter Text','id'=>'ad_text']) !!}
                    <div onmouseleave="myfunctionis()">
                        <div class="text_editor" id="txtEditor_myy"></div>
                    </div>
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('username', 'View Points *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-10'>
                    <select name="view_points" class="form-control" id="view_points">
                        @for($i=1; $i<=100; $i++)
                            <option {{$ad->view_points == $i ?'selected':''}} value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class='form-group'>
                {!! Form::label('ads', 'Visible till *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-10'>
                    <select name="visible_till" class="form-control" id="visible_till">
                        @for($i=1; $i<=100; $i++)
                            <option {{$ad->view_points == $i ?'selected':''}} value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-offset-2 col-sm-10'>
                    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
<script>
    $(document).ready(function () {
        getEditType('{{$ad->file_type}}');
    });
    $(document).ready(function () {
        $(".text_editor").each(function () {
            $(this).Editor();
        });
        //$(".text_editor").Editor();
    });
    function myfunctionis() {
        var htm = $("#txtEditor_myy").Editor("getText");
        $('#ad_text').val(htm);
    }


    function getEditType(dis) {
        if (dis == 'video') {
            $('#file_link').addClass('hidden');
            $('#getText').addClass('hidden');
            $('#video_link').removeClass('hidden');
            $('#ad_text').removeClass('required');
        } else if (dis == 'img') {
            $('#file_link').removeClass('hidden');
            $('#video_link').addClass('hidden');
            $('#getText').addClass('hidden');
            $('#ad_text').removeClass('required');
        } else if (dis == 'text') {
            $('#ad_text').addClass('required');
            $('#getText').removeClass('hidden');
            $('#file_link').addClass('hidden');
            $('#video_link').addClass('hidden');
        }
    }

    function getType(dis) {
        if ($(dis).val() == 'video') {
            $('#file_link').addClass('hidden');
            $('#getText').addClass('hidden');
            $('#video_link').removeClass('hidden');
            $('#ad_text').removeClass('required');
        } else if ($(dis).val() == 'img') {
            $('#file_link').removeClass('hidden');
            $('#video_link').addClass('hidden');
            $('#getText').addClass('hidden');
            $('#ad_text').removeClass('required');
        } else if ($(dis).val() == 'text') {
            $('#ad_text').addClass('required');
            $('#getText').removeClass('hidden');
            $('#file_link').addClass('hidden');
            $('#video_link').addClass('hidden');
        }
    }
</script>