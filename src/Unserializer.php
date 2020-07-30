<?php

namespace Zaioll\ActiveResource;

use yii\base\Component;
use Zaioll\ActiveResource\UnserializerInterface;

/**
 * Class Unserializer
 *
 * @package Zaioll\ActiveResource
 */
abstract class Unserializer extends Component implements UnserializerInterface
{
    /**
     * @inheritdoc
     */
    public function unserialize($data, $asArray = true)
    {
        return $asArray ? (array) $data : $data;
    }
}
