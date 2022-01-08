<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborators extends Model
{
    protected $fillable = [
        'name',
        'email',
        'birth',
        'phone',
        'company',
    ];

    public function companies(){
        return $this->HasOne(Companies::class, 'id', 'company');
    }
}
