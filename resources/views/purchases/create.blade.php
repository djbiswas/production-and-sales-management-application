@extends('layouts.admin')

@section('content')
    <h2>Add Purchases</h2>
    {!! Form::open(['route' => 'purchases.store', 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}
    {{csrf_field()}}

    {{-- {{Form::label('parentcategory_id', 'Select Product')}}
    <div class="form-group mb-3">
        {{Form::select('parentcategory_id', $parentcategories, null, ['class' => 'form-control','placeholder' => 'প্রধান ক্যাটাগরি নির্বাচন করুন', 'required'])}}
    </div> --}}

    <div class="row">
        <div class="col-6">
            {{Form::label('product', 'Select Product')}}
            <div class="form-group mb-3">
                {{Form::select('product', $products, null, ['class' => 'select2_op form-control', 'required'])}}
            </div>
        </div>
        <div class="col-6">
            {{Form::label('supplier', 'Select Supplier')}}
            <div class="form-group mb-3">
                {{Form::select('supplier', $suppliers, null, ['class' => 'select2_op form-control', 'required'])}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            {{Form::label('currency', 'Select Currency')}}
            <div class="input-group mb-3">
                {{Form::select('currency', ['Doller' => 'Doller', 'Rupe' => 'Rupe', 'Taka' => 'Taka'], null, ['class' => 'form-control', 'required'] )}}
            </div>
        </div>
        <div class="col-4">
            {{Form::label('total_amount', 'Total Amount')}}
            <div class="input-group mb-3">
                {{Form::number('total_amount', null, array('class' => 'form-control', 'placeholder' => 'Total Amount'))}}
            </div>
        </div>
        <div class="col-4">
            {{Form::label('total_bdt_amount', 'BDT Amount')}}
            <div class="input-group mb-3">
                {{Form::number('total_bdt_amount', null, array('class' => 'form-control', 'placeholder' => 'BDT Amount', 'readonly'  ))}}
            </div>
        </div>
    </div>

    {{Form::label('quantity', 'Quantity')}}
    <div class="input-group mb-3">
        {{Form::number('quantity', null, array('class' => 'form-control', 'placeholder' => 'Quantity'))}}
    </div>

    <div class="row">
        <div class="col-6">
            {{Form::label('unit_price', 'Unit Price')}}
            <div class="input-group mb-3">
                {{Form::number('unit_price', null, array('class' => 'form-control', 'placeholder' => 'Unit Price'))}}
            </div>
        </div>
        <div class="col-6">
            {{Form::label('sell_price', 'Sell Price')}}
            <div class="input-group mb-3">
                {{Form::number('sell_price', null, array('class' => 'form-control', 'placeholder' => 'Sell Price'))}}
            </div>
        </div>
    </div>



    <hr>
    <div class="text-right">

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    </div>
    {{ Form::close() }}

@endsection

@section('scripts')

@endsection

