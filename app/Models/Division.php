<?php

namespace App\Models;

use App\Traits\HasManyUsers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Division extends Model
{
    use HasFactory, HasManyUsers; //HasManyUsers Traits buatan

    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'name',
        'deskripsi'
    ];


}
