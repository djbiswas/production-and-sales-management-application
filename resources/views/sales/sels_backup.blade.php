@extends('layouts.admin')

@section('content')
    <style>
        .delete_row { width: 4% }
    </style>


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

            <div class="row">
                <div class="table-responsive">
                    <table id="autocomplete_table" class="table table-hover autocomplete_table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Buy Unit price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Unit price</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="row_1">
                            <th id="delete_row" scope="row" class="delete_row"><img src="{{asset('images/minus.svg')}}" alt=""></th>
                            <td>
                                <input type="text" data-field-name="product_model_name" name="product_model_name[]" id="product_model_name_1" class="form-control autocomplete_txt" autocomplete="off">
                            </td>
                            <td>
                                <input type="text" data-field-name="quantity" name="quantity[]" id="quantity_1" class="form-control autocomplete_txt" autocomplete="off" readonly>
                            </td>
                            <td>
                                <input type="text" data-field-name="unitPrice" name="unitPrice[]" id="unitPrice_1" class="form-control autocomplete_txt" autocomplete="off" readonly>
                            </td>
                            <td>
                                <input type="number" data-field-name="qty" name="qty[]" id="qty_1" class="form-control autocomplete_txt" autocomplete="off" onblur="calcu()" value="1">
                            </td>
                            <td>
                                <input type="text" data-field-name="sellPrice" name="sellPrice[]" id="sellPrice_1" class="form-control autocomplete_txt" autocomplete="off">
                            </td>
                            <td>
                                <input type="text" data-field-name="sTotal" name="sTotal[]" id="sTotal_1" class="form-control autocomplete_txt" autocomplete="off">
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div style="width:100%">
                    <button class="btn btn-primary" id="addNew" type="button" style="float: right;
