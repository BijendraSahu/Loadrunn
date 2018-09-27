<script src="{{ url('assets/js/validation.js') }}"></script>
@if($errors->any())
    <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
@endif
{!! Form::open(['url' => 'key', 'class' => 'form-horizontal', 'id'=>'user_master']) !!}
<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class='form-group'>
                {!! Form::label('username', 'Key *', ['class' => 'col-sm-1 control-label']) !!}
                <div class='col-sm-10'>
                    {!! Form::text('key', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Enter key']) !!}
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-offset-1 col-sm-10'>
                    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
