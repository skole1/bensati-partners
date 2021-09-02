<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'payments';
    protected $fillable = [
        'application_id',
        'first_name',
        'other_names',
        'phone',
        'email',
        'case_name',
        'case_amount',
        'payment_option',
    ];
}
