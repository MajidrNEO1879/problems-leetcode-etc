<?php

/**You are given two integer arrays nums1 and nums2, sorted in non-decreasing order,
 *  and two integers m and n, representing the number of elements in nums1 and nums2 respectively.
Merge nums1 and nums2 into a single array sorted in non-decreasing order.
The final sorted array should not be returned by the function, but instead be stored inside the array nums1. 
To accommodate this, nums1 has a length of m + n, where the first m elements denote the elements that should be merged, 
and the last n elements are set to 0 and should be ignored. nums2 has a length of n. */

function merge(array $nums1, int $m, array $nums2, int $n)
{
    $newNum1=[];
    for($i=0;$i<$m;$i++)
    {
        $newNum1[]=$nums1[$i];
    }
    for ($j=0;$j<$n;$j++)
    {
        $newNum1[]=$nums2[$j];
    }
    sort($newNum1);
    return $newNum1;
}       

var_dump(merge([1,2,3,0,0,0],3,[2,5,6],3));
var_dump(merge([0],0,[1],1));

//