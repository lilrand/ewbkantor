<?php

namespace App\Models;

use App\Traits\HasManyBranches;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, HasManyBranches;

    protected $keyType = 'string'; //memaksa uuid menampilkan string
    protected $fillable = [
        'id',
        'name',
        'address',
        'city',
        'phone',
        'email',
        'fax',
        'website'
    ];

}
