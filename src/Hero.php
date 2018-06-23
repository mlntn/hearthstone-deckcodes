<?php

namespace Mlntn\Hearthstone;

class Hero {

	/**
	 * @var integer
	 */
	public $id;

	/**
	 * @param integer $id
	 */
	public function __construct($id) {
		$this->id = $id;
	}

}