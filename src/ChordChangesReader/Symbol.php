<?php

namespace ChordChangesReader;

abstract class Symbol
{
	/** @var string */
	public $symbol;
	
	protected function __construct(string $symbol)
	{
		if (!$this->is_valid_symbol($symbol)) {
			throw new \UnexpectedValueException(
				"{$symbol} is not a valid chord symbol"
			);
		}

		$this->symbol = $symbol;
	}

	/**
	 * Factory method to determine and create subclasses of Symbol at runtime.
	 *
	 * @param string $symbol
	 * @return Symbol Object extending Symbol
	 */
	public static function create_symbol(string $symbol)
	{
		// TODO: 
		switch($symbol) { 
			case preg_match('/^\d/', $symbol): // Time signature
				return new TimeSignature($symbol);
				break;
			case preg_match('/^\w/', $symbol): // Chord
				return new Chord($symbol);
				break;
			case strpos($symbol, '|'): // Barline
				return new Barline($symbol);
				break;
			default:
				throw new \UnexpectedValueException(
					"{$symbol} is not a recognized symbol."
				);
		}
	}

	/**
	 * Determines whether or not the passed string is syntactically valid
	 * for this symbol.
	 *
	 * @param string $symbol
	 * @return boolean
	 */
	abstract protected function is_valid_symbol(string $symbol) : boolean;
}