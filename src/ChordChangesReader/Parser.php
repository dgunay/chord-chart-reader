<?php

namespace ChordChangesReader;

class Parser 
{
	

	public function __construct()
	{

	}

	public function parse(string $text)
	{
		$lines = explode("\n", $text);

		$measures = array();
		foreach ($lines as $line) {
			$symbols = array_map(
				function($token) {
					return Symbol::create_symbol($token);
				},
				array_filter(
					explode(' ', trim($line))
				)
			);
		}



		// TODO: use a Progression object to track chords and measures.
		$piece = array();
		$measure_number = 1;
		foreach ($measures as $measure) {
			// TODO: meaningful time signatures
			$piece[$measure_number] = array();

			$measure = trim($measure);

			// tokenize the measure as chord symbols
			$chords = explode(' ', $measure);

			foreach ($chords as $chord_symbol) {
				try {
					$chord = Symbol::create_symbol($chord_symbol);
					$piece[$measure_number][] = $chord;
				}
				catch (\UnexpectedValueException $e) {
					// don't add it
				}
			}

			$measure_number++;
		}
	}

	
}