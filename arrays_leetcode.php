<?php
// You are given an array of integers nums. You are also given an integer original which is the first number that needs to be searched for in nums.
// You then do the following steps:

//     If original is found in nums, multiply it by two (i.e., set original = 2 * original).
//     Otherwise, stop the process.
//     Repeat this process with the new number as long as you keep finding the number.

// Return the final value of original.
function values($nums, $original)
{
    $numSet = array_flip($nums);

    while (isset($numSet[$original])) {
        $original *= 2;
    }

    return $original;
}

$nums = [5, 3, 6, 1, 12];
$original = 3;
$result = values($nums, $original);
//echo "Final value: " . $result;


/**Given an integer array nums, return an array answer such that answer[i] is equal to the product of all the elements of nums except nums[i].
The product of any prefix or suffix of nums is guaranteed to fit in a 32-bit integer.
You must write an algorithm that runs in O(n) time and without using the division operation. */

//this is running in o(n^2)
function arrayProduct1(array $array)
{
    $arrayproduct = [];
    $result = [];

    foreach ($array as $index => $number) {
        $tempArray = $array;
        unset($tempArray[$index]);
        $arrayproduct[] = array_values($tempArray);

    }
    foreach ($arrayproduct as $product) {
        $result[] = array_product($product);
    }
    return $result;
}
//print_r(arrayProduct1([-1,1,0,-3,3]));

//o(n) run time:
function arrayProduct2(array $nums)
{
    $n = count($nums);
    $answer = array_fill(0, $n, 1);
    // Calculate prefix products
    $prefix = 1;
    for ($i = 0; $i < $n; $i++) {
        $answer[$i] *= $prefix;
        $prefix *= $nums[$i];
    }
    // Calculate suffix products and combine with prefix products
    $suffix = 1;
    for ($i = $n - 1; $i >= 0; $i--) {
        $answer[$i] *= $suffix;
        $suffix *= $nums[$i];
    }

    return $answer;
}

$nums = [1, 2, 3, 4];
//print_r(arrayProduct2($nums));



/**You are given an integer array nums. In one operation, you can add or subtract 1 from any element of nums.
Return the minimum number of operations to make all elements of nums divisible by 3 */

function minOperations($nums)
{
    $totalOperations = 0;
    foreach ($nums as $num) {
        $remainder = $num % 3;
        if ($remainder == 1 || $remainder == 2) {
            $totalOperations += min($remainder, 3 - $remainder);
        }
    }
    return $totalOperations;
}
//print_r(minOperations([2,5,8,11]));

// Given an integer array nums, return true if any value appears more than once in the array, otherwise return false.

function containsDuplicatehashSet(array $nums)
{
    $hashset = [];
    foreach ($nums as $num) {
        if (isset($hashset[$num])) {
            return true;
        }
        $hashset[$num] = true;
    }
    return false;
}
//var_dump(containsDuplicatehashSet([1,2,3,4,1]));
function containsDuplicateBruteforce(array $nums)
{
    $n = count($nums);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($nums[$i] == $nums[$j]) {
                return true;
            }
        }
    }
    return false;
}

//var_dump(containsDuplicateBruteforce([1,2,3,4,1])); 


// Given an array of integers nums, return the length of the longest consecutive sequence of elements.
// A consecutive sequence is a sequence of elements in which each element is exactly 1 greater than the previous element.
// You must write an algorithm that runs in O(n) time.

// function usingSort($array)
// {
//     sort($array);
//     $longSeq = 0;
//     foreach($array as $num)
//     {
//         if (in_array($num+1,$array))
//         {   
//             $longSeq +=1;
//         }
//         if(in_array($num));
//     }
//     return $longSeq;
// }   

//print_r(usingSort([100,200,1,2,3,4]));



// Given the array nums, for each nums[i] find out how many numbers in the array are smaller than it. 
//That is, for each nums[i] you have to count the number of valid j's such that j != i and nums[j] < nums[i].
// Return the answer in an array.
function smallerNumbersThanCurrent($nums)
{
    $count = count($nums);
    $result = array_fill(0, $count, 0);

    for ($i = 0; $i < $count; $i++) {
        for ($j = 0; $j < $count; $j++) {
            if ($i != $j && $nums[$j] < $nums[$i]) {
                $result[$i]++;
            }
        }
    }

    return $result;
}
$nums = [8, 1, 2, 2, 3];
$output = smallerNumbersThanCurrent($nums);
//print_r($output);


