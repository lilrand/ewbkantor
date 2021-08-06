<?php

namespace App\Models;

use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends Model
{
    use HasFactory, BelongsToCompany;

    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'name',
        'description',
        'company_id'
    ];

}
