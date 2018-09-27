<script src="{{ url('assets/js/validation.js') }}"></script>
@if($errors->any())
    <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
@endif
{!! Form::open(['url' => 'category', 'class' => 'form-horizontal', 'id'=>'user_master', 'files'=>true]) !!}
<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="col-sm-6">


                <div class='form-group'>
                    {!! Form::label('category_name', 'Category Name *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_name', null, ['class' => 'form-control required input-sm', 'placeholder'=>'Enter Min Fare']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('category_name', 'Min Fare *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_minfare', null, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Min Fare']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('category_name', 'AMT / KM *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_rates', null, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Per Km Rate']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('category_name', 'AMT / MIN *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_minrates', null, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Per Min Rate']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('file_path', 'Select Image *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::file('category_image', null, ['class' => 'form-control input-sm' ,'id'=>'file_path']) !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-6">

                <div class='form-group'>
                    {!! Form::label('category_name', 'Length *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_length', null, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Length in Feets']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('category_name', 'Width *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_width', null, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Width in Feets']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('category_name', 'Height *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_height', null, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Height in Feets']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('category_name', 'Description *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_desc', null, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Description']) !!}
                    </div>
                </div>


                <div class='form-group'>
                    <div class='col-sm-offset-3 col-sm-9'>
                        {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary','onclick'=>'myfunctionis()']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

