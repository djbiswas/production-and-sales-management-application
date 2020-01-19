@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col">
            <h2>Lc List</h2>
        </div>
        <div class="col text-right">

            <a href="{{route('lcs.create')}}" class="btn btn-primary">
                <i class="mdi mdi-account-edit"></i> New Lc</a>
        </div>
    </div>

    <div class="card-content">
        <table id="products" class="table is-narrow">
            <thead>
            <tr>
                <th>No</th>
                <th>Lc Name</th>
                <th>Lc Note</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($lcs as $lc)
                <tr>

                    <th>{{$lc->id}} </th>
                    <td>{{$lc->name}}</td>
                    <td>{{$lc->note}}</td>


                    <td class="has-text-right">
                        {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}

                        <form action="{{ route('productModels.destroy',$lc->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                            <a class="btn btn-info" href="{{route('lcs.edit', $lc->id)}}"> Edit</a>
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
