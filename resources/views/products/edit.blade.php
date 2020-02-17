@extends('layouts.admin')

@section('content')
    <h2>Edit Product</h2>
    {!!  Form::model($productModel,['method' =>'PATCH', 'route' => ['productModels.update', $productModel->id]])  !!}

    {{csrf_field()}}
    <div class="">
        {{ Form::label('product_model_name', 'Product Name')}}
        <div class="input-group mb-3">
            {{ Form::text('product_model_name', null, array('class' => 'form-control', 'placeholder' => 'Product Name', 'required'  ))}}
        </div>
    </div>
    <div class="">
        {{ Form::label('quantity', 'Product Quantity')}}
        <div class="input-group mb-3">
            {{ Form::text('quantity', null, array('class' => 'form-control', 'placeholder' => 'Product Quantity', 'required'  ))}}
        </div>
    </div>

    <div class="row">
        <div class="col">
            {{ Form::label('unitPrice', 'Unit Price')}}
            <div class="input-group mb-3">
                {{ Form::text('unitPrice', null, array('class' => 'form-control', 'placeholder' => 'Unit Price', 'required'  ))}}
            </div>
        </div>
        <div class="col">
            {{ Form::label('sellPrice', 'Sell Price')}}
            <div class="input-group mb-3">
                {{ Form::text('sellPrice', null, array('class' => 'form-control', 'placeholder' => 'Sell Price', 'required'  ))}}
            </div>
        </div>
    </div>




    {{ Form::label('model_description', 'Product Description')}}
    <div class="input-group mb-3">
        {{ Form::textarea('model_description', null, array('class' => 'form-control', 'placeholder' => 'Product Description'  ))}}
    </div>

    <hr>
    <div class="text-right">
        {{ Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    </div>
    {{ Form::close() }}

@endsection

@section('scripts')
    <script>

    </script>

@endsection

