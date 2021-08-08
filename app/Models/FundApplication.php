<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Money\Currency;
use Money\Money;

/**
 * @property Money $unitPrice
 * @property Money $total
 * @property Date $applicationDate
 */
class FundApplication extends Model
{
    use HasFactory, BelongsToUser;

    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'application_date',
        'application_number',
        'about',
        'item_description',
        'unit_price_amount',
        'unit_price_currency',
        'quantity',
        'total_amount',
        'total_currrency',
        'status'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'unit_price_amount' => 'integer',
        'total_amount' => 'integer'
    ];

    protected function getUnitPriceAttribute(): Money
    {
        return new Money($this->unit_price_amount, new Currency ($this->unit_price_currency));
    }

    protected function setUnitPriceAttribute(Money $money): void
    {
        $this->unit_price_amount = $money->getAmount();
        $this->unit_price_currency = $money->getCurrency()->getCode();
    }

    protected function getTotalAttribute(): Money
    {
        return new Money($this->total_amount, new Currency ($this->total_currency));
    }

    protected function setTotalAttribute(Money $money): void
    {
        $this->total_amount = $money->getAmount();
        $this->total_currency = $money->getCurrency()->getCode();
    }
}
