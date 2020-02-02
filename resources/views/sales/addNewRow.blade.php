<tr>
    <td><b class="si_number">1</b></td>
    <td>
        {{Form::select('pid[]', $products, null, ['class' => 'select2_op form-control pid', 'placeholder' => 'Pick a Product...', 'required']) }}
        @if ($errors->has('customer_id'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('customer_id') }}</strong>
        </span>
        @endif
    </td>
    <td>
        {{Form::number('total_quantity[]', null, ['class' => 'form-control form-control-sm qaty', 'placeholder' => 'Total Quantity', 'step' => '0.01','required','readonly' ]) }}
    </td>
    <td>
        {{Form::number('price[]', null, ['class' => 'form-control form-control-sm price', 'placeholder' => 'Price', 'step' => '0.01','required' ]) }}
    </td>
    <td>
        {{Form::number('orderQuantity[]', null, ['class' => 'form-control form-control-sm oqty', 'placeholder' => 'Price', 'step' => '0.01','required' ]) }}
    </td>
    <td>
        {{Form::number('totalPrice[]', null, ['class' => 'form-control form-control-sm tprice', 'placeholder' => 'Total Price', 'step' => '0.01','required','readonly' ]) }}
    </td>
    <td style="text-align: right">
        <button type="button" class="btn btn-danger cancelThisItem" id="cancelThisItem"><i class="fas fa-times"></i></button>
    </td>
</tr>
