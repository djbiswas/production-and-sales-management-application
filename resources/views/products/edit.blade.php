@extends('layouts.admin')

@section('content')
    <h2>Add Product</h2>
    {!!  Form::model($productModel,['method' =>'PATCH', 'route' => ['productModels.update', $productModel->id]])  !!}

    {{csrf_field()}}
    <div class="row">
        <div class="col-6">
            {{ Form::label('product_type_id', 'Product Type *')}}
            <div class="form-group mb-3">
                {{ Form::select('product_type_id', $product_types, null, ['id' => 'product_type_id', 'class' => 'select2_op form-control','placeholder' => 'Product Type', 'required'])}}
            </div>
        </div>

        <div class="col-6">
            {{ Form::label('stock_item_group_id', 'Product Group *')}}
            <div class="form-group mb-3">
                {{ Form::select('stock_item_group_id', $stockItemGroup, null, ['id' => 'stock_item_group_id', 'class' => 'select2_op form-control','placeholder' => 'Product Group', 'required'])}}
            </div>
        </div>

        <div class="col-6">
            {{ Form::label('tax_category_id', 'Tax Category *')}}
            <div class="form-group mb-3">
                {{ Form::select('tax_category_id', $tax_categories, null, ['id' => 'tax_category_id', 'class' => 'select2_op form-control','placeholder' => 'Tax Category', 'required'])}}
            </div>
        </div>

        <div class="col-6">
            {{ Form::label('stock_unit_id', 'Tax Category *')}}
            <div class="form-group mb-3">
                {{ Form::select('stock_unit_id', $stock_units, null, ['id' => 'stock_unit_id', 'class' => 'select2_op form-control','placeholder' => 'Tax Category', 'required'])}}
            </div>
        </div>

        <div class="col-6">
            {{ Form::label('product_model_name', 'Product Name')}}
            <div class="input-group mb-3">
                {{ Form::text('product_model_name', null, array('class' => 'form-control', 'placeholder' => 'Product Name', 'required'  ))}}
            </div>
        </div>

        <div class="col-6">
            {{ Form::label('quantity', 'Product Quantity')}}
            <div class="input-group mb-3">
                {{ Form::text('quantity', null, array('class' => 'form-control', 'placeholder' => 'Product Quantity', 'required'  ))}}
            </div>
        </div>
        <div class="col-6">
            {{ Form::label('unitPrice', 'Unit Price')}}
            <div class="input-group mb-3">
                {{ Form::text('unitPrice', null, array('class' => 'form-control', 'placeholder' => 'Unit Price', 'required'  ))}}
            </div>
        </div>
        <div class="col-6">
            {{ Form::label('sellPrice', 'Sell Price')}}
            <div class="input-group mb-3">
                {{ Form::text('sellPrice', null, array('class' => 'form-control', 'placeholder' => 'Sell Price', 'required'  ))}}
            </div>
        </div>
    </div>

    {{ Form::label('lc_id', 'Select LC *')}}
    <div class="form-group mb-3">
        {{ Form::select('lc_id', $lcs, null, ['id' => 'stock_unit_id', 'class' => 'select2_op form-control','placeholder' => 'Select LC', 'required'])}}
    </div>

    {{ Form::label('model_description', 'Product Description')}}
    <div class="input-group mb-3">
        {{ Form::textarea('model_description', null, array('class' => 'form-control', 'placeholder' => 'Product Description', 'required'  ))}}
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

