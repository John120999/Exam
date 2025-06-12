<?php

/*“SHORTEST WORD”
You have given a string of words, return the length of the shortest word(s)
String will never be empty, and you do not need to account for different data types.*/


function shortestWordLength($sentence) {
    $words = explode(" ", $sentence);
    $shortest = PHP_INT_MAX;

    foreach ($words as $word) {
        $length = strlen($word);
        if ($length < $shortest) {
            $shortest = $length;
        }
    }

    return $shortest;
}

// Check if user provided an input
if (isset($argv[1])) {
    $input = $argv[1];
    echo shortestWordLength($input) . "\n";
} else {
    echo "Please provide a sentence as input.\n";
}

