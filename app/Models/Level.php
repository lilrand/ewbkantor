<?php

namespace App\Models;

use App\Traits\HasManyUsers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Level extends Model
{
    use HasFactory, HasManyUsers;

    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'description',

    ];

}
