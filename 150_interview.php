<?php

/**You are given two integer arrays nums1 and nums2, sorted in non-decreasing order,
 *  and two integers m and n, representing the number of elements in nums1 and nums2 respectively.
Merge nums1 and nums2 into a single array sorted in non-decreasing order.
The final sorted array should not be returned by the function, but instead be stored inside the array nums1. 
To accommodate this, nums1 has a length of m + n, where the first m elements denote the elements that should be merged, 
and the last n elements are set to 0 and should be ignored. nums2 has a length of n. */

function merge(array $nums1, int $m, array $nums2, int $n)
{
    $newNum1 = [];
    for ($i = 0; $i < $m; $i++) {
        $newNum1[] = $nums1[$i];
    }
    for ($j = 0; $j < $n; $j++) {
        $newNum1[] = $nums2[$j];
    }
    sort($newNum1);
    return $newNum1;
}

// var_dump(merge([1,2,3,0,0,0],3,[2,5,6],3));
// var_dump(merge([0],0,[1],1));

//given an integer array nums and an integer val, remove all occurrences of val in nums in-place. The order of the elements may be
// changed. Then return the number of elements in nums which are not equal to val.


function removeEL(array $nums, int $value)
{

    foreach ($nums as $key => $num) {
        if ($num == $value) {
            unset($nums[$key]);
        }
    }
    //or
    // return array_values(array_filter($nums, function($num) use ($value) {
    //     return $num != $value;
    // }));
    array_values($nums);
    return count($nums);
}
// var_dump(removeEL([0,1,2,2,3,0,4,2],2));

/**Given an integer array nums sorted in non-decreasing order, remove the duplicates in-place such that each unique element 
 * appears only once. The relative order of the elements should be kept the same. Then return the number of unique elements in nums. */

function removeDup(array $nums)
{

    $uniqueIndex = 0;

    for ($i = 1; $i < count($nums); $i++) {
        if ($nums[$i] !== $nums[$uniqueIndex]) {
            $uniqueIndex++;
            $nums[$uniqueIndex] = $nums[$i];
        }
    }
    return $uniqueIndex + 1;
}

// var_dump(removeDup([0, 0, 1, 1, 1, 2, 2, 3, 3, 4]));

/**Given an integer array nums sorted in non-decreasing order, remove some duplicates in-place such that each unique element appears at most twice.
 *  The relative order of the elements should be kept the same. Return k after placing the final result in the first k slots of nums.
 Do not allocate extra space for another array. You must do this by modifying the input array in-place with O(1) extra memory.*/

function remDuplicate2(array &$nums)
{
    $n = count($nums);
    if ($n <= 2) {
        return $n;
    }
    $index = 2;
    for ($i = 2; $i < $n; $i++) {
        if ($nums[$i] !== $nums[$index - 2]) {
            $nums[$index] = $nums[$i];
            $index++;
        }
    }

    return $index;
}
$nums = [1, 1, 1, 2, 2, 3];
$k = remDuplicate2($nums);
var_dump($k);
var_dump(array_slice($nums, 0, $k));