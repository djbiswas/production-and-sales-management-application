@extends('layouts.admin')

@section('content')
    <h2>Edit Raw Purchases</h2>
    {!!  Form::model($rawpurchase,['method' =>'PATCH', 'route' => ['rawpurchases.update', $rawpurchase->id]])  !!}

    {{csrf_field()}}

    <div class="row">
        <div class="col-4">
            <!-- Date Input Form -->
            <div class="form-group">
                {{Form::label('date','Date:') }}
                {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-4">
            {{Form::label('rawmaterial_id', 'Select Product')}}
            <div class="form-group mb-3">
                {{Form::select('rawmaterial_id', $rawmaterials, null, ['class' => 'select2_op form-control', 'required'])}}
            </div>
        </div>
        <div class="col-4">
            {{Form::label('supplier_id', 'Select Supplier')}}
            <div class="form-group mb-3">
                {{Form::select('supplier_id', $suppliers, null, ['class' => 'select2_op form-control', 'placeholder' => 'Select Suppliers', 'required'])}}
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-6">
            {{Form::label('unitprice', 'Unit Price')}}
            <div class="input-group mb-3">
                {{Form::number('unitprice', null, array('class' => 'form-control', 'id' => 'unitprice', 'onblur' => 'load_bdt()', 'placeholder' => 'Unit Price', 'required'))}}
            </div>
        </div>
        <div class="col-6">
            {{Form::label('quantity', 'Quantity')}}
            <div class="input-group mb-3">
                {{Form::number('quantity', null, array('onblur' => 'load_bdt()','class' => 'quantity form-control', 'placeholder' => 'Quantity', 'required','step'=>'.01'))}}
            </div>
        </div>
        <div class="col-6">
            {{Form::label('other_costs', 'Other Costs(৳)')}}
            <div class="input-group mb-3">
                {{Form::number('cost', null, array('id' => 'cost','onblur' => 'load_bdt()','class' => 'form-control', 'placeholder' => 'Other Costs(৳)' , 'required' ))}}
            </div>
        </div>
        <div class="col-6">
            {{Form::label('price', 'Total Price')}}
            <div class="input-group mb-3">
                {{Form::number('price', null, array('class' => 'form-control', 'onblur' => 'load_bdt()', 'placeholder' => 'Total Price', 'required','readonly'))}}
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
        function load_bdt(){
            var unitprice = $("#unitprice").val();
            var quantity = $(".quantity").val();
            var cost = $("#cost").val();
            if(cost == ''){
                cost = 0;
            }

            price = (unitprice * quantity) + parseFloat(cost);

            document.getElementById('price').value = price;
            console.log(price);

        }
    </script>


@endsection

