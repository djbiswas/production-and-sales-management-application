@extends('layouts.admin')

@section('content')
    <h2>Add Purchases</h2>
    {!! Form::open(['route' => 'sales.store', 'method' => 'post']) !!}
    {{csrf_field()}}

    <div class="card card-accent-primary mb-3" style="">
        <div class="card-header text-center"><h3>Select Date And Customer</h3></div>
        <div class="card-body text-dark">
        {{-- <h5 class="card-title">Dark card title</h5>--}}

            {{-- Invoice Customer And Date--}}
            <div class="cadTop">
            <!-- Invoice Input Form -->
                <div class="form-group  ">
                    {{Form::label('invoice','Invoice: #') }}
                    {{Form::text('invoice', 20202001, ['class' => 'form-control', 'placeholder' => 'Invoice', 'required','readonly']) }}
                    @error('invoice')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

            <!-- Date Input Form -->
                <div class="form-group">
                    {{Form::label('date','Date:') }}
                    {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>

                <!-- Customer_id Select Field -->
                <div class="form-group  ">
                    {{Form::label('customer_id','Customer_id:') }}

                    {{Form::select('customer_id', [], null, ['class' => 'select2_op form-control','id' => 'customer_id', 'placeholder' => 'Pick a Customer...', 'required']) }}
                    @if ($errors->has('customer_id'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('customer_id') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div class="card card-accent-primary mb-3" style="">
        <div class="card-header text-center"><h3>Select Product and set Qty</h3></div>
        <div class="card-body text-dark">
            <div class="form-row">
                <!-- Product_id Select Field -->
                <div class="form-group col ">
                    {{Form::label('product_id','Product_id:') }}

                    {{Form::select('product_id', ['p1','p2'], null, ['class' => 'select2_op form-control','id' => 'product_id', 'placeholder' => 'Pick a Product...', 'required']) }}
                    @if ($errors->has('product_id'))
                        <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('product_id') }}</strong>
                           </span>
                    @endif
                </div>

                <!-- Show stock Input Form -->
                <div class="form-group col ">
                    {{Form::label('show_stock','Stock:') }}
                    {{Form::text('show_stock', null, ['class' => 'form-control', 'placeholder' => 'Stock', 'required','readonly']) }}
                    @error('show_stock')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <!-- Unit price Input Form -->
                <div class="form-group col ">
                    {{Form::label('unit_price','Stock Unit price:') }}

                    {{Form::text('unit_price', null, ['class' => 'form-control', 'placeholder' => 'Stock Unit price', 'required','readonly']) }}
                    @error('unit_price')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <!-- Qty Input Form -->
                <div class="form-group col ">
                    {{Form::label('qty','Quantity:') }}
                    {{Form::text('qty', null, ['class' => 'form-control', 'placeholder' => 'Quantity', 'required']) }}
                    @error('qty')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <!-- Unit price Input Form -->
                <div class="form-group col ">
                    {{Form::label('unit_price','Unit price:') }}
                    {{Form::text('unit_price', null, ['class' => 'form-control', 'placeholder' => 'Unit price', 'required']) }}
                    @error('unit_price')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <!-- Total Input Form -->
                <div class="form-group col ">
                    {{Form::label('total','Total:') }}
                    {{Form::text('total', null, ['class' => 'form-control', 'placeholder' => 'Total', 'required']) }}
                    @error('total')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    {{Form::submit('Add', ['class' => 'btn btn-primary float-right']) }}
                </div>

            </div>
            <!-- Submit Button Form -->

            <hr>

            <div class="form-row">
                <!-- Total Input Form -->
                <div class="form-group col-6 ">
                    {{Form::label('total','Total:') }}
                    {{Form::text('total', null, ['class' => 'form-control', 'placeholder' => 'Total', 'required']) }}
                    @error('total')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <!-- Discount Input Form -->
                <div class="form-group col-6 ">
                    {{Form::label('discount','Discount:') }}
                    {{Form::text('discount', null, ['class' => 'form-control', 'placeholder' => 'Discount', 'required']) }}
                    @error('discount')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <!-- Vat Input Form -->
                <div class="form-group col-6 ">
                    {{Form::label('vat','Vat / Tax:') }}

                    {{Form::text('vat', null, ['class' => 'form-control', 'placeholder' => 'Vat / Tax', 'required']) }}

                    @error('vat')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <!-- GrandTotal Input Form -->
                <div class="form-group col-6 ">
                    {{Form::label('grandTotal','GrandTotal:') }}

                    {{Form::text('grandTotal', null, ['class' => 'form-control', 'placeholder' => 'GrandTotal', 'required']) }}

                    @error('grandTotal')
                    <span>{{ $message }}</span>
                    @enderror

                </div>
            </div>

            <div class="form-row">
                <div class="col-5"></div>
                <div class="col">
                    <!-- Paynow Input Form -->
                    <div class="form-group  ">
                        {{Form::label('payNow','Pay Now:') }}
                        {{Form::text('paynow', null, ['class' => 'form-control', 'placeholder' => 'Pay Now', 'required']) }}
                        @error('paynow')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Discount Input Form -->
                    <div class="form-group  ">
                        {{Form::label('discount','Discount:') }}

                        {{Form::text('discount', null, ['class' => 'form-control', 'placeholder' => 'Discount', 'required']) }}

                        @error('discount')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- Due Input Form -->
                    <div class="form-group  ">
                        {{Form::label('due','Due:') }}

                        {{Form::text('due', null, ['class' => 'form-control', 'placeholder' => 'Due', 'required']) }}

                        @error('due')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>



                </div>
            </div>

            
        </div>
    </div>

    <div class="card card-accent-primary mb-3" style="">
        <div class="card-body text-dark">

            <hr class="card-accent-primary">

        </div>


    </div>


    {{ Form::close() }}

@endsection

@section('scripts')
    <script>

    </script>

@endsection

