<?php

/**You are given two strings word1 and word2. Merge the strings by adding letters in alternating order, starting with word1. 
 * If a string is longer than the other, append the additional letters onto the end of the merged string.
Return the merged string. */

function mergeAlternately($word1, $word2)
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
    // If word1 is longer, append the remaining characters
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

/**For two strings s and t, we say "t divides s" if and only if s = t + t + t + ... + t + t (i.e., t is concatenated with itself one or more times).
Given two strings str1 and str2, return the largest string x such that x divides both str1 and str2. */
function gcdOfStrings($str1, $str2)
{
    if ($str1 . $str2 != $str2 . $str1) {
        return false;
    }
    $gcdLength = gcd(strlen($str1), strlen($str2));
    echo $gcdLength;
    return substr($str1, 0, $gcdLength);
}
function gcd($a, $b)
{
    if ($b == 0) {
        return $a;
    }
    return gcd($b, $a % $b);
}

// var_dump(gcdOfStrings('ABCABCABC', 'ABC'));

/**There are n kids with candies. You are given an integer array candies, where each candies[i]
 *  represents the number of candies the ith kid has, and an integer extraCandies, denoting the number of extra candies that you have.
Return a boolean array result of length n, where result[i] is true if, after giving the ith kid all the extraCandies, they will have the greatest number of candies among
 all the kids, or false otherwise.
Note that multiple kids can have the greatest number of candies. */

function kidCandy($candies, $extraCandy)
{
    $candyBool = [];
    for ($i = 0; $i < count($candies); $i++) {
        for ($j = 0; $j < count($candies); $j++) {
            if ($candies[$i] + $extraCandy > $candies[$j]) {
                $candyBool[] = true;
            } else {
                $candyBool[] = false;
            }
        }
    }
    return $candyBool;
}
// var_dump(kidCandy([2,3,5,1,3],3));

/**You have a long flowerbed in which some of the plots are planted, and some are not. However, flowers cannot be planted in adjacent plots.
Given an integer array flowerbed containing 0's and 1's, where 0 means empty and 1 means not empty, and an integer n, return true if n new 
flowers can be planted in the flowerbed without violating the no-adjacent-flowers rule and false otherwise. */

function canPlaceFlowers($flowerbed, $n)
{
    if (count($flowerbed) < 5) {
        return false;
    }

}

//var_dump(canPlaceFlowers([1,0,0,0,1], 1));
/**Given a string s, reverse only all the vowels in the string and return it.
The vowels are 'a', 'e', 'i', 'o', and 'u', and they can appear in both lower and upper cases, more than once. */

function vowels($s)
{
    $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
    $p1 = 0;
    $p2 = strlen($s) - 1;
    $s = str_split($s);
    while ($p1 < $p2) {
        if (in_array($s[$p1], $vowels) && in_array($s[$p2], $vowels)) {
            $temp = $s[$p1];
            $s[$p1] = $s[$p2];
            $s[$p2] = $temp;
            $p1++;
            $p2--;
        } elseif (!in_array($s[$p1], $vowels)) {
            $p1++;
        } elseif (!in_array($s[$p2], $vowels)) {
            $p2--;
        }
    }
    return implode('', $s);
}
$s = 'hello world!';
// var_dump(vowels($s));

//Given an input string s, reverse the order of the words.

function reverseWord($s)
{
    $sentence = preg_replace('/\s+/S', " ", $s);
    $sentence = explode(' ', $sentence);
    $x = array_reverse($sentence);
    $y = '';
    foreach ($x as $item) {
        $y .= $item . ' ';
    }
    return trim($y);
}

//var_dump(reverseWord('a good   example'));

/**Given an integer array nums, return true if there exists a triple of indices (i, j, k) 
 * such that i < j < k and nums[i] < nums[j] < nums[k]. If no such indices exists, return false. */

