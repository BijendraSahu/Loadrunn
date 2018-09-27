<script src="{{ url('assets/js/validation.js') }}"></script>
{!! Form::open(['url' => 'category/'.$category->category_id, 'class' => 'form-horizontal', 'id'=>'user_master', 'method'=>'put', 'files'=>true]) !!}
<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="col-sm-6">

                <div class='form-group'>
                    {!! Form::label('category_name', 'Category Name *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_name', $category->category_name, ['class' => 'form-control required input-sm', 'placeholder'=>'Enter Min Fare']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('category_name', 'Min Fare *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_minfare', $category->category_minfare, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Min Fare']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('category_name', 'AMT / KM *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_rates', $category->category_rates, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Per Km Rate']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('category_name', 'AMT / MIN *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_minrates', $category->category_minrates, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Per Min Rate']) !!}
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
                        {!! Form::text('category_length', $category->category_length, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Length in Feets']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('category_name', 'Width *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_width', $category->category_width, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Width in Feets']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('category_name', 'Height *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_height', $category->category_height, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Height in Feets']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('category_name', 'Description *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-9'>
                        {!! Form::text('category_desc', $category->category_desc, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Enter Description']) !!}
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
