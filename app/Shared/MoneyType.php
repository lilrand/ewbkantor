<?php

namespace App\Shared\Cast;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Money\Currency;
use Money\Money;

class MoneyType implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        if (!isset($attributes[sprintf('%s_amount', $key)])) {
            return null;
        }

        if (null === $attributes[sprintf('%s_amount', $key)] ?? null) {
            return null;
        }

        return new Money(
            $attributes[sprintf('%s_amount', $key)],
            new Currency($attributes[sprintf('%s_currency', $key)])
        );
    }

    public function set($model, string $key, $value, array $attributes)
    {
        if ($value) {
            return [
                sprintf('%s_amount', $key)   => $value->getAmount(),
                sprintf('%s_currency', $key) => $value->getCurrency()->getCode(),
            ];
        }

        return null;
    }
}
