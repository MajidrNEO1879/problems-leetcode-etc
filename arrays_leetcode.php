<?php
// You are given an array of integers nums. You are also given an integer original which is the first number that needs to be searched for in nums.
// You then do the following steps:

//     If original is found in nums, multiply it by two (i.e., set original = 2 * original).
//     Otherwise, stop the process.
//     Repeat this process with the new number as long as you keep finding the number.

// Return the final value of original.
function values($nums, $original) {
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
    
    foreach($array as $index => $number)
    {
        $tempArray = $array;
        unset($tempArray[$index]);
        $arrayproduct[] = array_values($tempArray);
        
    }
   foreach($arrayproduct as $product)
   {
    $result []=array_product($product);
   }
   return $result;
}
//print_r(arrayProduct1([-1,1,0,-3,3]));

//o(n) run time:
function arrayProduct2(array $nums) {
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

$nums = [1,2,3,4];
//print_r(arrayProduct2($nums));



/**You are given an integer array nums. In one operation, you can add or subtract 1 from any element of nums.
Return the minimum number of operations to make all elements of nums divisible by 3 */

function minOperations($nums) {
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

function containsDuplicatehashSet(array $nums) {
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
function containsDuplicateBruteforce(array $nums) {
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
function smallerNumbersThanCurrent($nums) {
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


function smallerNumbersThanCurrent1($nums) {
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
    foreach($nums as $item){
        echo $item;
    }
}
frequency([1,2,3,4,5]);