<?php
// Given an integer array nums of length n, you want to create an array ans of length 2n where 
//ans[i] == nums[i] and ans[i + n] == nums[i] for 0 <= i < n (0-indexed).
// Specifically, ans is the concatenation of two nums arrays.
// Return the array ans.

//olong(n)
function arrayRepeat(array $arr)
{
    $concatArray=[];
    foreach($arr as $item)
    {
        $concatArray[] = $item;
    }
    return array_merge($arr, $concatArray);
}
//olog(n^2)
function arrayMerge(array $arr)
{
    foreach($arr as $item)
    {
        $arr[]=$item;
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
    $ans =[];
    for($i=0;$i<count($arr);$i++)
    {
        $ans[]=$arr[$arr[$i]];
    }
    return $ans;
}

//var_dump(permutationNum([0,2,1,5,3,4]));
var_dump(permutationNum([5,0,1,2,3,4]));

