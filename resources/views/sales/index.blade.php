@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col">
            <h2>All Sales</h2>
        </div>
        <div class="col text-right">

            <a href="{{route('materialPurchases.create')}}" class="btn btn-primary">
                <i class="mdi mdi-account-edit"></i> New Sales</a>
        </div>
    </div>


    <div class="card-content">
        <table id="sales_table" class="table is-narrow">
            <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Product Name</th>
                <th>Customer Name</th>
                <th>Grand Total</th>
                <th>Paid</th>
                <th>Due</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <th> # </th>
                    <td>{{$sale->date}}</td>
                    <td>{{$sale->customer_id}}</td>
                    <td>{{$sale->grandTotal}}</td>
                    <td>{{$sale->paid}}</td>
                    <td>{{$sale->grandTotal - $sale->paid}}</td>
                    <td class="has-text-right">
                        {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}
                        <form action="{{ route('materialPurchases.destroy',$sale->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                            <a class="btn btn-info" href="{{route('materialPurchases.edit', $sale->id)}}"> Edit</a>
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
        $('#sales_table').DataTable();
    </script>
@endsection
