@extends('layouts.admin')

@section('content')
    <h2>New Product Type</h2>
    {!! Form::open(['route' => 'manufacturers.store', 'method' => 'post' ]) !!}
    {{csrf_field()}}

    {{Form::label('date','Date:') }}
    <div class="form-group mb-3">
        {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
    </div>

    {{Form::label('product_model_id', 'Select Tiles')}}
    <div class="form-group mb-3">
        {{Form::select('product_model_id', $tiles, null, ['class' => 'select2_op form-control', 'placeholder' => 'Select Tiles Model', 'required'])}}
    </div>

    {{Form::label('quantity', 'Tiles Piece')}}
    <div class="input-group mb-3">
        {{Form::number('quantity', null, array('class' => 'form-control', 'placeholder' => 'Tiles Piece', 'required'  ))}}
    </div>

    {{Form::label('product_type_id', 'Select Class')}}
    <div class="form-group mb-3">
        {{Form::select('product_type_id', $productClass, null, ['class' => 'product_type_id select2_op form-control', 'placeholder' => 'Select Class', 'required'])}}
    </div>


    {{Form::label('select_sand', 'Select Sand')}}
    <div class="input-group mb-3">
        {{Form::number('select_sand', null, array('step'=>'0.01','class' => 'select_sand form-control', 'placeholder' => 'Select Sand', 'required'  ))}}
    </div>

    {{Form::label('white_sand', 'White Sand')}}
    <div class="input-group mb-3">
        {{Form::number('white_sand', null, array('step'=>'0.01','class' => 'white_sand form-control', 'placeholder' => 'White Sand', 'required'  ))}}
    </div>

    {{Form::label('red_color', 'Red Color')}}
    <div class="input-group mb-3">
        {{Form::number('red_color', null, array('step'=>'0.01','class' => 'red_color form-control', 'placeholder' => 'Red Color', 'required'  ))}}
    </div>


    {{Form::label('yellow_color', 'Yellow Color')}}
    <div class="input-group mb-3">
        {{Form::number('yellow_color', null, array('step'=>'0.01','class' => 'yellow_color form-control', 'placeholder' => 'Yellow Color', 'required'  ))}}
    </div>

    {{Form::label('black_color', 'Black Color')}}
    <div class="input-group mb-3">
        {{Form::number('black_color', null, array('step'=>'0.01','class' => 'black_color form-control', 'placeholder' => 'Black Color', 'required'  ))}}
    </div>

    {{Form::label('chemical_color', 'Chemical Color')}}
    <div class="input-group mb-3">
        {{Form::number('chemical_color', null, array('step'=>'0.01','class' => 'chemical_color form-control', 'placeholder' => 'Chemical Color', 'required'  ))}}
    </div>

    {{Form::label('cement', 'Cement')}}
    <div class="input-group mb-3">
        {{Form::number('cement', null, array('step'=>'0.01','class' => 'cement form-control', 'placeholder' => 'Cement', 'required'  ))}}
    </div>

    {{Form::label('stone', 'Stone')}}
    <div class="input-group mb-3">
        {{Form::number('stone', null, array('step'=>'0.01','class' => 'stone form-control', 'placeholder' => 'Stone', 'required'  ))}}
    </div>

    {{Form::label('note', 'Description')}}
    <div class="input-group mb-3">
        {{Form::textarea('product_type_notes', null, array('class' => 'form-control', 'placeholder' => 'Description'  ))}}
    </div>



    <hr>
    <div class="text-right">

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    </div>
    {{ Form::close() }}

@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('change', '#product_type_id', function(event) {
            event.preventDefault();
            var product_type_id = $(this).val();

            $.ajax({
                url: '/class_data',
                method: 'POST',
                // dataType: 'json',
                data: {id: product_type_id},
                success: function(data) {
                    console.log(data);
                    if(data){
                        $(".select_sand").val(data.select_sand);
                        $(".white_sand").val(data.white_sand);
                        $(".red_color").val(data.red_color);
                        $(".yellow_color").val(data.yellow_color);
                        $(".black_color").val(data.black_color);
                        $(".chemical_color").val(data.chemical_color);
                        $(".cement").val(data.cement);
                        $(".stone").val(data.stone);
                    }else{
                        alert('Select Valid Class');
                    }


                }
            });
        });
    </script>

@endsection
