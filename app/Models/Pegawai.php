<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'phone',
        'birthdate',
        'address',
        'position',
        'salary',
        'hire_date',
        'employment_status',
        'photo',
    ];

    protected $dates = [
        'birthdate',
        'hire_date',
    ];

}
