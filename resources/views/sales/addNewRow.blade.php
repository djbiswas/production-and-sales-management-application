<tr>
    <td><b class="si_number">1</b></td>
    @if(session()->get('template') == 'Stone')
    <td>
        {{Form::text('track_number[]', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Truck Number', 'required' ]) }}
    </td>
    @endif
    <td>
        {{Form::select('product_model_id[]', $products, null, ['class' => 'select2_op form-control product_model_id', 'placeholder' => 'Pick a Product...', 'required']) }}
        @if ($errors->has('product_model_id'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('product_model_id') }}</strong>
        </span>
        @endif
    </td>
    <td>
        {{Form::number('total_quantity[]', null, ['class' => 'form-control form-control-sm qaty', 'placeholder' => 'Total Quantity', 'required','readonly' ]) }}
    </td>
    <td>
        {{Form::number('price[]', null, ['class' => 'form-control form-control-sm price', 'placeholder' => 'Price', 'step' => '0.01','required' ]) }}
    </td>
    <td>
        {{Form::number('orderQuantity[]', null, ['class' => 'form-control form-control-sm oqty', 'placeholder' => 'Order Qty', 'step' => '0.01','required' ]) }}
    </td>
    <td>
        {{Form::number('totalPrice[]', null, ['class' => 'form-control form-control-sm tprice', 'placeholder' => 'Total Price', 'step' => '0.01','required','readonly' ]) }}
    </td>
    <td style="text-align: right">
        <button type="button" class="btn btn-danger cancelThisItem" id="cancelThisItem"><i class="fas fa-times"></i></button>
    </td>
</tr>
