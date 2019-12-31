@extends('layouts.admin')

@section('content')
    <h2>Add Purchases</h2>
    {!! Form::open(['route' => 'purchases.store', 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}
    {{csrf_field()}}

    {{-- {{Form::label('parentcategory_id', 'Select Product')}}
    <div class="form-group mb-3">
        {{Form::select('parentcategory_id', $parentcategories, null, ['class' => 'form-control','placeholder' => 'প্রধান ক্যাটাগরি নির্বাচন করুন', 'required'])}}
    </div> --}}

     {{Form::label('parentcategory_id', 'Select Product')}}
    <div class="form-group mb-3">
        {{Form::select('size', ['L' => 'Large', 'S' => 'Small'])}}
    </div>

    {{Form::label('parentcategory_id', 'Select Supplier')}}
    <div class="form-group mb-3">
        {{Form::select('size', ['L' => 'Large', 'S' => 'Small'])}}
    </div>

    {{Form::label('name', 'Quantity')}}
    <div class="input-group mb-3">
        {{Form::number('name', null, array('class' => 'form-control', 'placeholder' => 'নতুন ক্যাটাগরি'))}}
    </div>

    {{Form::label('price', 'Currency')}}
    <div class="input-group mb-3">
        {{Form::number('name', null, array('class' => 'form-control', 'placeholder' => 'নতুন ক্যাটাগরি'))}}
    </div>

    {{Form::label('price', 'Price')}}
    <div class="input-group mb-3">
        {{Form::number('name', null, array('class' => 'form-control', 'placeholder' => 'নতুন ক্যাটাগরি'))}}
    </div>

    <hr>
    <div class="text-right">

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    </div>
    {{ Form::close() }}

@endsection
