@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col">
            <h2>All Sales</h2>
        </div>
        <div class="col text-right">

            <a href="{{route('sales_returns.index')}}" class="btn btn-primary">
                <i class="mdi mdi-account-edit"></i> Return List</a>
        </div>
    </div>


    <div class="card-content">
        <table id="sales_table" class="table is-narrow">
            <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Invoice</th>
                <th>Customer Name</th>
                <th>Net Total</th>
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
                    <td>{{$sale->invoice}}</td>
                    <td>{{$sale->customer_id}}</td>
                    <td>{{$sale->netTotal}}</td>
                    <td>{{$sale->paid}}</td>
                    <td>{{$sale->due }}</td>
                    <td class="has-text-right text-center">
                        <a class="btn btn-dark" href="{{route('sales_returns.sr_form', $sale->id)}}">Return </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script>
        $('#sales_table').DataTable();
    </script>

    <script !src="">

@endsection
