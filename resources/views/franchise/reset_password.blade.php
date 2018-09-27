<script src="{{ url('assets/js/validation.js') }}"></script>

@if($errors->any())
    <div role="alert" id="alert" class="alert alert-danger">{{$errors->first()}}</div>
@endif
{!! Form::open(['url' => 'reset_password', 'class' => 'form-horizontal', 'id'=>'frm']) !!}
<div class="form-group">
    {!! Form::label('new_password', 'New Password', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        <input type="hidden" name="user_id" value="{{$user_master_id}}">
        {!! Form::password('new_password', ['class' => 'form-control input-sm required', 'placeholder'=>'New Password']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('confirm_password', 'Confirm Password', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::password('confirm_password', ['class' => 'form-control input-sm required', 'placeholder'=>'Confirm Password']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
        {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
