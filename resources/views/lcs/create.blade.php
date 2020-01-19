@extends('layouts.admin')

@section('content')
    <h2>Add New LC</h2>
    {!! Form::open(['route' => 'lcs.store', 'method' => 'post']) !!}
    {{csrf_field()}}

    {{ Form::label('name', 'Lc Name')}}
    <div class="input-group mb-3">
        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Lc Name', 'required'  ))}}
    </div>

    {{ Form::label('note', 'Lc Description')}}
    <div class="input-group mb-3">
        {{ Form::textarea('note', null, array('class' => 'form-control', 'placeholder' => 'Lc Description', 'required'  ))}}
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

