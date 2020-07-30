<?php

namespace Zaioll\ActiveResource;

use yii\base\Component;

/**
 * Class Unserializer
 * 
 * @package Zaioll\ActiveResource
 */
abstract class Unserializer extends Component implements UnserializerInterface {

	/**
	 * @inheritdoc
	 */
	public function unserialize($data, $asArray = true) {

		return $asArray ? (array) $data : $data;
	}
}