<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="{{ asset('css/inv.css') }}" rel="stylesheet">
<style>
    .invoice main .thanks {
        margin-top: 0;
    }
</style>

<div id="invoice">
    <div class="toolbar hidden-print">
        <div class="text-right">
            <button onclick="printDiv()" id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            {{--   <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>--}}
        </div>
        <hr>
    </div>
    <div id="printDiv" class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <img src="https://www.pasha.org.pk/wp-content/uploads/2019/07/DEMO.png" width="200" data-holder-rendered="true" />
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
                        <h2 class="to">{{$salesReturn->customer->name}}</h2>
                        <div class="address">{{$salesReturn->customer->address}}</div>
                        <div class="email"><a href="mailto:john@example.com">{{$salesReturn->customer->email}}</a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id"># {{$salesReturn->sale->invoice}}</h1>
                        <div class="date">Date of Invoice: {{$salesReturn->date}}</div>
                          <div class="date">Due Date: 30/10/2018</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead >
                    <tr>
                        <th>#</th>
                        <th class="text-left" style="">PRODUCT NAME</th>
                        <th class="text-right">QUANTITY</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php ($i = 0)
                    @foreach($returnItems as $salesReturn_item)
                        <tr>
                            <td class="no">{{++$i}}</td>
                            <td class="text-left">{{$salesReturn_item->productModel->product_model_name}}</td>
                            <td class="unit">{{$salesReturn_item->qty}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="1"></td>
                        <td colspan="1">AMOUNT</td>
                        <td>{{$salesReturn->amount}}</td>
                    </tr>


                    </tfoot>

                </table>
                <div class="thanks">Signature & Seal</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">Sale Product will not be returned.</div>
                </div>
            </main>
            <footer>
                SoftxLtd
            </footer>
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

