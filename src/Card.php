<?php

namespace Mlntn\Hearthstone;

class Card {

	/**
	 * @var integer
	 */
	public $id;

	/**
	 * @var integer
	 */
	public $count;

	/**
	 * @param integer $id
	 * @param integer $count
	 */
	public function __construct($id, $count)
	{
		$this->id    = $id;
		$this->count = $count;
	}

}