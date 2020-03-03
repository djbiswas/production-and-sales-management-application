@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col">
            <h2>All Purchases</h2>
        </div>
        <div class="col text-right">

            <a href="{{route('rawpurchases.create')}}" class="btn btn-primary">
                <i class="mdi mdi-account-edit"></i> New Purchase</a>
        </div>
    </div>

    <div class="card-content">
        <table id="purchases" class="table is-narrow">
            <thead>
            <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Supplier</th>
                <th>Total BDT</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($rawpurchases as $rawpurchase)
                <tr>
                    <td>{{$i++}} </td>
                    <td>{{$rawpurchase->rawmaterials->name}}</td>
                    <td>{{$rawpurchase->suppliers->name}}</td>
                    <td>{{$rawpurchase->price}}</td>
                    <td>{{$rawpurchase->quantity}}</td>
                    <td class="has-text-right">
                        {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}

                        <form id="deleteForm{{$rawpurchase->id}}" action="{{ route('rawpurchases.destroy',$rawpurchase->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            {{--                                    <button class="delete btn btn-danger" >Delete</button>--}}

                        </form>
                        <button class="delete btn btn-danger" onclick="deleteform({{$rawpurchase->id}})">Delete</button>
                        <a class="btn btn-info" href="{{route('rawpurchases.edit', $rawpurchase->id)}}"> Edit</a>
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
