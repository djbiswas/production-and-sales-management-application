<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lc extends Model
{
    public function banksAccount(){
        return $this->belongsTo(BankAccount::class, 'bank_account_id', 'id') ;
    }
}
