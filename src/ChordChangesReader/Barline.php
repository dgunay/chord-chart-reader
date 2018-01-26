<?php

namespace ChordChangesReader;

class Barline extends Symbol
{
	public $symbol;

	protected function is_valid_symbol(string $symbol) : bool
	{
		return \preg_match('/^[:|]/', $symbol);
	}
}