<?php

namespace Mlntn\Hearthstone;

class VarInt {

	/**
	 * @param integer[] $numbers
	 *
	 * @return string
	 */
	public function encode(array $numbers)
	{
		$buffer = [];

		foreach ($numbers as $num) {
			if ($num === 0) {
				$buffer[] = chr(0);
			} else {
				$bytes = [];

				while ($num != 0) {
					$b   = $num & 0x7f;
					$num >>= 7;
					if ($num != 0) {
						$b |= 0x80;
					}
					$bytes[] = $b;
				}

				$bytes[count($bytes) - 1] &= 0x7f;

				$buffer[] = call_user_func_array('pack', array_merge([ 'C*' ], $bytes));
			}
		}

		return implode($buffer);
	}

	/**
	 * @param string $string
	 *
	 * @return integer[]
	 */
	public function decode(string $string)
	{
		$shift  = 0;
		$result = 0;
		$return = [];

		foreach (str_split($string) as $c) {
			$i      = ord($c);
			$result |= ($i & 0x7f) << $shift;
			$shift  += 7;

			if ( ! ($i & 0x80)) {
				$return[] = $result;
				$result   = 0;
				$shift    = 0;
			}
		}

		return $return;
	}

}