<script src="{{ url('assets/js/validation.js') }}"></script>
@if($errors->any())
    <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
@endif
{!! Form::open(['url' => 'category', 'class' => 'form-horizontal', 'id'=>'user_master', 'files'=>true]) !!}
<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('rates_cab', 'Cab Category *', ['class' => 'col-sm-3 control-label']) !!}
                <div class='col-sm-9'>
                    {!! Form::select('rates_cab', $categories, null,['class' => 'form-control requiredDD']) !!}
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('category_name', 'Distance From (K.M.) *', ['class' => 'col-sm-3 control-label']) !!}
                <div class='col-sm-9'>
                    {!! Form::text('rates_from', null, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Distance From (K.M.)']) !!}
                </div>
            </div>

            <div class='form-group'>
                {!! Form::label('category_name', 'Distance To (K.M.) *', ['class' => 'col-sm-3 control-label']) !!}
                <div class='col-sm-9'>
                    {!! Form::text('rates_to', null, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Distance To (K.M.)']) !!}
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('category_name', 'Rs./ K.M.*', ['class' => 'col-sm-3 control-label']) !!}
                <div class='col-sm-9'>
                    {!! Form::text('rates_amount', null, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Per Km Rate']) !!}
                </div>
            </div>

            <div class='form-group'>
                <div class='col-sm-offset-3 col-sm-9'>
                    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

