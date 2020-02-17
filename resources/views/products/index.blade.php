@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col">
            <h2>All Products</h2>
        </div>
        <div class="col text-right">

            <a href="{{route('productModels.create')}}" class="btn btn-primary">
                <i class="mdi mdi-account-edit"></i> New Product</a>
        </div>
    </div>

    <div class="card-content">
        <table id="products" class="table is-narrow">
            <thead>
            <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Sell Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($productModels as $productModel)
                <tr>

                    <th>{{$productModel->id}} </th>
                    <td>{{$productModel->product_model_name}}</td>
                    <td>{{$productModel->unitPrice}}</td>
                    <td>{{$productModel->sellPrice}}</td>
                    <td>{{$productModel->quantity}}</td>


                    <td class="has-text-right">
                        {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}

                        <form action="{{ route('productModels.destroy',$productModel->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                            <a class="btn btn-info" href="{{route('productModels.edit', $productModel->id)}}"> Edit</a>
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
