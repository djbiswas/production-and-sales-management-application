@extends('layouts.admin')

@section('content')
    <h2>Edit Purchases</h2>

    {{ Form::model($materialPurchase, ['route' => ['materialPurchases.update', $materialPurchase->id], 'method' => 'put','enctype' => 'multipart/form-data', 'id' => 'purchasesForm']) }}
    {{csrf_field()}}

    {{-- {{Form::label('parentcategory_id', 'Select Product')}}
    <div class="form-group mb-3">
        {{Form::select('parentcategory_id', $parentcategories, null, ['class' => 'form-control','placeholder' => 'প্রধান ক্যাটাগরি নির্বাচন করুন', 'required'])}}
    </div> --}}

    <div class="row">
        <div class="col-4">
            <!-- Date Input Form -->
            <div class="form-group">
                {{Form::label('date','Date:') }}
                {{Form::date('date', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-4">
            {{Form::label('product', 'Select Product')}}
            <div class="form-group mb-3">
                {{Form::select('product', $products, null, ['class' => 'select2_op form-control', 'required'])}}
            </div>
        </div>
        <div class="col-4">
            {{Form::label('supplier', 'Select Supplier / Port')}}
            <div class="form-group mb-3">
                {{Form::select('supplier', $suppliers, null, ['class' => 'select2_op form-control', 'required'])}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            {{Form::label('currency', 'Select Currency')}}
            <div class="input-group mb-3">
                {{Form::select('currency', $currencies, null, ['onblur' => 'load_bdt()','class' => 'form-control', 'required'] )}}
            </div>
        </div>
        <div class="col-4">
            {{Form::label('lc', 'Total LC')}}
            <div class="input-group mb-3">
                {{Form::number('lc', null, array('class' => 'form-control', 'onblur' => 'load_bdt()', 'placeholder' => 'Total LC'))}}
            </div>
        </div>
        <div class="col-4">
            {{Form::label('duty', 'Custom Duty(৳)')}}
            <div class="input-group mb-3">
                {{Form::number('duty', null, array('onblur' => 'load_bdt()','class' => 'form-control', 'placeholder' => 'Custom Duty'  ))}}
            </div>
        </div>
    </div>

    {{Form::label('total_bdt', 'BDT Amount (৳)')}}
    <div class="input-group mb-3">
        {{Form::number('total_bdt', null, array('class' => 'form-control', 'placeholder' => 'BDT Amount', 'readonly'  ))}}
    </div>

    {{Form::label('quantity', 'Quantity')}}
    <div class="input-group mb-3">
        {{Form::number('quantity', null, array('class' => 'form-control', 'placeholder' => 'Quantity'))}}
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
            var bdt = 0;
            var total_amount = $("#lc").val();
            var currency_val = $("#currency").val();
            var duty = $("#duty").val();
            if(duty == ''){
                duty = 0;
            }

            bdt = (total_amount * currency_val) + parseFloat(duty);

            document.getElementById('total_bdt').value = bdt;
            console.log(bdt);

        }
    </script>

@endsection

