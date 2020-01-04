@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col">
            <h2>All Currencies</h2>
        </div>
        <div class="col text-right">

            <a href="{{route('currencies.create')}}" class="btn btn-primary">
                <i class="mdi mdi-account-edit"></i> New Currency</a>
        </div>
    </div>

    <div class="card-content">
        <table id="currencies" class="table is-narrow">
            <thead>
            <tr>
                <th>No</th>
                <th>Currency Name</th>
                <th>Currency Value</th>
                <th>BDT Value</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($currencies as $currency)
                <tr>

                    <th>{{$currency->id}} </th>
                    <td>{{$currency->name}}</td>
                    <td>1</td>
                    <td>{{$currency->value}}</td>


                    <td class="has-text-right">
                        {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}

                        <form action="{{ route('currencies.destroy',$currency->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                            <a class="btn btn-info" href="{{route('currencies.edit', $currency->id)}}"> Edit</a>
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
        $('#currencies').DataTable();
    </script>
@endsection
