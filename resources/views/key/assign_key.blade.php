<script src="{{ url('assets/js/validation.js') }}"></script>

{!! Form::open(['url' => 'assign_key/'.$key->id, 'class' => 'form-horizontal', 'id'=>'user_master', 'method'=>'post', 'files'=>true]) !!}
<div class="container-fluid">
    <div class="col-sm-12">


        <div class="form-group">
            {!! Form::label('role', 'Franchises *', ['class' => 'col-sm-2 control-label']) !!}
            <div class='col-sm-8'>
                {!! Form::select('franchise_id', $franchises, null,['class' => 'form-control requiredDD']) !!}
            </div>
        </div>
        <div class='form-group'>
            {!! Form::label('name', 'No of time uses *', ['class' => 'col-sm-2 control-label']) !!}
            <div class='col-sm-8'>
                {!! Form::text('no_of_uses', null, ['class' => 'form-control input-sm numberOnly required','placeholder'=>'Enter how many time uses of this key']) !!}
            </div>
        </div>
        <div class='form-group'>
            <div class='col-sm-offset-2 col-sm-8'>
                {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
            </div>
        </div>

    </div>
</div>
{!! Form::close() !!}
