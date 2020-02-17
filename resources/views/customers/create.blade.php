@extends('layouts.admin')

@section('content')
    <h2>Add Customer</h2>
    {!! Form::open(['route' => 'customers.store', 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}
    {{csrf_field()}}

    {{Form::label('name', 'Customer Name')}}
    <div class="input-group mb-3">
        {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Customer Name', 'required'  ))}}
    </div>

    {{Form::label('phone', 'Phone')}}
    <div class="input-group mb-3">
        {{Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'Phone Number', 'maxlength' => '11','required'  ))}}
    </div>

    {{Form::label('email', 'Email')}}
    <div class="input-group mb-3">
        {{Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'required'  ))}}
    </div>

    {{Form::label('address', 'Address')}}
    <div class="input-group mb-3">
        {{Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'Address', 'required'  ))}}
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

