@extends('layouts.admin')

@section('content')

    <link href="{{ asset('css/inv.css') }}" rel="stylesheet">

    <div class="row mb-5">
        <div class="col invoice-to">
            <div class="text-gray-light">INVOICE TO:</div>
            <h2 class="to">{{$sale->customer->name}}</h2>
            <div class="address">{{$sale->customer->address}}</div>
            <div class="email"><a href="mailto:john@example.com">{{$sale->customer->email}}</a></div>
        </div>
        <div class="col invoice-details text-info text-right">
            <h1 class="invoice-id"># {{$sale->invoice}}</h1>
            <div class="date">Date of Invoice: {{$sale->date}}</div>
            {{--                            <div class="date">Due Date: 30/10/2018</div>--}}
        </div>
    </div>

    <hr>

    {!! Form::open(['route' => 'sales_returns.store', 'method' => 'post', 'id' => 'spr' ]) !!}
    {{csrf_field()}}
    <table id="sales_table" class="table is-narrow">
        <thead>
            <tr>
                <th style="width: 2%">#</th>
                <th style="width: 19%">Product Name</th>
                <th style="width: 19%">Unit Price</th>
                <th style="width: 19%">Order Quantity</th>
                <th style="width: 19%">Total Price</th>
                <th style="width: 20%">Return Quantity</th>
            </tr>
        </thead>
        <tbody>
            @php ($i = 0)
            @foreach($sale->sale_items as $sale_item)
                <tr>
                    <td class="no">{{++$i}}</td>
                    <td class="text-left">{{$sale_item->product_name}}</td>
                    <td class="unit">{{$sale_item->price}}</td>
                    <td class="qty">{{$sale_item->orderQuantity}}</td>
                    <td class="total">{{$sale_item->totalPrice}}</td>
                    <td class="form">
                        <div class="input-group mb-3">
                            {{Form::number('product_model_id[]', $sale_item->product_model_id, array('class' => 'form-control', 'required','hidden' ))}}
                            {{Form::number('sale_id[]', $sale->id, array('class' => 'form-control', 'required','hidden'  ))}}
                            {{Form::number('sale_item_id[]', $sale_item->id, array('class' => 'form-control', 'required','hidden'  ))}}
                            {{Form::number('qty[]', null, array('max' => $sale_item->orderQuantity, 'class' => 'form-control', 'placeholder' => 'Quantity', 'required'  ))}}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <div class="row">
        <div class="col-lg-8"></div>

        <div class="col">
        {{Form::text('customer_id', $sale->customer->id, ['class' => 'form-control', 'placeholder' => '', 'required', 'hidden']) }}
            <!-- Date Input Form -->
            <div class="form-group">
                {{Form::label('date','Date:') }}
                {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
            </div>

            <!-- Amount Input Form -->
            <div class="form-group">
                {{Form::label('amount','Amount:') }}
                {{Form::number('amount', null, ['class' => 'form-control', 'placeholder' => 'Amount', 'required']) }}
            </div>

        </div>
    </div>

    <hr>
    {{ Form::close() }}
    <div class="text-right">
        <button class="delete btn btn-dark " onclick="sreturn()">Return</button>
    </div>


@endsection

@section('scripts')
    <script>
        // $('#sales_table').DataTable();
        // spr

        function sreturn(){
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: "It will permanently returned !",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, return it!'
            }).then(result=> {
                if (result.value) {
                    Swal.fire(
                        'returned!',
                        'Your items has been returned.',
                        'success'
                    );
                    setTimeout($("#spr").submit(), 100000);

                }
            })
        }

    </script>

@endsection
