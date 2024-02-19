<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateReservation extends Model
{
    use HasFactory;

    protected $fillable=[
        'f_name',
        'l_name',
        'phone_number',
        'email',
        'send_mail',
        'g_fname',
        'g_lname',
        'address',
        'city',
        'state',
        'country',
        'language',
        'arrival',
        'payment_method',
        'cardholder_name',
        'card_type',
        'date',
        'cvc_code',


    ];

}
