<?php

namespace ChordChangesReader;

class Chord extends Symbol
{
	public $symbol;

	protected function is_valid_symbol(string $symbol) : bool
	{
		return \preg_match('/^\w/', $symbol);
	}
}