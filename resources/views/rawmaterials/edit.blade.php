@extends('layouts.admin')

@section('content')
    <div style="margin: 0 15%;">

        <div class="card card-accent-primary mb-3 text-left" style="">
            <div class="card-header">Add New Materials</div>
            <div class="card-body text-primary">
                {!!  Form::model($rawmaterial,['method' =>'PATCH', 'route' => ['rawmaterials.update', $rawmaterial->id]])  !!}


                {{Form::text('store', session()->get('template'), ['class' => 'form-control', 'required', 'hidden']) }}

                <div class="">
                    {{ Form::label('name', 'Material Name')}}
                    <div class="input-group mb-3">
                        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Material Name', 'required'  ))}}
                    </div>
                </div>

                <div class="">
                    {{Form::label('stock_unit_id', 'Select Units')}}
                    <div class="form-group mb-3">
                        {{Form::select('stock_unit_id', $stock_units, null, ['class' => 'select2_op form-control', 'placeholder' => 'Select Units', 'required'])}}
                    </div>
                </div>

                <div class="">
                    {{ Form::label('quantity', 'Product Quantity')}}
                    <div class="input-group mb-3">
                        {{ Form::text('quantity', null, array('class' => 'form-control', 'placeholder' => 'Product Quantity', 'required'  ))}}
                    </div>
                </div>



                {{ Form::label('note', 'Note')}}
                <div class="input-group mb-3">
                    {{ Form::textarea('note', null, array('class' => 'form-control', 'placeholder' => 'Note'  ))}}
                </div>

                <hr>
                <div class="text-right">
                    {{ Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                </div>
                {{ Form::close() }}
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>

    </script>

@endsection
