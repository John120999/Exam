<?php

/*You are given a word target and a list of sorted (by length(increasing), 
number of upper-case letters(decreasing), natural order) unique words; words which always contain target, 
your task is to find the index (0 based) of target in words, which would always be in the list. */

// The word we're searching for
$target = "TWO";

// The list of words
$words = ["I", "TWO", "FORTY", "THREE", "JEN", "TWO", "tWo", "Two"];

// An empty list to store positions where we find the target
$found_indices = [];

// Go through each word in the list
for ($i = 0; $i < count($words); $i++) {
    
    if ($words[$i] == $target) {
        
        $found_indices[] = $i;
    }
}

if (count($found_indices) > 0) {
    echo "Target '$target' found at index: ";
    echo implode(", ", $found_indices); // Print all indices
    echo "\n";
} else {
    echo "Target '$target' not found in the list.\n";
}

?>
