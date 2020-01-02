@extends('layouts.admin')

@section('content')
    <h2>Add Supplier</h2>
    {!! Form::open(['route' => 'suppliers.store', 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}
    {{csrf_field()}}

    {{Form::label('name', 'Supplier Name')}}
    <div class="input-group mb-3">
        {{Form::number('name', null, array('class' => 'form-control', 'placeholder' => 'Supplier Name', 'required'  ))}}
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

