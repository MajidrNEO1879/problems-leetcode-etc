<?php
//Array / String

/**You are given two integer arrays nums1 and nums2, sorted in non-decreasing order,
 *  and two integers m and n, representing the number of elements in nums1 and nums2 respectively.
Merge nums1 and nums2 into a single array sorted in non-decreasing order.
The final sorted array should not be returned by the function, but instead be stored inside the array nums1. 
To accommodate this, nums1 has a length of m + n, where the first m elements denote the elements that should be merged, 
and the last n elements are set to 0 and should be ignored. nums2 has a length of n. */

function merge(array $nums1, int $m, array $nums2, int $n)
{
    $nums2 = array_splice($nums2, 0, $n);
    $nums1 = array_splice($nums1, 0, $m);
    $nums1 = array_merge($nums1, $nums2);
    sort($nums1);
    return $nums1;
}

//var_dump(merge([1,2,3,0,0,0],3,[2,5,6],3));
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
//99999
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
// var_dump($k);
// var_dump(array_slice($nums, 0, $k));

/**Given an array nums of size n, return the majority element.
The majority element is the element that appears more than ⌊n / 2⌋ times. You may assume that the majority element always exists in the array. */

function majoEl(array $nums)
{
    return 1;
}

// var_dump(majoEl([3,2,3]));

/**Given an integer array nums, rotate the array to the right by k steps, where k is non-negative. */

function rotateArray(&$nums, $k) {
    $n = count($nums);
    $k = $k % $n; 

    if ($k === 0) return; 

   
    $nums = array_merge(array_slice($nums, $n - $k), array_slice($nums, 0, $n - $k));
}

/**You are given an array prices where prices[i] is the price of a given stock on the ith day.
You want to maximize your profit by choosing a single day to buy one stock and choosing a different day in the future to sell that stock.
Return the maximum profit you can achieve from this transaction. If you cannot achieve any profit, return 0.
 */
function maxprofit($nums)
{
    if (empty($prices)) {
        return 0;
    }

    $minPrice = $prices[0];
    $maxProfit = 0;

    foreach ($prices as $price) {

        if ($price < $minPrice) {
            $minPrice = $price;
        }
        $profit = $price - $minPrice;
        if ($profit > $maxProfit) {
            $maxProfit = $profit;
        }
    }

    return $maxProfit;
}
// var_dump(maxprofit([8, 1, 6, 4, 7, 3]));

//Given a string s consisting of words and spaces, return the length of the last word in the string.
// A word is a maximal substring consisting of non-space characters only.

function lengthOfLastWord(string $s)
{
    $value = trim($s);
    $sentence = explode(' ', $value);
    return strlen(end($sentence));
}
// var_dump(lengthOfLastWord('   fly me   to   the moon  '));

/**Write a function to find the longest common prefix string amongst an array of strings.
If there is no common prefix, return an empty string "".
 */

//  function longestCommonPrefix($prefix)
//  {
    
//  }

 /**Given an integer array nums, return an array answer such that answer[i] is equal to the product of all the elements of nums except nums[i].
The product of any prefix or suffix of nums is guaranteed to fit in a 32-bit integer.
You must write an algorithm that runs in O(n) time and without using the division operation. */

function productExceptSelf($nums)
{
    $n = count($nums);
    $answer = array_fill(0, $n, 1);
   
    $leftProduct = 1;
    for ($i = 0; $i < $n; $i++) {
        $answer[$i] = $leftProduct;
        $leftProduct *= $nums[$i];
    }
    $rightProduct = 1;
    for ($i = $n - 1; $i >= 0; $i--) {
        $answer[$i] *= $rightProduct;
        $rightProduct *= $nums[$i];
    }
    return $answer;
}
$array = [1, 2, 3, 4];
// var_dump(productExceptSelf($array));




function wordmetge($word1, $word2)
{
    $p1 = 0;
    $p2 = 0;
    $newWord = '';
    
    while ($p1 < strlen($word1) && $p2 < strlen($word2)) {
        $newWord .= $word1[$p1];
        $newWord .= $word2[$p2];
        $p1++;
        $p2++;
    }

    while ($p1 < strlen($word1)) {
        $newWord .= $word1[$p1];
        $p1++;
    }
// If word2 is longer, append the remaining characters
    while ($p2 < strlen($word2)) {
        $newWord .= $word2[$p2];
        $p2++;
    }

    return $newWord;
}
var_dump(wordmetge('absty', 'pqr'));