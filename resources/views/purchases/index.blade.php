@extends('layouts.admin')

@section('content')

    {{--    <h2>All Purchases</h2>--}}

            <div class="card-content">
                <table id="purchases" class="table is-narrow">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Supplier / Port</th>
                        <th>LC</th>
                        <th>Currency</th>
                        <th>Duty</th>
                        <th>Total BDT</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($purchases as $purchase)
                        <tr>

                            <th>{{$purchase->id}} </th>
                            <td>{{$purchase->product_models->product_model_name}}</td>
                            <td>{{$purchase->suppliers->name}}</td>
                            <td>{{$purchase->lc}}</td>
                            <td>{{$purchase->currency}}</td>
                            <td>{{$purchase->duty}}</td>
                            <td>{{$purchase->total_bdt}}</td>
                            <td>{{$purchase->quantity}}</td>

                            <td class="has-text-right">
                                {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}

                                <form action="{{ route('materialPurchases.destroy',$purchase->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')
                                    {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                                    <a class="btn btn-info" href="{{route('materialPurchases.edit', $purchase->id)}}"> Edit</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js"></script>


    <script>
        $('#purchases').DataTable();
    </script>
@endsection
