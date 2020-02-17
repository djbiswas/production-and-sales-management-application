@extends('layouts.admin')

@section('content')
    <div style="margin: 0 15%;">
        <div class="card card-accent-primary mb-3 text-left" style="">
            <div class="card-header">
                <div class="row">
                    <div class="col">Customer Payments</div>
                    <div class="col text-right">
                        <a href="{{route('customers.index')}}" class="btn btn-primary">
                            <i class="mdi mdi-account-edit"></i> Customers List</a>
                    </div>
                </div>
            </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col">
                        <table id="customers" class="table is-narrow">
                            <thead>
                            <tr>
                                <th>Customers Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Buy</th>
                                <th>Pay</th>
                                <th>Due</th>
                            </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->buy}}</td>
                                    <td>{{$customer->pay}}</td>
                                    <td>{{$customer->due}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            {!! Form::open(['route' => 'customer_paid', 'method' => 'post']) !!}
            {{csrf_field()}}

            {{Form::text('customer_id', $customer->id, ['class' => 'form-control', 'placeholder' => '', 'required','hidden']) }}


                <div class="row">
                    <div class="col">
                        <!-- Date Input Form -->
                        <div class="form-group">
                            {{Form::label('date','Date:') }}
                            {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col">
                        <!-- Payment Input Form -->
                        <div class="form-group">
                            {{Form::label('pay','Payment:') }}
                            {{Form::number('pay', null, ['class' => 'form-control', 'placeholder' => 'Pay', 'required']) }}
                        </div>

                    </div>
                </div>

                <div class="text-right">

                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                </div>

            {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

    </script>

@endsection

