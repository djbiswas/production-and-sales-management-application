@extends('layouts.admin')

@section('content')
    <h2>Add Purchases</h2>
    {!! Form::open(['route' => 'materialPurchases.store', 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}
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
        <div class="col">
            <!-- Select LC No Select Field -->
            <div class="form-group  ">
                {{Form::label('lc_id','Select LC No:') }}

                {{Form::select('lc_id', $lcs, null, ['class' => 'lc_id select2_op form-control','id' => 'lc_id', 'placeholder' => 'Pick a Select LC No...', 'required']) }}
                @if ($errors->has('lc_id'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lc_id') }}</strong>
                </span>
                @endif

            </div>

        </div>
        <div class="col">
            <!-- Available Qty Input Form -->
            <div class="form-group ">
                {{Form::label('av_qty','Available Qty:') }}

                {{Form::number('av_qty', 0, ['class' => 'form-control', 'placeholder' => 'Available Qty', 'required','readonly']) }}
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
            {{Form::label('lc', 'Total Price')}}
            <div class="input-group mb-3">
                {{Form::number('lc', null, array('class' => 'form-control', 'onblur' => 'load_bdt()', 'placeholder' => 'Total Price', 'required'))}}
            </div>
        </div>
        <div class="col-4">
            {{Form::label('quantity', 'Quantity')}}
            <div class="input-group mb-3">
                {{Form::number('quantity', null, array('onblur' => 'check_lc()','class' => 'quantity form-control', 'placeholder' => 'Quantity', 'required','step'=>'.01'))}}
            </div>
        </div>
        <div class="col-4">
            {{Form::label('other_costs', 'Other Costs(৳)')}}
            <div class="input-group mb-3">
                {{Form::number('other_costs', null, array('id' => 'other_costs','onblur' => 'load_bdt()','class' => 'form-control', 'placeholder' => 'Other Costs(৳)' , 'required' ))}}
            </div>
        </div>
        <div class="col">
            {{Form::label('total_bdt', 'BDT Amount (৳)')}}
            <div class="input-group mb-3">
                {{Form::number('total_bdt', null, array('class' => 'form-control', 'placeholder' => 'BDT Amount', 'readonly', 'required'  ))}}
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
    <script !src="">
        // check lc
        function check_lc() {
            var lc_val = $('.quantity').val();
            lc_val = parseFloat(lc_val).toFixed(0);

            var av_qty = $('#av_qty').val();
            av_qty = parseFloat(av_qty).toFixed(0);


            if(av_qty == 0){
                alert('Select Valid LC');
                $(".quantity").val('');
            }else{
                if((av_qty - 0 ) < (lc_val - 0)){
                    alert('Select Another LC');
                    $(".quantity").val('');
                }
            }
        }

    </script>
    <script>
        function load_bdt(){
            var bdt = 0;
            var total_amount = $("#lc").val();
            var currency_val = $("#currency").val();
            var other_costs = $("#other_costs").val();
            if(other_costs == ''){
                other_costs = 0;
            }

            bdt = (total_amount * currency_val) + parseFloat(other_costs);

            document.getElementById('total_bdt').value = bdt;
            console.log(bdt);

        }
    </script>

    <script !src="">
        $(function(){
            $('.lc_id').on('change', function() {
                var lc_id = $(".lc_id option:selected").val();
                console.log(lc_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "/get_lc",
                    method: "POST",
                    data: {lc_id: lc_id},
                    success: function(data) {
                        $("#av_qty").val(data.av_qty);
                        $("#lc_id").val(data.id);
                    }
                });

            })
        });
    </script>

@endsection

