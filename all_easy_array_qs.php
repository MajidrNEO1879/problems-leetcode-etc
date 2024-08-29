<?php
// Given an integer array nums of length n, you want to create an array ans of length 2n where 
//ans[i] == nums[i] and ans[i + n] == nums[i] for 0 <= i < n (0-indexed).
// Specifically, ans is the concatenation of two nums arrays.
// Return the array ans.

//olong(n)
function arrayRepeat(array $arr)
{
    $concatArray = [];
    foreach ($arr as $item) {
        $concatArray[] = $item;
    }
    return array_merge($arr, $concatArray);
}
//olog(n^2)
function arrayMerge(array $arr)
{
    foreach ($arr as $item) {
        $arr[] = $item;
    }
    return $arr;
}
//var_dump(arrayMerge([1,2,3,4,1]));
//var_dump(arrayRepeat([1,2,3,4]));


// Given a zero-based permutation nums (0-indexed), build an array ans of the same length where ans[i] = nums[nums[i]] for each 0 <= i < nums.length and return it.
// A zero-based permutation nums is an array of distinct integers from 0 to nums.length - 1 (inclusive).

//o(n)
function permutationNum($arr)
{
    $ans = [];
    for ($i = 0; $i < count($arr); $i++) {
        $ans[] = $arr[$arr[$i]];
    }
    return $ans;
}

//var_dump(permutationNum([0,2,1,5,3,4]));
//var_dump(permutationNum([5,0,1,2,3,4]));

//You are given an integer array nums. In one operation, you can add or subtract 1 from any element of nums.
//Return the minimum number of operations to make all elements of nums divisible by 3.

//of O(n)
function divisibleBy3(array $arr)
{
    //logic is simple for a number to be divisible by 3 
    $ops = 0;
    foreach ($arr as $item) 
    {
        if($item % 3 == 1)
        {
            $ops +=1;
            $item -=1;
        }
        elseif($item %3 ==2)
        {
            $ops +=1;
            $item +=1;
        }
    }
    return $ops;
}
//var_dump(divisibleBy3([3,6,9]));


//There is a programming language with only four operations and one variable X:
// ++X and X++ increments the value of the variable X by 1.
// --X and X-- decrements the value of the variable X by 1.
// Initially, the value of X is 0.
// Given an array of strings operations containing a list of operations, return the final value of X after performing all the operations.


function valueOps(array $arr):int
{
    $number = 0;
    foreach($arr as $item)
    {
        if($item == '++X' || $item == 'X++')
        {
            $number +=1;
        }
        elseif($item == '--X' || $item=='X--')
        {
            $number -=1;
        }
    }
    return $number;
}

//var_dump(valueOps(["--X","X++","X++"]));

// You are given a 0-indexed array of strings words and a character x.
// Return an array of indices representing the words that contain the character x.
// Note that the returned array may be in any order.

//O(n *m)
function wordCharIndex(array $arr,string $x):array
{
    $indexArray = [];
    foreach($arr as $index=>$item)
    {
        for($i=0;$i<strlen($item);$i++)
        {
            if($item[$i]==$x)
            {
                $indexArray[]= $index;
                break;
            }
        }
    }
    return $indexArray;
}

// var_dump(wordCharIndex( ["abc","bcd","aaaa","cbc"],'z'));

/**Given the array nums consisting of 2n elements in the form [x1,x2,...,xn,y1,y2,...,yn].
Return the array in the form [x1,y1,x2,y2,...,xn,yn]. */
//example => [1,2,1,2] => [1,1,2,2]
function arrayShuffle(array $arr)
{
    $i=0;
    $j=(count($arr)/2);
    $newArray =[];
    while($i<(count($arr)/2)+1 && $j<count($arr))
    {
        $newArray[]=$arr[$i];
        $newArray[]=$arr[$j];
        $i +=1;
        $j+=1;
    }
    return $newArray;
}
// var_dump(arrayShuffle([2,5,1,3,4,7]));
//var_dump(arrayShuffle([1,2,3,4,4,3,2,1]));


