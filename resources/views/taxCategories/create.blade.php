@extends('layouts.admin')

@section('content')
    <h2>New Tax Category</h2>
    {!! Form::open(['route' => 'taxCategories.store', 'method' => 'post' ]) !!}
    {{csrf_field()}}

    {{Form::label('tax_name', 'Tax Name')}}
    <div class="input-group mb-3">
        {{Form::text('tax_name', null, array('class' => 'form-control', 'placeholder' => 'Tax Name', 'required'  ))}}
    </div>

    {{Form::label('tax_description', 'Note / Description')}}
    <div class="input-group mb-3">
        {{Form::textarea('tax_description', null, array('class' => 'form-control', 'placeholder' => 'Note / Description', 'required'  ))}}
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
