<script src="{{ url('assets/js/validation.js') }}"></script>
@if($errors->any())
    <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
@endif
{!! Form::open(['url' => 'franchise', 'class' => 'form-horizontal', 'id'=>'user_master']) !!}
<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-sm-6">
            <h3 class="bg-danger text-center">Basic Info</h3>


            <div class='form-group'>
                {!! Form::label('name', 'Name *', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('name', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Name']) !!}
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('contact', 'Contact *', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('contact', null, ['class' => 'form-control input-sm contact required', 'placeholder'=>'Contact']) !!}
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <h3 class="bg-danger text-center">Login Info</h3>
            <p class="clearfix"></p>
            <div class='form-group'>
                {!! Form::label('username', 'Username *', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('username', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Username']) !!}
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('password', 'Password *', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('password', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Password']) !!}
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-offset-4 col-sm-8'>
                    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