function smallerNumbersThanCurrent1($nums)
{
    $count = count($nums);
    $max = max($nums);

    $frequency = array_fill(0, $max + 1, 0);
    foreach ($nums as $num) {
        $frequency[$num]++;
    }

    for ($i = 1; $i <= $max; $i++) {
        $frequency[$i] += $frequency[$i - 1];
    }

    $result = [];
    foreach ($nums as $num) {
        if ($num == 0) {
            $result[] = 0;
        } else {
            $result[] = $frequency[$num - 1];
        }
    }

    return $result;
}
$nums = [8, 1, 2, 2, 3];
$output = smallerNumbersThanCurrent1($nums);
//print_r($output);



// Given an integer array nums and an integer k, return the k most frequent elements within the array.
// The test cases are generated such that the answer is always unique.
// You may return the output in any order.

$nums = [];
$frequency;

// function kElements($nums, $k)
// {

// }
function frequency($nums)
{
    foreach ($nums as $item) {
        echo $item;
    }
}
//frequency([1,2,3,4,5]);


//string with unique characters::

// function stringUnique($string)
// {
//     $cleanedString = strtolower(preg_replace('/[^a-z]/', '', $string));
//     $chars = str_split($cleanedString);
//     $charCounts = array_occurences($chars);
//     //$charCounts = array_count_values($chars);
//     print_r($charCounts);
//     foreach ($charCounts as $freq) {
//         if ($freq > 1) {
//             echo 'there is a character repetition';
//             return;
//         }
//     }
//     echo 'There is no character repetition';
//     return true;
// }
// $string = 'str';
//$result = stringUnique($string);
//var_dump($result);

// $list = ['apple', 'banana', 'apple', 'orange', 'banana', 'apple', 'kiwi'];
// function array_occurences($list)
// {
//     $occurrences = [];
//     foreach ($list as $item) {
//         if (array_key_exists($item, $occurrences)) {
//             $occurrences[$item]++;
//         } else {
//             $occurrences[$item] = 1;
//         }
//     }
//     echo "Number of occurrences:\n";
//     foreach ($occurrences as $item => $count) {
//         echo "$item: $count\n";
//     }
// }



$items = [1, 2, 2, 3, 4, 5, 2];
//print_r(array_count_values($items));


//given two string , write a mthod to find if one is permutation of the other.

function permutationNum($str1, $str2)
{
    $string1 = str_replace(' ', '', $str1);
    $string2 = str_replace(' ', '', $str2);
    $sortedString1 = str_split($string1);
    $sortedString2 = str_split($string2);
    sort($sortedString1);
    sort($sortedString2);
    return implode('', $sortedString1) === implode('', $sortedString2);
}

$result = permutationNum('hello', 'holle ');
//var_dump($result);

// Given five positive integers, find the minimum and maximum values that can be calculated by summing exactly four of the five integers.
//Then print the respective minimum and maximum values as a single line of two space-separated long integers. 


function minAndmax(array $arr)
{
    $min=0;
    $max=0;
    sort($arr);
    print_r($arr);
    for($i=0;$i<count($arr)-1;$i++)
    {
        $min +=$arr[$i];
    }
    $x = array_reverse($arr);
    print_r($x);
    for($i=0;$i<count($x)-1;$i++)
    {
        $max += $x[$i];
    }
    print_r($min);
    print_r($max);
    // sort($arr); 
    // $min = array_sum(array_slice($arr, 0, 4));
    // $max = array_sum(array_slice($arr, 1, 5));
    // echo $min . ' ' . $max;
}
// minAndmax([1 ,2 ,3 ,4 ,5]);

// You are in charge of the cake for a child's birthday. You have decided the cake will have one candle for each year of their total age. 
// They will only be able to blow out the tallest of the candles. Count how many candles are tallest. 

