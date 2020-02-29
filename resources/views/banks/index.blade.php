@extends('layouts.admin')

@section('content')

<div style="margin: 0 15%;">
    <div class="card card-accent-primary mb-3 text-left" style="">
        <div class="card-header">
            <div class="row">
                <div class="col">Bank Accounts</div>

                <div class="col text-right">

                    <a href="{{route('banks.create')}}" class="btn btn-primary">
                        <i class="mdi mdi-account-edit"></i> New Bank</a>
                </div>
            </div>
        </div>
        <div class="card-body text-primary">
            <table id="products" class="table is-narrow">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Bank Name</th>
                    <th>Branch</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($banks as $bank)
                    <tr>

                        <th>{{$bank->id}} </th>
                        <td>{{$bank->name}}</td>
                        <td>{{$bank->branch}}</td>


                        <td class="has-text-right">
                            {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}

                            <form action="{{ route('bankAccounts.destroy',$bank->id) }}" method="POST">

                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                                <a class="btn btn-info" href="{{route('banks.edit', $bank->id)}}"> Edit</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        $('#banks').DataTable();
    </script>
@endsection