//better to use sliding window?
function incearingTriples($nums)
{
    $n = count($nums);

    if ($n < 3) {
        return false;
    }

    // Traverse through the array, maintaining the minimum element so far
    $min = PHP_INT_MAX;
    $mid = PHP_INT_MAX;

    foreach ($nums as $num) {
        if ($num <= $min) {
            // Update min if current number is smaller than min
            $min = $num;
            echo 'mean is' . $min . PHP_EOL;
        } elseif ($num <= $mid) {
            // Update mid if current number is between min and mid
            $mid = $num;
            echo 'mid is' . $mid;
        } else {
            // If we find a number greater than both min and mid, return true
            return true;
        }
    }
}
//using sliding window is actually more efficient:
function increasingTriplet($nums)
{
    $n = count($nums);

    if ($n < 3) {
        return false;
    }

    // Initialize left window to track the smallest value so far
    $leftMin = array_fill(0, $n, 0);
    $leftMin[0] = $nums[0];

    // Initialize right window to track the largest value so far
    $rightMax = array_fill(0, $n, 0);
    $rightMax[$n - 1] = $nums[$n - 1];

    // Fill leftMin array where leftMin[i] is the smallest value from nums[0] to nums[i]
    for ($i = 1; $i < $n; $i++) {
        $leftMin[$i] = min($leftMin[$i - 1], $nums[$i]);
    }

    // Fill rightMax array where rightMax[i] is the largest value from nums[i] to nums[n-1]
    for ($i = $n - 2; $i >= 0; $i--) {
        $rightMax[$i] = max($rightMax[$i + 1], $nums[$i]);
    }

    // Check if there exists a j such that leftMin[i] < nums[j] < rightMax[j]
    for ($j = 1; $j < $n - 1; $j++) {
        if ($leftMin[$j - 1] < $nums[$j] && $nums[$j] < $rightMax[$j + 1]) {
            return true;
        }
    }

    return false;
}

// Example usage:
$nums = [1, 2, 3, 4, 5];
// var_dump(increasingTriplet($nums)); // Output: true

// $nums = [5, 4, 3, 2, 1];
// var_dump(increasingTriplet($nums)); // Output: false

//  var_dump(incearingTriples([1,2,3,4,5]));



//two pointers

/**Given an integer array nums, move all 0's to the end of it while maintaining the relative order of the non-zero elements.
Note that you must do this in-place without making a copy of the array. */

function moveZeros(&$nums)
{
    for ($i = 0; $i < count($nums); $i++) {
        if ($nums[$i] === 0) {
            unset($nums[$i]);
            array_push($nums, 0);
        }
    }
    return array_values($nums);
    /** $n = count($nums);
    $nonZeroIdx = 0; // This pointer keeps track of where the next non-zero element should go

    // Move all non-zero elements to the front
    for ($i = 0; $i < $n; $i++) {
        if ($nums[$i] != 0) {
            $nums[$nonZeroIdx] = $nums[$i];
            $nonZeroIdx++;
        }
    }

    // Fill the remaining part of the array with zeros
    for ($i = $nonZeroIdx; $i < $n; $i++) {
        $nums[$i] = 0;
    } */
}
$a = [0, 1, 0, 3, 12];
// var_dump(moveZeros($a));

//Given two strings s and t, return true if s is a subsequence of t, or false otherwise.

function isSubsequence($s, $t)
{
    $p1 = 0;
    $p2 = 0;
    while ($p1 < strlen($s) && $p2 < strlen($t)) {
        if ($t[$p2] == $s[$p1]) {
            $p1++;
        }
        $p2++;
    }
    return $p1 == strlen($s);
}
$s = "abc";
$t = "ahbgdc";
//var_dump(isSubsequence($s, $t));

/**You are given an integer array height of length n. There are n vertical lines drawn such that the two endpoints of the ith line are (i, 0) and (i, height[i]).
Find two lines that together with the x-axis form a container, such that the container contains the most water.
Return the maximum amount of water a container can store. */


function maxWater($height)
{
    // $p1 = 0;
// $p2 = count($height)-1;
// $areas = [];
// while($p1<$p2)
// {
//     $h = min($height[$p1], $height[$p2]);
//     $l = abs($height[$p2]-$height[$p1]);
//     $areas[]= $h * $l;
//     $p1 ++;
//     $p2 --;
// }
// return $areas;
    $result = 0;
    $p1 = 0;
    $p2 = count($height) - 1;
    while ($p1 < $p2) {
        $area = ($p2 - $p1) * min($height[$p1], $height[$p2]);
        $result = max($result, $area);
        if ($height[$p1] < $height[$p2]) {
            $p1++;
        } elseif ($height[$p1] > $height[$p2]) {
            $p2--;
        } else {
            $p1++;
        }
    }
    return $result;

}
// var_dump(maxWater([1, 8, 6, 2, 5, 4, 8, 3, 7]));