function birthday($arr)
{   
    $maxValue = max($arr);
    $maxnumrep = 0;
    foreach ($arr as $value) {
        if ($value == $maxValue) {
            $maxnumrep++;
        }
    }
    return $maxnumrep;
}
//print_r(birthday([4,4,0,1,3]));


function permute($str, $i, $n, &$results) {  
    if ($i == $n) {
        $results[] = $str;  
    } else {
        for ($j = $i; $j < $n; $j++) {
            swap($str, $i, $j);
            permute($str, $i + 1, $n, $results);  
            swap($str, $i, $j); 
        }
    }
}

function swap(&$str, $i, $j) {
    $temp = $str[$i];
    $str[$i] = $str[$j];
    $str[$j] = $temp;
}

function findPalindromes($results) {
    foreach($results as $item) {   
        if ($item == strrev($item)) {
            echo "Palindrome: $item\n";
        }
    }
}

// $str = "ract coa";
// $results = []; 
// permute($str, 0, strlen($str), $results);  // Generate permutations

// // Output all permutations
// echo "All permutations:\n";
// print_r($results);

// // Check and print palindromes
// findPalindromes($results);


//string compression => abbccdff = 1a2b2c2f

function stringComp(string $string)
{
    $charNum = []; 
    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];
        
        if (isset($charNum[$char])) {
            $charNum[$char]++;
        } else {
            $charNum[$char] = 1;
        }
    }

    return array_keys($charNum) . array_values($charNum);
}

//var_dump(stringComp('abss'));


//Given an array of integers nums which is sorted in ascending order, and an integer target, write a function to search target in nums. 
//If target exists, then return its index. Otherwise, return -1.
//You must write an algorithm with O(log n) runtime complexity.

function bianarySearch($array,$target)
{
    for($i=0;$i<count($array);$i++)
    {
        if($array[$i]==$target)
        {
            return $i;
        }
    }
    return -1;
}
//var_dump(bianarySearch([-1,0,3,5,9,12],2));

function fib($n)
{
    
    if($n<=0){
        return 0;
    }
    elseif($n==1)
    {
        return 1;
    }
    return fib($n-1)+fib($n-2);
}

//var_dump(fib(7));

//maxim
function maximum($arr)
{
    $max=0;
    for($i=0;$i<count($arr);$i++)
    {
        if($arr[$i]<$arr[$i+1])
        {
            $max = $arr[$i+1];
        }
    }
    return $max;
}
//var_dump(max([1,2,4,8,0]));


/**Given a non-empty array of integers nums, every element appears twice except for one. Find that single one.

You must implement a solution with a linear runtime complexity and use only constant extra space. */

function singleItem($nums) {
    $result = 0;
    foreach ($nums as $num) {
        $result ^= $num;
    }
    return $result;
}
//var_dump(singleItem([4,2,1,2,1]));


//Given an array of positive integers arr, find a pattern of length m that is repeated k or more times.
//A pattern is a subarray (consecutive sub-sequence) that consists of one or more values, repeated multiple times consecutively without overlapping.
//A pattern is defined by its length and the number of repetitions.
//Return true if there exists a pattern of length m that is repeated k or more times, otherwise return false.

/**You are given a large integer represented as an integer array digits, where each digits[i] is the ith digit of the integer.
 *  The digits are ordered from most significant to least significant in left-to-right order. 
 * The large integer does not contain any leading 0's.
Increment the large integer by one and return the resulting array of digits.
 */
function largeInt(array $array):array
{
    $arrayLenght=count($array);
    $x = $array[$arrayLenght-1]+1;
    $array[$arrayLenght-1] = $x;
    return $array;

}
//var_dump(largeInt([4,5,6]));


function summaryRange($nums): array {
    $startSequences = [];
    $endSequences = [];
    $fullArray = [];
    foreach($nums as $num) {
        if (!in_array($num - 1, $nums)) {
            $startSequences[] = $num;
        }
        if (!in_array($num + 1, $nums)) {
            $endSequences[] = $num;
        }
    }

    for ($i = 0; $i < count($startSequences); $i++) {
        if ($startSequences[$i] == $endSequences[$i]) {
            $fullArray[] = (string)$startSequences[$i];
        } else {
            $fullArray[] = $startSequences[$i] . '->' . $endSequences[$i];
        }
    }

    return $fullArray;
}
//var_dump(summaryRange([2, 3, 4, 6, 8, 9]));

