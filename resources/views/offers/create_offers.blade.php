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
                    {!! Form::select('offer_cab', $categories, null,['class' => 'form-control requiredDD']) !!}
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('category_name', 'Offer From *', ['class' => 'col-sm-3 control-label']) !!}
                <div class='col-sm-9'>
                    {!! Form::text('offer_from', null, ['class' => 'form-control dtp required input-sm', 'placeholder'=>'Offer From']) !!}
                </div>
            </div>

            <div class='form-group'>
                {!! Form::label('category_name', 'Offer To *', ['class' => 'col-sm-3 control-label']) !!}
                <div class='col-sm-9'>
                    {!! Form::text('offer_to', null, ['class' => 'form-control dtp required input-sm', 'placeholder'=>'Offer To']) !!}
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('category_name', 'Offer Percent *', ['class' => 'col-sm-3 control-label']) !!}
                <div class='col-sm-9'>
                    {!! Form::text('offer_percent', null, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Offer Percent']) !!}
                </div>
            </div>

            <div class='form-group'>
                {!! Form::label('category_name', 'Offer Amount *', ['class' => 'col-sm-3 control-label']) !!}
                <div class='col-sm-9'>
                    {!! Form::text('offer_amount', null, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Offer Amount']) !!}
                </div>
            </div>


            <div class='form-group'>
                {!! Form::label('category_name', 'Minimum Amount *', ['class' => 'col-sm-3 control-label']) !!}
                <div class='col-sm-9'>
                    {!! Form::text('offer_min', null, ['class' => 'form-control amount required input-sm', 'placeholder'=>'Minimum Fare']) !!}
                </div>
            </div>

            <div class='form-group'>
                {!! Form::label('file_path', 'Select Image *', ['class' => 'col-sm-3 control-label']) !!}
                <div class='col-sm-9'>
                    {!! Form::file('offer_image', null, ['class' => 'form-control input-sm' ,'id'=>'file_path']) !!}
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
<script>
    $(function () {
        $('.dtp').datepicker({
            format: "dd-MM-yyyy",
            maxViewMode: 2,
            todayBtn: "linked",
            daysOfWeekHighlighted: "0",
            autoclose: true,
            todayHighlight: true
        });
    });
</script>
