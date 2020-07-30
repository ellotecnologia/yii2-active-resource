<?php

namespace Zaioll\ActiveResource;

/**
 * Interface UnserializerInterface
 *
 * @package Zaioll\ActiveResource
 */
interface UnserializerInterface
{
    /**
     * Unserialize data from JSON, XML, CSV, etc.
     * @param string $data
     * @param bool $asArray
     * @return mixed
     */
    public function unserialize($data, $asArray = true);
}
