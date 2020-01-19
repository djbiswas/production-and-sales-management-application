@extends('layouts.admin')

@section('content')
    <h2>New Product Stock Groups</h2>
    {!!  Form::model($stockUnit,['method' =>'PATCH', 'route' => ['stockUnits.update', $stockUnit->id]])  !!}

    {{csrf_field()}}

    {{Form::label('unit_name', 'Product Unit Name')}}
    <div class="input-group mb-3">
        {{Form::text('unit_name', null, array('class' => 'form-control', 'placeholder' => 'Product Unit Name', 'required'  ))}}
    </div>

    {{Form::label('unit_description', 'Note / Description')}}
    <div class="input-group mb-3">
        {{Form::textarea('unit_description', null, array('class' => 'form-control', 'placeholder' => 'Unit Description'  ))}}
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
