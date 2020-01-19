@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col">
            <h2>Stock Units List</h2>
        </div>
        <div class="col text-right">

            <a href="{{route('stockUnits.create')}}" class="btn btn-primary">
                <i class="mdi mdi-account-edit"></i> New Stock Unit</a>
        </div>
    </div>


    <div class="card-content">
        <table id="purchases" class="table is-narrow">
            <thead>
            <tr>
                <th>No</th>
                <th>Unit Name</th>
                <th>Unit Notes / Description</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($stockUnits as $stockUnit)
                <tr>
                    <th>{{$stockUnit->id}} </th>
                    <td>{{$stockUnit->unit_name}}</td>
                    <td>{{$stockUnit->unit_description}}</td>
                    <td class="has-text-right">
                        {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}

                        <form action="{{ route('stockUnits.destroy',$stockUnit->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                            <a class="btn btn-info" href="{{route('stockUnits.edit', $stockUnit->id)}}"> Edit</a>
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
