<script src="{{ url('assets/js/validation.js') }}"></script>

@if(!is_null($user_master))
    {!! Form::open(['url' => 'franchise/'.$user_master->id, 'class' => 'form-horizontal', 'id'=>'user_master', 'method'=>'put', 'files'=>true]) !!}
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class='form-group'>
                {!! Form::label('name', 'Name *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('name', $user_master->name, ['class' => 'form-control input-sm required','placeholder'=>'Name']) !!}
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('contact', 'Contact *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('contact', $user_master->contact, ['class' => 'form-control input-sm contact required', 'placeholder'=>'Contact']) !!}
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
@else
    <h4>UserMaster not found !</h4>
@endif
