<?php
class Chord 
{
	public $symbol;

	public function __construct(string $symbol)
	{
		if (!$this->is_valid_symbol($symbol)) {
			throw new \UnexpectedValueException(
				"{$symbol} is not a valid chord symbol"
			);
		}

		$this->symbol = $symbol;
	}

	private function is_valid_symbol(string $symbol)
	{
		// TODO: what makes a valid chord symbol?

		// Begins with a \w

		return true;
	}
}