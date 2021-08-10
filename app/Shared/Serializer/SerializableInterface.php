<?php


namespace App\Shared\Serializer;

/**
 * @author Tashya Dwi Askara Siahaan <tasyadwiaskarasiahaan@gmail.com>
 */
interface SerializableInterface
{
    /**
     * Perform serialize object.
     *
     * @return mixed
     */
    public function serialize();
}