/**Given a 2D integer array nums where nums[i] is a non-empty array of distinct positive integers,
 *  return the list of integers that are present in each array of nums sorted in ascending order.  */

 function distinctArray(array $arr): array {
    $arrLength = count($arr);
    $commonElements = $arr[0];
    for ($i = 1; $i < $arrLength; $i++) {
        $commonElements = array_intersect($commonElements, $arr[$i]);
    }
    sort($commonElements);
    return $commonElements;
}
//var_dump(distinctArray([[3, 1, 2, 4, 5], [1, 2, 3, 4], [3, 4, 5, 6]]));


//Given an array of integers arr[] of size N and an integer d, the task is to rotate the array elements to the left by d positions.

function arrayRotation($arr, $d)
{
    $n = count($arr);
    $rotatedArray = [];

    $d = $d % $n;
    for ($i = 0; $i < $n; $i++) {
        $newIndex = ($i + $n - $d) % $n;
        $rotatedArray[$newIndex] = $arr[$i];
    }
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = $rotatedArray[$i];
    }
    return $arr;
}
//var_dump(arrayRotation([1, 2, 3, 4, 5, 6, 7],2));

//Given an array (or string), the task is to reverse the array/string. 
function reverseArray(&$arr, $start, $end) 
{ 
    while ($start < $end) 
    { 
        $temp = $arr[$start]; 
        $arr[$start] = $arr[$end]; 
        $arr[$end] = $temp; 
        $start++; 
        $end--; 
    } 
}     
$arr = array(1, 2, 3, 4, 5, 6); 
//var_dump(reverseArray($arr, 0, 5));



// Given a 1-indexed array of integers numbers that is already sorted in non-decreasing order, 
//find two numbers such that they add up to a specific target number. Let these two numbers
//  be numbers[index1] and numbers[index2] where 1 <= index1 < index2 <= numbers.length.
// Return the indices of the two numbers, index1 and index2, added by one as an integer array [index1, index2] of length 2.

function addSum($arr,$target)
{
    $left=0;
    $right=count($arr)-1;
    while($left <= $right)
    {
        if($arr[$left] + $arr[$right] == $target)
        {
            return [$left+1 ,$right+1];
        }
        elseif($arr[$left]+$arr[$right]>$target)
        {
            $right -=1;
        }
        else{
            $left +=1;
        }
    }
    return false;
}
//var_dump(addSum([2,3,7,11,15,18],18));

/**Given an integer array nums, return all the triplets [nums[i], nums[j], nums[k]] such that i != j, i != k, and j != k, and nums[i] + nums[j] + nums[k] == 0.
Notice that the solution set must not contain duplicate triplets. */
function threeSum($nums) {
    $result = [];
    sort($nums); 
    for ($i = 0; $i < count($nums) - 2; $i++) {
        if ($i > 0 && $nums[$i] == $nums[$i - 1]) continue;

        $left = $i + 1;
        $right = count($nums) - 1;

        while ($left < $right) {
            $sum = $nums[$i] + $nums[$left] + $nums[$right];

            if ($sum == 0) {
                $result[] = [$nums[$i], $nums[$left], $nums[$right]];
                while ($left < $right && $nums[$left] == $nums[$left + 1]) $left++;
                while ($left < $right && $nums[$right] == $nums[$right - 1]) $right--;

                $left++;
                $right--;
            } elseif ($sum < 0) {
                $left++; 
            } else {
                $right--; 
            }
        }
    }

    return $result;
}

var_dump(threeSum([-1, 0, 1, 2, -1, -4]));


//Given an integer array nums, move all 0's to the end of it while maintaining the relative order of the non-zero elements.
function zeroList($arr)
{
    $slow = 0;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] != 0) {
            $arr[$slow] = $arr[$i];
            $slow += 1;
        }
    }
    
    while ($slow < count($arr)) {
        $arr[$slow] = 0;
        $slow += 1;
    }
    return $arr;
}
//var_dump(zeroList([5,8,9,0,4,0,1,0]));