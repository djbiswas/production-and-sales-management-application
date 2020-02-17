<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="{{ asset('css/inv.css') }}" rel="stylesheet">

    <div id="invoice">
        <div class="toolbar hidden-print">
            <div class="text-right">
                <button onclick="printDiv()" id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
{{--                <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>--}}
            </div>
            <hr>
        </div>
        <div id="printDiv" class="invoice overflow-auto">
            <div style="min-width: 600px">
                <header class="logoh">
                    <div class="row">
                        <div class="col">
                            <img src="/sst.jpg" width="200" data-holder-rendered="true" />
                        </div>
                        <div class="col company-details">
                            <h2 class="name">
                               SS Traders
                            </h2>
                            <div>Jashore, Bangladesh</div>
                            <div>01700000000</div>
                            <div><p>company@example.com</p></div>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="row contacts">
                        <div class="col invoice-to">
                            <div class="text-gray-light">INVOICE TO:</div>
                            <h2 class="to">{{$sale->customer->name}}</h2>
                            <div class="address">{{$sale->customer->address}}</div>
                            <div class="email"><a href="mailto:john@example.com">{{$sale->customer->email}}</a></div>
                        </div>
                        <div class="col invoice-details">
                            <h1 class="invoice-id"># {{$sale->invoice}}</h1>
                            <div class="date">Date of Invoice: {{$sale->date}}</div>
                         <div class="date">Shipping Address: {{$sale->shipping_address}}</div>

                        </div>
                    </div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead >
                            <tr>
                                <th>#</th>
                                <th class="text-left" style="width: 55%;">PRODUCT NAME</th>
                                <th class="text-left" style="">TRUCK NUMBER</th>
                                <th class="text-right">UNIT PRICE</th>
                                <th class="text-right">QUANTITY</th>
                                <th class="text-right">TOTAL PRICE</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php ($i = 0)
                        @foreach($sale->sale_items as $sale_item)
                            <tr>
                                <td class="no">{{++$i}}</td>
                                <td class="text-left">{{$sale_item->product_name}}</td>
                                <td class="text-left truck">{{$sale_item->track_number}}</td>
                                <td class="unit">{{$sale_item->price}}</td>
                                <td class="qty">{{$sale_item->orderQuantity}}</td>
                                <td class="total">{{$sale_item->totalPrice}}</td>
                            </tr>
                        @endforeach



                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2">SUBTOTAL</td>
                                <td>{{$sale->subtotal}}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2">TAX {{$sale->vat}} %</td>
                                <td>{{($sale->subtotal / 100)*$sale->vat}}</td>
                            </tr>
                            <tr class="">
                                <td colspan="3"></td>
                                <td colspan="2">DISCOUNT {{$sale->discount}} %</td>
                                <td><span class="text-danger">(-{{($sale->subtotal / 100)*$sale->discount}})</span></td>
                            </tr>
                            <tr class="gtotal">
                                <td colspan="3"></td>
                                <td colspan="2">GRAND TOTAL</td>
                                <td>{{$sale->netTotal}}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2">PAID</td>
                                <td>{{$sale->paid}}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2">DUE</td>
                                <td>{{$sale->due}}</td>
                            </tr>

                        </tfoot>

                    </table>
                    <div class="thanks">Signature & Seal</div>
                    <div class="notices">
                        <div>NOTICE:</div>
                        <div class="notice">Sale Product will not be returned.</div>
                    </div>
                </main>
{{--                <footer>--}}
{{--                    SoftxLtd--}}
{{--                </footer>--}}
            </div>
            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div></div>
        </div>
    </div>
    <script !src="">

        function printDiv() {
            Popup($('#printDiv').outerHTML);
            function Popup(data)
            {
                window.print();
                return true;
            }
        }
    </script>

