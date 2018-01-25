<?php
/**
 * TODO: what kind of syntax do I want?
 * 
 * 
 */


if ($argc <= 1) {
	echo 'Usage: php ' . __FILE__ . ' [file_to_read]' . PHP_EOL;
	exit;
}

include('Chord.php');

$text = file_get_contents($argv[1]);

// TODO: maybe sanitize newlines
$lines = explode("\n", $text);

$measures = array();
foreach ($lines as $line) {
	$measures = array_merge(
		$measures, 
		array_values(
			array_filter(
				explode('|', $line),
				function($token) {
					return !ctype_space($token);
				}
			)
		)
	);
}

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
			$chord = new Chord($chord_symbol);
			$piece[$measure_number][] = $chord;
		}
		catch (\UnexpectedValueException $e) {
			// don't add it
		}
	}

	$measure_number++;
}

print_r($piece);