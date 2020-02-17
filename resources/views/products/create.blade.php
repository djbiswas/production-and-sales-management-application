@extends('layouts.admin')

@section('content')
    <div style="margin: 0 15%;">
        <div class="card card-accent-primary mb-3 text-left" style="">
            <div class="card-header">Add New Stone</div>
            <div class="card-body text-primary">
            {!! Form::open(['route' => 'productModels.store', 'method' => 'post']) !!}
            {{csrf_field()}}


                <div class="">
                    {{ Form::label('product_model_name', 'Product Name')}}
                    <div class="input-group mb-3">
                        {{ Form::text('product_model_name', null, array('class' => 'form-control', 'placeholder' => 'Product Name', 'required'  ))}}
                    </div>
                </div>
                <div class="">
                    {{ Form::label('quantity', 'Product Quantity')}}
                    <div class="input-group mb-3">
                        {{ Form::text('quantity', null, array('class' => 'form-control', 'placeholder' => 'Product Quantity', 'required'  ))}}
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        {{ Form::label('unitPrice', 'Unit Price')}}
                        <div class="input-group mb-3">
                            {{ Form::text('unitPrice', null, array('class' => 'form-control', 'placeholder' => 'Unit Price', 'required'  ))}}
                        </div>
                    </div>
                    <div class="col">
                        {{ Form::label('sellPrice', 'Sell Price')}}
                        <div class="input-group mb-3">
                            {{ Form::text('sellPrice', null, array('class' => 'form-control', 'placeholder' => 'Sell Price', 'required'  ))}}
                        </div>
                    </div>
                </div>




            {{ Form::label('model_description', 'Product Description')}}
            <div class="input-group mb-3">
                {{ Form::textarea('model_description', null, array('class' => 'form-control', 'placeholder' => 'Product Description'  ))}}
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

