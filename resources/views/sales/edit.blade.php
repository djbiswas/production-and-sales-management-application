@extends('layouts.admin')

@section('content')
    <style>
        .delete_row { width: 4% }
    </style>


    <h2>New Invoice </h2>
    {!!  Form::model($sale,['method' =>'PATCH', 'route' => ['sales.update', $sale->id]])  !!}

    {{csrf_field()}}

    <div class="card card-accent-primary mb-3" style="background: #f9fbff">
        <div class="card-body text-dark">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <!-- Customer_id Select Field -->
                    <div class="form-group  ">
                        {{Form::label('customer_id','Customer_id:') }}
                        {{Form::select('customer_id', $customers, null, ['class' => 'select2_op form-control','id' => 'customer_id', 'placeholder' => 'Pick a Customer...', 'required']) }}
                        @if ($errors->has('customer_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('customer_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <!-- Date Input Form -->
                    <div class="form-group">
                        {{Form::label('date','Date:') }}
                        {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group  ">
                        {{Form::label('invoice','Invoice: #') }}
                        {{Form::text('invoice', null, ['class' => 'form-control', 'placeholder' => 'Invoice', 'required','readonly']) }}
                        @error('invoice')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card-accent-primary text-dark">
            {{-- <form id="sellForm" onsubmit=" return false">--}}
            <div class="card p-4" style="background: #f9fbff">
                <div class="table-responsive ">
                    <table style="width: 100%;">
                        <thead>
                        <th style="width: 2%">#</th>
                        <th style="width: 18%">Product Name</th>
                        <th style="width: 18%">Available Stock</th>
                        <th style="width: 18%">Unit Price</th>
                        <th style="width: 18%">Order Quantity</th>
                        <th style="width: 18%">Total Price</th>
                        <th style="width: 2%">Action</th>
                        </thead>
                        <tbody id="invoiceItem">
                        <!-- invoice item will show here by ajax  -->

                        </tbody>
                    </table>
                </div>
                <div class="form-group text-right mt-3">
                    <button type="button" class="btn btn-primary" id="addNewRowBtn"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <div class="invoice-area pt-3 card-accent-primary" style="background: #f9fbff">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-5 offset-md-2 col-lg-5 offset-lg-2 ">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="subtotal">Subtoal</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('subtotal', null, ['id' => 'subtotal','class' => 'form-control form-control-sm', 'placeholder' => 'Subtotal', 'step' => '0.01','required','readonly' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="discount">Discount %</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('discount', 0, ['id' => 'discount','class' => 'form-control form-control-sm', 'placeholder' => 'Discount %', 'step' => '0.01','required' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-none">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="discount">Discount</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('discount_amount', 0, ['id' => 'discount_amount','class' => 'form-control form-control-sm', 'placeholder' => 'Discount Amount', 'step' => '0.01','required','readonly' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="discount">Vat & Tax %</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('vat', 0, ['id' => 'vat','class' => 'form-control form-control-sm', 'placeholder' => 'Vat & Tax', 'step' => '0.01' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="netTotal">Net Total</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('netTotal', null, ['id' => 'netTotal','class' => 'form-control form-control-sm', 'placeholder' => 'Net Total', 'step' => '0.01','required','readonly' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="paid">Paid bill</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('paid', null, ['id' => 'paid','class' => 'form-control form-control-sm', 'placeholder' => 'Paid Bill', 'step' => '0.01','required' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="oldDue">Previous Due</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('oldDue', null, ['id' => 'oldDue','class' => 'form-control form-control-sm', 'placeholder' => 'Previous Due', 'step' => '0.01','required','readonly' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="due">Due bill</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('due', null, ['id' => 'due','class' => 'form-control form-control-sm', 'placeholder' => 'Due bill', 'step' => '0.01','required','readonly' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-7 text-right">
                                    {{Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Submit Button Form -->
        </div>
    </div>

{{ Form::close() }}

@endsection

@section('scripts')
    <script>
        // sell option js
        $(document).ready(function() {
            addNewRow();
            $('#addNewRowBtn').on('click', function(event) {
                event.preventDefault();
                /* Act on the event */
                addNewRow();
            });
            function addNewRow() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/addNewRow",
                    method: "POST",
                    data: {getOrderItem: 1},
                    success: function(data) {
                        $('#invoiceItem').append(data);
                        $(".select2_op").select2();
                        var n = 0;
                        $('.si_number').each(function() {
                            $(this).html(++n);
                        });
                    }
                })
            }
            $(document).on('click', '.cancelThisItem', function(event) {
                event.preventDefault();
                /* Act on the event */
                $(this).parent().parent().remove();
                invoice_calculate(0);
            });
            $(document).on('change', '.product_model_id', function(event) {
                event.preventDefault();
                var product_model_id = $(this).val();
                var tr = $(this).parent().parent();
                $.ajax({
                    url: '/single_sell_item',
                    method: 'POST',
                    // dataType: 'json',
                    data: {getSellSingleInfo: 1, id: product_model_id},
                    success: function(data) {
                        console.log(data);
                        tr.find('.qaty').val(data["quantity"]);
                        tr.find('.oqty').val(1);
                        tr.find('.buyPrice').val(data["buyPrice"]);
                        tr.find('.price').val(data["sellPrice"]);
                        tr.find('.pro_name').val(data["name"]);
                        tr.find('.tprice').val(tr.find('.oqty').val() * tr.find('.price').val());
                        invoice_calculate(0);
                    }
                });
            });
            $(document).on('keyup', '.oqty', function(event) {
                var qty = $(this);
                var tr = $(this).parent().parent();
                if ((qty.val() - 0) > (tr.find('.qaty').val() - 0)) {
                    alert('please enter a valid quantity');
                } else {
                    tr.find('.tprice').val(tr.find('.oqty').val() * tr.find('.price').val());
                    invoice_calculate(0);
                }
            });
            // calculate function
            function invoice_calculate(dis) {
                var set_sub_total = 0;
                var net_total = 0;
                var vat =  $('#vat').val();
                var make_vat = (set_sub_total / 100) * vat;
                var discount = dis;

                $('.tprice').each(function() {
                    set_sub_total = set_sub_total + ($(this).val() * 1);
                    //$('#vat').val(make_vat);
                    $('#netTotal').val(net_total.toFixed(2));
                });

                var make_discount = (set_sub_total / 100) * discount;

                $('#discount_amount').val(make_discount.toFixed(2));
                net_total = (set_sub_total - make_discount) + make_vat;
                $('#subtotal').val(set_sub_total);
                $('#netTotal').val(net_total.toFixed(2));
                // $('#due')
            }
            // discount calaulation js
            $('#discount').on('keyup', function(event) {
                event.preventDefault();
                /* Act on the event */
                var discount = $(this).val();
                invoice_calculate(discount);
            });

            // Var calaulation js
            $('#vat').on('keyup', function(event) {
                event.preventDefault();
                invoice_calculate(0);
            });

            $(document).on('keyup', '.price', function(event) {
                event.preventDefault();
                /* Act on the event */
                var tr = $(this).parent().parent();
                var new_price = $(this).val();
                var new_res = tr.find('.tprice').val(new_price);
                invoice_calculate(0);
            });

            $(document).on('keyup', '#discount_amount', function(event) {
                event.preventDefault();
                /* Act on the event */
                var discount_amount = $('#discount_amount').val();
                var subtotal = $('#subtotal').val();
                var p_make_dis_amount = subtotal - discount_amount;
                $('#netTotal').val(p_make_dis_amount);
            });
            // paid and due bill calaulation
            $('#paid').on('keyup', function(event) {
                event.preventDefault();
                /* Act on the event */
                var paid_bill = $(this).val();
                var due_bill = $('#netTotal').val() - paid_bill;
                $('#due').val(due_bill.toFixed(2));
            });
        });
    </script>
@endsection

