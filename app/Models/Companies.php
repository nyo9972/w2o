<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = [
        'corporate_name',
        'cnpj',
        'birth',
        'phone',
        'email',
        'cep',
        'rua',
        'number',
        'district',
        'city',
        'estate',
    ];
}
