<script src="{{ url('assets/js/validation.js') }}"></script>

{!! Form::open(['url' => 'gain_type_points/'.$gain_types->id, 'class' => 'form-horizontal', 'id'=>'user_master', 'method'=>'post']) !!}
<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class='form-group'>
                {!! Form::label('name', 'Gain Type *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-10'>
                    <select name="gain_type" disabled id="gain_type" class="form-control">
                        <option {{$gain_types->gain_type == 'img'?'selected':''}} value="img">Image</option>
                        <option {{$gain_types->gain_type == 'video'?'selected':''}} value="video">Video</option>
                        <option {{$gain_types->gain_type == 'text'?'selected':''}} value="text">Text</option>
                        <option {{$gain_types->gain_type == 'share'?'selected':''}} value="share">Share</option>
                        <option {{$gain_types->gain_type == 'referral'?'selected':''}} value="referral">Referral</option>
                        <option {{$gain_types->gain_type == 'activate'?'selected':''}} value="activate">Activate</option>
                    </select>
                </div>
            </div>
            <div class="form-group" id="getText">
                {!! Form::label('text', 'Points *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-10'>
                    {!! Form::text('points', $gain_types->points, ['class' => 'form-control input-sm', 'placeholder'=>'Enter Points','id'=>'Points']) !!}
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
