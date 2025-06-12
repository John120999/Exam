<?php

/* “COUNT THE ISLANDS”
Implement an algorithm which analyzes a two-color image and determines how many isolated areas of a single color the image contains.
Islands
An "island" is a set of adjacent pixels of one color (1) which is surrounded by pixels of a different color (0). Pixels are considered adjacent if their coordinates differ by no more than 1 on the X or Y axis.
*/
function displayGrid($grid) {
    foreach ($grid as $row) {
        foreach ($row as $cell) {
            echo $cell == 1 ? "X" : "~";
        }
        echo PHP_EOL;
    }
}

// the main function that counts how many islands are in the grid
function countIslands($grid) {
    $rows = count($grid);       // total rows
    $cols = count($grid[0]);    // total columns
    $visited = array_fill(0, $rows, array_fill(0, $cols, false)); 
    $islands = 0;               

    // All 8 possible directions 
    $directions = [
        [-1, 0], [1, 0], [0, -1], [0, 1],
        [-1, -1], [-1, 1], [1, -1], [1, 1]
    ];

    // A recursive helper function to "flood fill" each island
    function dfs($grid, &$visited, $r, $c, $rows, $cols, $directions) {
        $visited[$r][$c] = true; // mark this cell as visited

        // Check all 8 directions from the current cell
        foreach ($directions as [$dr, $dc]) {
            $nr = $r + $dr; // new row
            $nc = $c + $dc; // new column

            // Make sure we're inside the grid, it's land, and not visited yet
            if (
                $nr >= 0 && $nr < $rows &&
                $nc >= 0 && $nc < $cols &&
                $grid[$nr][$nc] == 1 &&
                !$visited[$nr][$nc]
            ) {
                // Recursively visit the next land cell
                dfs($grid, $visited, $nr, $nc, $rows, $cols, $directions);
            }
        }
    }

    //  grid
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            // If it's land and hasn't been visited yet, it's a new island
            if ($grid[$i][$j] == 1 && !$visited[$i][$j]) {
                $islands++; // found a new island
                dfs($grid, $visited, $i, $j, $rows, $cols, $directions); 
            }
        }
    }

    return $islands; //  number of islands 
}

// The test grid to check
$testGrid = [
    [1, 1, 1, 1],
    [0, 1, 1, 0],
    [0, 1, 0, 1],
    [1, 1, 0, 0],
];

echo "Matrix:\n";
displayGrid($testGrid);

echo "\nNumber of islands: " . countIslands($testGrid);
