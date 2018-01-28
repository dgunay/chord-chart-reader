<?php
/**
 * TODO: what kind of syntax do I want?
 * 
 * @author Devin Gunay <devingunay@gmail.com>
 */

include(__DIR__ . '/vendor/autoload.php');

use ChordChangesReader\Parser;

if ($argc <= 1) {
	echo 'Usage: php ' . __FILE__ . ' [file_to_read]' . PHP_EOL;
	exit;
}

$text = file_get_contents($argv[1]);

$parser = new Parser();
$parser->parse($text);