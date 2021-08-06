<?php

namespace App\Models;

use DateTime;
use App\Shared\Cast\MoneyType;
use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @property Money $unitPrice
 * @property Date $applicationDate
 */
class FundApplication extends Model
{
    use HasFactory, BelongsToUser;

    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'application_date',
        'no_fund',
        'about',
        'item_description',
        'unit_price',
        'quantity',
        'total',
        'status'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'unit_price' => MoneyType::class,
        //'total' => MoneyType::class
    ];
}
