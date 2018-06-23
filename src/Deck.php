<?php

namespace Mlntn\Hearthstone;

class Deck {

	const FORMAT_WILD     = 1;
	const FORMAT_STANDARD = 2;

	/**
	 * @var integer
	 */
	public $format;

	/**
	 * @var Hero[]
	 */
	public $heroes = [];

	/**
	 * @var Card[]
	 */
	public $cards;

	/**
	 * @param integer $format
	 */
	public function __construct($format)
	{
		$this->format = $format;
	}

	/**
	 * @param Hero $hero
	 */
	public function addHero(Hero $hero)
	{
		$this->heroes[] = $hero;
	}

	/**
	 * @param Card $card
	 */
	public function addCard(Card $card)
	{
		$this->cards[] = $card;
	}

}