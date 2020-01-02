@extends('layouts.admin')

@section('content')

    {{--    <h2>All Purchases</h2>--}}

    <div class="card-content">
        <table id="suppliers" class="table is-narrow">
            <thead>
            <tr>
                <th>No</th>
                <th>Suppliers Name</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($suppliers as $supplier)
                <tr>

                    <th>{{$supplier->id}} </th>
                    <td>{{$supplier->name}}</td>


                    <td class="has-text-right">
                        {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}

                        <form action="{{ route('suppliers.destroy',$supplier->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                            <a class="btn btn-info" href="{{route('suppliers.edit', $supplier->id)}}"> Edit</a>
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
        $('#suppliers').DataTable();
    </script>
@endsection