">                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

        {{--            <div class="form-row d-none">--}}
        {{--                <!-- Product_id Select Field -->--}}
        {{--                <div class="form-group col ">--}}
        {{--                    {{Form::label('product_id','Product_id:') }}--}}

        {{--                    {{Form::select('product_id', ['p1','p2'], null, ['class' => 'select2_op form-control','id' => 'product_id', 'placeholder' => 'Pick a Product...', 'required']) }}--}}
        {{--                    @if ($errors->has('product_id'))--}}
        {{--                        <span class="invalid-feedback" role="alert">--}}
        {{--                               <strong>{{ $errors->first('product_id') }}</strong>--}}
        {{--                           </span>--}}
        {{--                    @endif--}}
        {{--                </div>--}}

        {{--                <!-- Show stock Input Form -->--}}
        {{--                <div class="form-group col ">--}}
        {{--                    {{Form::label('show_stock','Stock:') }}--}}
        {{--                    {{Form::text('show_stock', null, ['class' => 'form-control', 'placeholder' => 'Stock', 'required','readonly']) }}--}}
        {{--                    @error('show_stock')--}}
        {{--                    <span>{{ $message }}</span>--}}
        {{--                    @enderror--}}
        {{--                </div>--}}

        {{--                <!-- Unit price Input Form -->--}}
        {{--                <div class="form-group col ">--}}
        {{--                    {{Form::label('unit_price','Stock Unit price:') }}--}}

        {{--                    {{Form::text('unit_price', null, ['class' => 'form-control', 'placeholder' => 'Stock Unit price', 'required','readonly']) }}--}}
        {{--                    @error('unit_price')--}}
        {{--                    <span>{{ $message }}</span>--}}
        {{--                    @enderror--}}
        {{--                </div>--}}

        {{--                <!-- Qty Input Form -->--}}
        {{--                <div class="form-group col ">--}}
        {{--                    {{Form::label('qty','Quantity:') }}--}}
        {{--                    {{Form::text('qty', null, ['class' => 'form-control', 'placeholder' => 'Quantity', 'required']) }}--}}
        {{--                    @error('qty')--}}
        {{--                    <span>{{ $message }}</span>--}}
        {{--                    @enderror--}}
        {{--                </div>--}}

        {{--                <!-- Unit price Input Form -->--}}
        {{--                <div class="form-group col ">--}}
        {{--                    {{Form::label('unit_price','Unit price:') }}--}}
        {{--                    {{Form::text('unit_price', null, ['class' => 'form-control', 'placeholder' => 'Unit price', 'required']) }}--}}
        {{--                    @error('unit_price')--}}
        {{--                    <span>{{ $message }}</span>--}}
        {{--                    @enderror--}}
        {{--                </div>--}}

        {{--                <!-- Total Input Form -->--}}
        {{--                <div class="form-group col ">--}}
        {{--                    {{Form::label('total','Total:') }}--}}
        {{--                    {{Form::text('total', null, ['class' => 'form-control', 'placeholder' => 'Total', 'required']) }}--}}
        {{--                    @error('total')--}}
        {{--                    <span>{{ $message }}</span>--}}
        {{--                    @enderror--}}
        {{--                </div>--}}

        {{--                <div class="col-12">--}}
        {{--                    {{Form::submit('Add', ['class' => 'btn btn-primary float-right']) }}--}}
        {{--                </div>--}}

        {{--            </div>--}}
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

            <div class="text-right">
                <!-- Submit Button Form -->
                {{Form::submit('Submit', ['class' => 'btn btn-primary']) }}

            </div>

        </div>
    </div>

    {{ Form::close() }}

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            var rowcount, addBtn, tableBody, basePath;

            addBtn = $("#addNew");
            rowcount = $("#autocomplete_table tbody tr").length+1;
            tableBody = $("#autocomplete_table tbody");
            //imgPath = $("#imgPath").val();
            basePath = $("#base_path").val();


            function formHtml() {
                html = '<tr id="row_'+rowcount+'">';
                html += '<th id="delete_'+rowcount+'" scope="row" class="delete_row"><img src="{{asset('images/minus.svg')}}" alt="" st></th>';
                html += '<td>';
                html += '<input type="text" data-field-name="product_model_name" name="product_model_name[]" id="product_model_name_'+rowcount+'" class="form-control autocomplete_txt" autocomplete="off">';
                html += '</td>';
                html += '<td>';
                html += '<input type="text" data-field-name="numcode" name="quantity[]" id="quantity_'+rowcount+'" class="form-control autocomplete_txt" autocomplete="off" readonly>';
                html += '</td>';
                html += '<td>';
                html += '<input type="text" data-field-name="unitPrice" name="unitPrice[]" id="unitPrice_'+rowcount+'" class="form-control autocomplete_txt" autocomplete="off" readonly>';
                html += '</td>';

                html += '<td>';
                html += '<input type="text" data-field-name="iso3" name="qty[]" id="qty_'+rowcount+'" class="form-control autocomplete_txt" autocomplete="off" value="1">';
                html += '</td>';

                html += '<td>';
                html += '<input type="text" data-field-name="iso3" name="sellPrice[]" id="sellPrice_'+rowcount+'" class="form-control autocomplete_txt" autocomplete="off">';
                html += '</td>';

                html += '<td>';
                html += '<input type="text" data-field-name="iso3" name="sTotal[]" id="sTotal_'+rowcount+'" class="form-control autocomplete_txt" autocomplete="off">';
                html += '</td>';

                html += '</tr>';
                rowcount++;
                return html;
            }

            function addNewRow() {
                var html = formHtml();
                //console.log(html);
                tableBody.append(html);
            }

            function deleteRow() {
                console.log($(this).parent());
                $(this).parent().remove();
            }

            function getId(element){
                var id, idArr;
                id = element.attr('id');
                idArr = id.split("_");
                return idArr[idArr.length - 1];
            }

            function handleAutocomplete() {
                var fieldName, currentEle;
                currentEle = $(this);
                fieldName = currentEle.data('field-name');

                if(typeof fieldName === 'undefined') {
                    return false;
                }

                currentEle.autocomplete({
                    source: function( data, cb ) {
                        console.log(fieldName);
                        //if(fieldName == ''){}
                        $.ajax({
                            url: '/get-products',
                            method: 'GET',
                            dataType: 'json',
                            data: {
                                name: data.term,
                                fieldName: fieldName
                            },
                            success: function(res){
                                var result;
                                result = [
                                    {
                                        label: 'There is no matching record found for '+data.term,
                                        value: ''
                                    }
                                ];

                                if (res.length) {
                                    result = $.map(res, function(obj){

                                        return {
                                            label: obj[fieldName],
                                            value: obj[fieldName],
                                            data : obj
                                        };
                                    });
                                }
                                cb(result);
                            }
                        });
                    },
                    autoFocus: true,
                    minLength: 2,
                    select: function( event, selectedData ) {
                        if(selectedData && selectedData.item && selectedData.item.data){
                            console.log(selectedData);
                            var rowNo, data;
                            rowNo = getId(currentEle);
                            data = selectedData.item.data;
                            $('#quantity_'+rowNo).val(data.quantity);
                            $('#unitPrice_'+rowNo).val(data.unitPrice);
                            $('#sellPrice_'+rowNo).val(data.sellPrice);
                            var qty = $('#qty_'+rowNo).val();
                            var tt = data.sellPrice * qty;
                            $('#sTotal_'+rowNo).val(tt);
                            $('#countryno_'+rowNo).val(data.numcode);

                        }
                    }
                });
            }

            function registerEvents() {
                addBtn.on("click", addNewRow);
                $(document).on('click', '.delete_row', deleteRow);
                //register autocomplete events
                $(document).on('focus','.autocomplete_txt', handleAutocomplete);
            }
            registerEvents();

        });

        function calcu() {

        }
    </script>

@endsection

