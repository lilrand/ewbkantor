<?php


namespace App\Shared\Value;

use App\Shared\Serializer\DeserializableInterface;
use App\Shared\Serializer\SerializableInterface;
use MabeEnum\Enum;

/**
 * @author Tashya Dwi Askara Siahaan <tasyadwiaskarasiahaan@gmail.com>
 */
abstract class AbstractEnum extends Enum implements SerializableInterface, DeserializableInterface
{
    public static function deserialize($data)
    {
        return static::get($data);
    }

    public function serialize()
    {
        return $this->getValue();
    }
}
