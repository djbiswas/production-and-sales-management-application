@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col">
            <h2>Manufacturer List</h2>
        </div>
        <div class="col text-right">

            <a href="{{route('materialPurchases.create')}}" class="btn btn-primary">
                <i class="mdi mdi-account-edit"></i> New Manufacturer</a>
        </div>
    </div>

    <div class="card-content">
        <table id="purchases" class="table is-narrow">
            <thead>
            <tr>
                <th>Date</th>
                <th>Tiles Model</th>
                <th>Tiles Class</th>
                <th>Quantity</th>
                <th>Select Sand</th>
                <th>white Sand</th>
                <th>Red Color</th>
                <th>Yellow Color</th>
                <th>Black Color</th>
                <th>Chemical Color</th>
                <th>Cement</th>
                <th>Stone</th>
{{--                <th>Action</th>--}}
            </tr>
            </thead>

            <tbody>
            @foreach ($manufacturers as $manufacturer)
                <tr>
                    <td>{{$manufacturer->date}}</td>
                    <td>{{$manufacturer->product_models->product_model_name}}</td>
                    <td>{{$manufacturer->product_type->product_type_name}}</td>
                    <td>{{$manufacturer->quantity}}</td>
                    <td>{{$manufacturer->select_sand}}</td>
                    <td>{{$manufacturer->white_sand}}</td>
                    <td>{{$manufacturer->red_color}}</td>
                    <td>{{$manufacturer->yellow_color}}</td>
                    <td>{{$manufacturer->black_color}}</td>
                    <td>{{$manufacturer->chemical_color}}</td>
                    <td>{{$manufacturer->cement}}</td>
                    <td>{{$manufacturer->stone}}</td>
                    <td class="has-text-right d-none">
                        {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}

                        <form id="deleteForm{{$manufacturer->id}}" action="{{ route('materialPurchases.destroy',$manufacturer->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            {{--                                    <button class="delete btn btn-danger" >Delete</button>--}}

                        </form>
                        <button class="delete btn btn-danger" onclick="deleteform({{$manufacturer->id}})">Delete</button>
                        <a class="btn btn-info" href="{{route('materialPurchases.edit', $manufacturer->id)}}"> Edit</a>
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
