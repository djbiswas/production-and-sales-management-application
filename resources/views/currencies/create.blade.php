@extends('layouts.admin')

@section('content')
    <h2>Add New Currency</h2>
    {!! Form::open(['route' => 'currencies.store', 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}
    {{csrf_field()}}

    {{Form::label('name', 'Currency Name')}}
    <div class="input-group mb-3">
        {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Currency Name', 'required'  ))}}
    </div>
    <div class="row">
        <div class="col-5">
            {{Form::label('dffval', 'Currency Value')}}
            <div class="input-group mb-3">
                {{Form::number('dffval', 1, array('class' => 'form-control', 'placeholder' => '1', 'required','readonly'  ))}}
            </div>
        </div>
        <div class="col">
            <h3 class="text-center" style="margin-top: 35px;"> = </h3>
        </div>
        <div class="col-5">
            {{Form::label('value', 'BDT Value')}}
            <div class="input-group mb-3">
                {{Form::text('value', null, array('class' => 'form-control', 'placeholder' => 'BDT Value', 'required'  ))}}
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
    <script>
        
    </script>

@endsection

