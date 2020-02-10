@extends('layouts.admin')

@section('content')
    <div style="margin: 0 15%;">
        <div class="card card-accent-primary mb-3 text-left" style="">
            <div class="card-header">Add New LC</div>
            <div class="card-body text-primary">


    {!!  Form::model($lc,['method' =>'PATCH', 'route' => ['lcs.update', $lc->id]])  !!}

    {{csrf_field()}}

    <!-- Date Input Form -->
    <div class="form-group">
        {{Form::label('date','Date:') }}
        {{Form::date('date', null, ['class' => 'form-control']) }}
    </div>

    {{ Form::label('name', 'LC Name')}}
    <div class="input-group mb-3">
        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Lc Name', 'required'  ))}}
    </div>

    <!-- Bank Name Select Field -->
    <div class="form-group  ">
        {{Form::label('bank_id','Bank Name:') }}

        {{Form::select('bank_account_id', $banks, null, ['class' => 'form-control','id' => 'bank_account_id', 'placeholder' => 'Pick a Bank Name...', 'required']) }}
        @if ($errors->has('bank_account_id'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bank_account_id') }}</strong>
                            </span>
        @endif

    </div>

    <!-- Amount Input Form -->
    <div class="form-group">
        {{Form::label('amount','Amount:') }}
        {{Form::number('amount', null, ['class' => 'form-control', 'placeholder' => 'Amount', 'required']) }}
    </div>

    <!-- Price Input Form -->
    <div class="form-group">
        {{Form::label('price','Price:') }}
        {{Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Price', 'required']) }}
    </div>



    {{ Form::label('note', 'LC Description')}}
    <div class="input-group mb-3">
        {{ Form::textarea('note', null, array('class' => 'form-control', 'placeholder' => 'Lc Description'  ))}}
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