/**You are given an m x n integer grid accounts where accounts[i][j] is the amount of money the i​​​​​​​​​​​th​​​​ customer has in the j​​​​​​​​​​​th​​​​ bank. 
 * Return the wealth that the richest customer has.
A customer's wealth is the amount of money they have in all their bank accounts. The richest customer is the customer that has the maximum wealth. */

function maximumSum(array $arr):int
{
    $maxinput = [];
    foreach($arr as $item)
    {
        $maxinput[] = array_sum($item);
    }
    return max($maxinput);
}

// var_dump(maximumSum([[1,5],[7,3],[3,5]]));


/**You are given an n x n integer matrix grid.
Generate an integer matrix maxLocal of size (n - 2) x (n - 2) such that:
    maxLocal[i][j] is equal to the largest value of the 3 x 3 matrix in grid centered around row i + 1 and column j + 1.
In other words, we want to find the largest value in every contiguous 3 x 3 matrix in grid.
Return the generated matrix. */



//1863. Sum of All Subset XOR Totals



/**There are n employees in a company, numbered from 0 to n - 1. Each employee i has worked for hours[i] hours in the company.
The company requires each employee to work for at least target hours.
You are given a 0-indexed array of non-negative integers hours of length n and a non-negative integer target.
Return the integer denoting the number of employees who worked at least target hours. */

function employeeHour(array $arr, $target):int
{
    $employeeNum=0;
    foreach($arr as $item)
    {
        if ($item >=$target)
        {
            $employeeNum +=1;
        }
    }
    return $employeeNum;
}   

// var_dump(employeeHour([5,1,4,2,2],6));

/**A sentence is a list of words that are separated by a single space with no leading or trailing spaces.
You are given an array of strings sentences, where each sentences[i] represents a single sentence.
Return the maximum number of words that appear in a single sentence. */
function mostWords(array $arr)
{
    $x=[];
    foreach($arr as $item)
    {
        $x[] = explode(' ', $item);
    }
    return count(max($x));
}

// print_r(mostWords(["please wait", "continue to fight", "continue to win"]));

/**You are given a 0-indexed integer array nums, and an integer k.
In one operation, you can remove one occurrence of the smallest element of nums.
Return the minimum number of operations needed so that all elements of the array are greater than or equal to k. */

function minOps(array $nums,int $k)
{
    $ops=0;
    foreach($nums as $num)
    {
       if($num < $k)
        {
            $ops +=1;
            array_splice($nums, $num);
        }
    }
    return $ops;
}

// var_dump(minOps([1,1,2,4,9], 9));


/**Given a 0-indexed integer array nums, return true if it can be made strictly increasing after removing 
 * exactly one element, or false otherwise. If the array is already strictly increasing, return true.
The array nums is strictly increasing if nums[i - 1] < nums[i] for each index (1 <= i < nums.length). */

function increasing(array $nums)
{
    $sortedNums = $nums; 
    sort($sortedNums); 
    if($sortedNums === $nums)
    {
        return true;
    }
    $n = count($nums);
    for ($i = 0; $i < $n; $i++) {
        $newArray = $nums;
        unset($newArray[$i]);  
        $newArray = array_values($newArray); 
        $isIncreasing = true;
        for ($j = 1; $j < count($newArray); $j++) {
            if ($newArray[$j-1] >= $newArray[$j]) {
                $isIncreasing = false;
                break;
            }
        }

        if ($isIncreasing) {
            return true;
        }
    }

    return false;
}
// var_dump(increasing([1,2,10,5,7]));

/**Given an array arr of integers, check if there exist two indices i and j such that :
    i != j
    0 <= i, j < arr.length
    arr[i] == 2 * arr[j]
 */

 function checkCondition(array $nums)
 {
    for($i=0;$i<count($nums);$i++)
    {
        for($j=0;$j<count($nums);$j++)
        {
            if($nums[$i]==$nums[$j] * 2)
            {
                return true;
            }
        }
    }
    return false;
 }
//  var_dump(checkCondition([10,2,5,3]));

//Design and implement a TwoSum class. It should support the following operations: add and find.
// add - Add the number to an internal data structure.
// find - Find if there exists any pair of numbers which sum is equal to the value.
