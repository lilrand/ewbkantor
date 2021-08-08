<?php


namespace App\Shared\Cast;

use Money\Currencies;
use Money\Currencies\AggregateCurrencies;
use Money\Currencies\CurrencyList;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Money;
use Money\Parser\DecimalMoneyParser;

/**
 * @author Tashya Dwi Askara Siahaan <tasyadwiaskarasiahaan@gmail.com>
 */
class MoneyFactory
{
    public static function create($amount, string $currency = 'IDR'): Money
    {
        $parser = new DecimalMoneyParser(self::getCurrencies());

        return $parser->parse((string) $amount, new Currency($currency));
    }

    public static function format(Money $money): string
    {
        $formatter = new DecimalMoneyFormatter(self::getCurrencies());

        return $formatter->format($money);
    }

    public static function formatted($money): string
    {
        return sprintf('Rp %s', number_format($money, 2));
    }

    private static function getCurrencies(): Currencies
    {
        return new AggregateCurrencies(
            [
                new CurrencyList(['IDR' => 2]),
                new ISOCurrencies(),
            ]
        );
    }
}
