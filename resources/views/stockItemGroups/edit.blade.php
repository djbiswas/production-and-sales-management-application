@extends('layouts.admin')

@section('content')
    <h2>Update Stock Group</h2>
    {!!  Form::model($stockItemGroup,['method' =>'PATCH', 'route' => ['stockItemGroups.update', $stockItemGroup->id]])  !!}
    {{csrf_field()}}

    {{Form::label('group_name', 'Product Group Name')}}
    <div class="input-group mb-3">
        {{Form::text('group_name', null, array('class' => 'form-control', 'placeholder' => 'Product Group Name', 'required'  ))}}
    </div>

    {{Form::label('group_description', 'Note / Description')}}
    <div class="input-group mb-3">
        {{Form::textarea('group_description', null, array('class' => 'form-control', 'placeholder' => 'Note / Description'  ))}}
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
