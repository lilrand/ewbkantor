<?php


namespace App\Shared\Serializer;

/**
 * @author Tashya Dwi Askara Siahaan <tasyadwiaskarasiahaan@gmail.com>
 */
interface DeserializableInterface
{
    /**
     * Perform deserialize raw data to object.
     *
     * @param mixed $data
     *
     * @return mixed
     */
    public static function deserialize($data);
}