/***You are given an integer array nums and an integer k.
In one operation, you can pick two numbers from the array whose sum equals k and remove them from the array.
Return the maximum number of operations you can perform on the array. */

function maxOp(&$nums, $k)
{
    $pairs = 0;
    for($i=0;$i<count($nums);$i++)
    {
        for($j=$i+1;$j<count($nums);$j++)
        {
            echo 'i is ' . $i . PHP_EOL;
            if($nums[$i]+$nums[$j]===$k)
            {
                unset($nums[$i]);
                unset($nums[$j]);
                $nums = array_values($nums);
                $pairs +=1; 
            }
            else
            {
                echo $nums[$i] . ' and ' . $nums[$j] . PHP_EOL;
            }
        }
    }
    return $pairs;
}
$a = [1,2,3,4];
// var_dump(maxOp($a, 5));

//sliding window

/**You are given an integer array nums consisting of n elements, and an integer k.
Find a contiguous subarray whose length is equal to k that has the maximum average value and return this value. Any answer with a calculation error less than 10-5 will 
be accepted. */

function findMaxAv($nums, $k)
{
    $n = count($nums);
    $currentSum = array_sum(array_slice($nums, 0, $k));
    $maxSum = $currentSum;

    // Slide the window across the array
    for ($i = $k; $i < $n; $i++) {
        // Update the current sum by sliding the window
        $currentSum += $nums[$i] - $nums[$i - $k];
        // Update the maximum sum if needed
        if ($currentSum > $maxSum) {
            $maxSum = $currentSum;
        }
    }

    // Return the maximum average
    return $maxSum / $k;
}   

// var_dump(findMaxAv([1,12,-5,-6,50,3],4));

/**Given a string s and an integer k, return the maximum number of vowel letters in any substring of s with length k.
Vowel letters in English are 'a', 'e', 'i', 'o', and 'u'. */

function maxVowels($s, $k)
{
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $maxVowelCount = 0;
    $currentVowelCount = 0;
    $maxVowelCount = $currentVowelCount;
    
    // Now slide the window from left to right
    for ($i = $k; $i < strlen($s); $i++) {
        // Slide the window to the right: remove the leftmost element and add the new rightmost element
        if (in_array($s[$i - $k], $vowels)) {
            $currentVowelCount--;
        }
        
        if (in_array($s[$i], $vowels)) {
            $currentVowelCount++;
        }
        
        // Update the maximum vowel count
        $maxVowelCount = max($maxVowelCount, $currentVowelCount);
    }
    
    return $maxVowelCount;
}


/**Given a binary array nums and an integer k, return the maximum number of consecutive 1's in the array if you can flip at most k 0 */
function longestOnes($nums, $k)
{
    $left = 0;
    $zeros = 0;
    $maxOnes = 0;

    for ($right = 0; $right < count($nums); $right++) {
        // If we encounter a zero, increment the zero count
        if ($nums[$right] == 0) {
            $zeros++;
        }

        // If zero count exceeds k, shrink the window from the left
        while ($zeros > $k) {
            if ($nums[$left] == 0) {
                $zeros--;
            }
            $left++;
        }

        // Update the max length of consecutive ones
        $maxOnes = max($maxOnes, $right - $left + 1);
    }

    return $maxOnes;
}
var_dump(longestOnes([1,1,1,0,0,0,1,1,1,1,0], 2));




//Prefix Sum
/**There is a biker going on a road trip. The road trip consists of n + 1 points at different altitudes. The biker starts his trip on point 0 with altitude equal 0.
You are given an integer array gain of length n where gain[i] is the net gain in altitude between points i​​​​​​ and i + 1 for all (0 <= i < n). Return the highest altitude of a
 point. */

 function largestAlt($gain)
 {
    $result = [0];
    for($i=0;$i<count($gain);$i++)
    {
        $result[] = $result[$i] + $gain[$i];
    }
    return max($result);
 }

//  var_dump(largestAlt([-5,1,5,0,-7]));

/**Given an array of integers nums, calculate the pivot index of this array.
The pivot index is the index where the sum of all the numbers strictly to the left of the index is equal to the sum of all the numbers strictly to the index's right.
If the index is on the left edge of the array, then the left sum is 0 because there are no elements to the left. This also applies to the right edge of the array.
Return the leftmost pivot index. If no such index exists, return -1. */
function pivotIndex($nums)
{
    
}
// var_dump(pivotIndex($nums));
