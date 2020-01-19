@extends('layouts.admin')

@section('content')
    <h2>New Product Type</h2>
    {!!  Form::model($productType,['method' =>'PATCH', 'route' => ['productTypes.update', $productType->id]])  !!}

    {{csrf_field()}}

    {{Form::label('product_type_name', 'Product Type Name')}}
    <div class="input-group mb-3">
        {{Form::text('product_type_name', null, array('class' => 'form-control', 'placeholder' => 'Product Type Name', 'required'  ))}}
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
