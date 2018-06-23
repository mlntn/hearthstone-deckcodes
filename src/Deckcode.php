<?php

namespace Mlntn\Hearthstone;

class Deckcode {

	const DECKCODE_VERSION = 1;

	/**
	 * @param Deck $deck
	 *
	 * @return string
	 */
	public function getCodeFromDeck(Deck $deck)
	{
		$ints = [ 0, self::DECKCODE_VERSION, $deck->format ];

		$ints[] = count($deck->heroes);

		foreach ($deck->heroes as $hero) {
			$ints[] = $hero->id;
		}

		$cards = $this->sortCards($deck->cards);

		foreach ($cards as $count => $list) {
			$ints[] = count($cards[$count]);
			foreach ($list as $card) {
				$ints[] = $card->id;
				if ($count === 'n') {
					$ints[] = $card->count;
				}
			}
		}

		$varint = new VarInt;

		$raw = $varint->encode($ints);

		return base64_encode($raw);
	}

	/**
	 * @param string $code
	 *
	 * @return Deck
	 * @throws InvalidDeckcodeException
	 */
	public function getDeckFromCode($code)
	{
		$decoded = base64_decode($code);

		$varint = new VarInt;
		$data   = $varint->decode($decoded);

		if ($data[0] !== 0) {
			throw new InvalidDeckcodeException;
		}

		$version = $data[1];
		if ($version != self::DECKCODE_VERSION) {
			throw new InvalidDeckcodeException("Unsupported version: {$version}");
		}

		$format = $data[2];
		$deck   = new Deck($format);

		$num_heroes = $data[3];

		$offset = 4;
		for ($i = 0; $i < $num_heroes; $i++) {
			$hero_id = $data[$offset];
			$deck->addHero(new Hero($hero_id));
			$offset++;
		}

		$num_cards_x1 = $data[$offset];
		$offset++;

		for ($i = 0; $i < $num_cards_x1; $i++) {
			$card_id = $data[$offset];
			$deck->addCard(new Card($card_id, 1));
			$offset++;
		}

		$num_cards_x2 = $data[$offset];
		$offset++;

		for ($i = 0; $i < $num_cards_x2; $i++) {
			$card_id = $data[$offset];
			$deck->addCard(new Card($card_id, 2));
			$offset++;
		}

		$num_cards_xn = $data[$offset];
		$offset++;

		for ($i = 0; $i < $num_cards_xn; $i++) {
			$card_id = $data[$offset];
			$count   = $data[$offset + 1];
			$deck->addCard(new Card($card_id, $count));
			$offset += 2;
		}

		return $deck;
	}

	/**
	 * @param Card[] $cards
	 *
	 * @return array
	 */
	protected function sortCards($cards)
	{
		$by_count = [ 1 => [], 2 => [], 'n' => [] ];

		foreach ($cards as $card) {
			$bucket              = $card->count > 2 ? 'n' : $card->count;
			$by_count[$bucket][] = $card;
		}

		return $by_count;
	}

}