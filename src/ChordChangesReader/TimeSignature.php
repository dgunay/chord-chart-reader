<?php

namespace ChordChangesReader;

class TimeSignature extends Symbol
{
	public $symbol;

	protected function is_valid_symbol(string $symbol) : bool
	{
		return \preg_match('/^\d/', $symbol);
	}
}