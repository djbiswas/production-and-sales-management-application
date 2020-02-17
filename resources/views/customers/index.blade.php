@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col">
            <h2>All Customers</h2>
        </div>
        <div class="col text-right">

            <a href="{{route('customers.create')}}" class="btn btn-primary">
                <i class="mdi mdi-account-edit"></i> New Customer</a>
        </div>
    </div>

    <div class="card-content">
        <table id="customers" class="table is-narrow">
            <thead>
            <tr>
                <th>No</th>
                <th>Customers Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($customers as $customer)
                <tr>

                    <th>{{$customer->id}} </th>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->address}}</td>


                    <td class="has-text-right">
                        {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}

                        <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                            <a class="btn btn-info" href="{{route('customers.edit', $customer->id)}}"> Edit</a>
                            <a class="btn btn-success" href="{{route('customer_pay', $customer->id)}}"> Payment</a>
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
        $('#customers').DataTable();
    </script>
@endsection
