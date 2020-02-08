@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col">
            <h2>Sales Return List</h2>
        </div>

        <div class="col text-right">
            <a href="{{route('sales_returns.create')}}" class="btn btn-primary">
                <i class="mdi mdi-account-edit"></i> New Return</a>
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
                <th>Total Items</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($returns as $return)
                <tr>
                    <th> # </th>
                    <td>{{$return->date}}</td>
                    <td>{{$return->sale->invoice}}</td>
                    <td>{{$return->customer->name}}</td>
                    <td>{{$return->items}}</td>
                    <td>{{$return->amount}}</td>
                    <td class="has-text-right text-center">

                        <form id="deleteForm{{$return->id}}" action="{{ route('sales.destroy',$return->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
{{--                        <a class="btn btn-info" href="{{route('sales_returns.edit', $return->id)}}"> Edit</a>--}}
                        <a class="btn btn-success" href="{{route('sales_returns.show', $return->id)}}" target="_blank">Invoice </a>

{{--                        <button class="delete btn btn-danger" onclick="deleteform({{$return->id}})">Delete</button>--}}

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
