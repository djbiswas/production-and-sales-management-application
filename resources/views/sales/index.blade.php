@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col">
            <h2>All Sales</h2>
        </div>
        <div class="col text-right">

            <a href="{{route('sales.create')}}" class="btn btn-primary">
                <i class="mdi mdi-account-edit"></i> New Sales</a>
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
                    <td>{{$sale->customer->name}}</td>
                    <td>{{$sale->netTotal}}</td>
                    <td>{{$sale->paid}}</td>
                    <td>{{$sale->due }}</td>
                    <td class="has-text-right text-center">

                        <form id="deleteForm{{$sale->id}}" action="{{ route('sales.destroy',$sale->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
{{--                        <a class="btn btn-info" href="{{route('sales.edit', $sale->id)}}"> Edit</a>--}}
                        <a class="btn btn-success" href="{{route('sales.show', $sale->id)}}" target="_blank">Invoice </a>

                        <button class="delete btn btn-danger" onclick="deleteform({{$sale->id}})">Delete</button>

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

    <script !src="">
        function deleteform(id){
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: "It will permanently deleted !",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result=> {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    $("#deleteForm"+id).submit();
                }
            })
        }
    </script>
@endsection
