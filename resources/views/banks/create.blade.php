@extends('layouts.admin')

@section('content')
    <div style="margin: 0 15%;">
        <div class="card card-accent-primary mb-3 text-left" style="">
            <div class="card-header">
                <div class="row">
                    <div class="col">New Bank</div>
                    <div class="col text-right">

                        <a href="{{route('banks.index')}}" class="btn btn-primary">
                            <i class="mdi mdi-account-edit"></i>Bank List</a>
                    </div>
                </div>
            </div>
            <div class="card-body text-primary">
            {!! Form::open(['route' => 'bankAccounts.store', 'method' => 'post']) !!}
            {{csrf_field()}}

            <!-- Bank Name Input Form -->
                <div class="form-group  ">
                    {{Form::label('name','Bank Name:') }}

                    {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Bank Name', 'required']) }}

                    @error('name')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <!-- Branch Input Form -->
                <div class="form-group  ">
                    {{Form::label('branch','Branch:') }}

                    {{Form::text('branch', null, ['class' => 'form-control', 'placeholder' => 'Branch', 'required']) }}

                    @error('branch')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <hr>
                <div class="text-right">
                    {{ Form::submit('Submit', ['class' => 'btn btn-primary'])}}
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

