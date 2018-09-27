<script src="{{ url('assets/js/validation.js') }}"></script>
@if($errors->any())
    <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
@endif
{!! Form::open(['url' => 'user_master/'.$user_master->id.'/activate', 'class' => 'form-horizontal', 'id'=>'user_master']) !!}
<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class='form-group'>
                {!! Form::label('key', 'Key *', ['class' => 'col-sm-1 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('key', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Enter key to activate this user']) !!}
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-offset-1 col-sm-11'>
                    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
