<?php
/**Given an array of integers nums, return the number of good pairs.
A pair (i, j) is called good if nums[i] == nums[j] and i < j */

//not using hashtable in O(n^2)
function goodPairs(array $arr)
{
    $count = 0;
    $n = count($arr);
    
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$i] == $arr[$j]) {
                $count++;
            }
        }
    }
    
    return $count;
}

//using hashtable in O(n)
function goodPairsht(array $arr)
{
    $count = 0;
    $frequency = []; 
    
    foreach ($arr as $num) {
        if (isset($frequency[$num])) {
            $count += $frequency[$num];
            $frequency[$num]++;
        } else {
            $frequency[$num] = 1;
        }
    }
    
    return $count;
}

var_dump(goodPairsht([1, 2, 3, 1, 1, 3]));

var_dump(goodPairs([1, 2, 3, 1, 1, 3]));
