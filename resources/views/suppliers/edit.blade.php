@extends('layouts.admin')

@section('content')
    <h2>Add Update</h2>

    {{ Form::model($supplier, ['route' => ['suppliers.update', $supplier->id], 'method' => 'put','enctype' => 'multipart/form-data']) }}
    {{csrf_field()}}

    {{Form::label('name', 'Supplier Name')}}
    <div class="input-group mb-3">
        {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Supplier Name', 'required'  ))}}
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

