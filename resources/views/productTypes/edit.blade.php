@extends('layouts.admin')

@section('content')
    <h2>New Product Type</h2>
    {!!  Form::model($productType,['method' =>'PATCH', 'route' => ['productTypes.update', $productType->id]])  !!}

    {{csrf_field()}}

    {{Form::label('product_type_name', 'Product Type Name')}}
    <div class="input-group mb-3">
        {{Form::text('product_type_name', null, array('class' => 'form-control', 'placeholder' => 'Product Type Name', 'required'  ))}}
    </div>

    {{Form::label('select_sand', 'Select Sand')}}
    <div class="input-group mb-3">
        {{Form::number('select_sand', null, array('class' => 'form-control', 'placeholder' => 'Select Sand','step' => '0.01', 'required'  ))}}
    </div>

    {{Form::label('white_sand', 'White Sand')}}
    <div class="input-group mb-3">
        {{Form::number('white_sand', null, array('class' => 'form-control', 'placeholder' => 'White Sand', 'step' => '0.01','required'  ))}}
    </div>

    {{Form::label('red_color', 'Red Color')}}
    <div class="input-group mb-3">
        {{Form::number('red_color', null, array('class' => 'form-control', 'placeholder' => 'Red Color', 'step' => '0.01','required'  ))}}
    </div>


    {{Form::label('yellow_color', 'Yellow Color')}}
    <div class="input-group mb-3">
        {{Form::number('yellow_color', null, array('class' => 'form-control', 'placeholder' => 'Yellow Color', 'step' => '0.01','required'  ))}}
    </div>

    {{Form::label('black_color', 'Black Color')}}
    <div class="input-group mb-3">
        {{Form::number('black_color', null, array('class' => 'form-control', 'placeholder' => 'Black Color', 'step' => '0.01','required'  ))}}
    </div>

    {{Form::label('chemical_color', 'Chemical Color')}}
    <div class="input-group mb-3">
        {{Form::number('chemical_color', null, array('class' => 'form-control', 'placeholder' => 'Chemical Color', 'step' => '0.01','required'  ))}}
    </div>

    {{Form::label('cement', 'Cement')}}
    <div class="input-group mb-3">
        {{Form::number('cement', null, array('class' => 'form-control', 'placeholder' => 'Cement', 'step' => '0.01','required'  ))}}
    </div>

    {{Form::label('stone', 'Stone')}}
    <div class="input-group mb-3">
        {{Form::number('stone', null, array('class' => 'form-control', 'placeholder' => 'Stone', 'step' => '0.01', 'required'  ))}}
    </div>

    {{Form::label('product_type_notes', 'Note / Description')}}
    <div class="input-group mb-3">
        {{Form::textarea('product_type_notes', null, array('class' => 'form-control', 'placeholder' => 'Note / Description'))}}
    </div>
    <hr>
    <div class="text-right">

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    </div>
    {{ Form::close() }}

@endsection

@section('scripts')
    <script>

    </script>

@endsection
