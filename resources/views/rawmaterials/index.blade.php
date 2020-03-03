@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col">
            <h2>All Raw Materials</h2>
        </div>
        <div class="col text-right">
            <a href="{{route('rawmaterials.create')}}" class="btn btn-primary">
                <i class="mdi mdi-account-edit"></i> New Raw Materials</a>
        </div>
    </div>

    <div class="card-content">
        <table id="products" class="table is-narrow">
            <thead>
            <tr>
                <th>No</th>
                <th>Raw Material Name</th>
                <th>Quantity</th>
                <th>Units</th>
                <th>Note</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($rawmaterials as $rawmaterial)
                <tr>
                    <th>{{$rawmaterial->id}} </th>
                    <td>{{$rawmaterial->name}}</td>
                    <td>{{$rawmaterial->quantity}}</td>
                    <td>{{$rawmaterial->stockUnits->unit_name}}</td>
                    <td>{{$rawmaterial->note}}</td>

                    <td class="has-text-right">
                        {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}

                        <form action="{{ route('rawmaterials.destroy',$rawmaterial->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                            <a class="btn btn-info" href="{{route('rawmaterials.edit', $rawmaterial->id)}}"> Edit</a>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script>
        $('#products').DataTable();
    </script>
@endsection
