<?php
/**Given the head of a linked list head, in which each node contains an integer value.
Between every pair of adjacent nodes, insert a new node with a value equal to the greatest common divisor of them.
Return the linked list after insertion.*/

class Node
{
    public $next;
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList
{
    public $head;
    public $tail;

    public function __construct()
    {
        $this->tail = null;
        $this->head = null;
    }

    public function push($data)
    {
        $node = new Node($data);
        if ($this->head == null) {
            $this->head = $node;
            $this->tail = $node;
        } else {
            $node->next = $this->head;
            $this->head = $node;
        }
    }

    public function append($data)
    {
        $node = new Node($data);
        if ($this->head == null) {
            $this->head = $node;
            $this->tail = $node;
        } else {
            $this->tail->next = $node;
            $this->tail = $node;
        }
    }

    public function gcd($a, $b)
    {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }

    public function insertGCDNodes()
    {
        $current = $this->head;
        while ($current !== null && $current->next !== null) {
            $gcdValue = $this->gcd($current->data, $current->next->data);
            $gcdNode = new Node($gcdValue);

            $gcdNode->next = $current->next;
            $current->next = $gcdNode;

            $current = $gcdNode->next;
        }
    }

    public function printList()
    {
        $current = $this->head;
        while ($current !== null) {
            echo $current->data . ' ';
            $current = $current->next;
        }
        echo "\n";
    }
}

$linkedlist = new LinkedList();
$linkedlist->append(12);
$linkedlist->append(15);
$linkedlist->append(30);

// echo "Original List: ";
// $linkedlist->printList();

// $linkedlist->insertGCDNodes();

// echo "Updated List with GCD Nodes: ";
// $linkedlist->printList();



/**An integer n is strictly palindromic if, for every base b between 2 and n - 2 (inclusive), the string representation of the integer n in base b is palindromic.
Given an integer n, return true if n is strictly palindromic and false otherwise.
A string is palindromic if it reads the same forward and backward.*/

class BaseConversionResults
{
    public $number;
    
    public function __construct($number)
    {
        $this->number = $number;
    }
    
    private function convertToBase($n, $b)
    {
        $convertedNumber = '';
        while ($n > 0)
        {
            $remainder = $n % $b;
            $n = intdiv($n, $b);
            $convertedNumber = $remainder . $convertedNumber;
        }
        return $convertedNumber;
    }
    
    private function isPalindrome($str)
    {
        return $str === strrev($str);
    }
    public function isStrictlyPalindromic()
    {
        for ($b = 2; $b <= $this->number - 2; $b++)
        {            $convertedNumber = $this->convertToBase($this->number, $b);
            
            if (!$this->isPalindrome($convertedNumber))
            {
                return false;
            }
        }
        return true;
    }
}
$n = 4;
$conversion = new BaseConversionResults($n);
$result = $conversion->isStrictlyPalindromic();

//echo $result ? "True" : "False";


//Given an array points where points[i] = [xi, yi] represents a point on the X-Y plane, return true if these points are a boomerang.
//A boomerang is a set of three points that are all distinct and not in a straight line.
function isBoomerang($points) {
    $coords = [];
    
    foreach ($points as $point) {
        $coords[] = $point;
    }
    
    if ($coords[0] == $coords[1] || $coords[0] == $coords[2] || $coords[1] == $coords[2]) {
        return false;
    }

    if (($coords[1][0] - $coords[0][0]) * ($coords[2][1] - $coords[0][1]) != 
        ($coords[2][0] - $coords[0][0]) * ($coords[1][1] - $coords[0][1])) {
        return true;
    }

    return false;
}
$points = [[1,1],[2,3],[3,2]];
//echo isBoomerang($points) ? 'true' : 'false';

//Given an integer n, return any array containing n unique integers such that they add up to 0.
function uniqueness($num) {
    $result = [];
    for ($i = 1; $i <= floor($num / 2); $i++) {
        $result[] = $i;
        $result[] = -$i;
    }
    if ($num % 2 != 0) {
        $result[] = 0;
    }
sort($result);
    return $result;
}
//print_r(uniqueness(7));


//A range [a,b] is the set of all integers from a to b (inclusive).
//Return the smallest sorted list of ranges that cover all the numbers
//in the array exactly. That is, each element of nums is covered by exactly one of the ranges, and there is no integer 
//x such that x is in one of the ranges but not in nums.
function rangeDetect($array)
{
    sort($array);
    $allintList = [];
    $start = null;
    $end = null;

    foreach ($array as $key => $num) {
        if ($key == 0 || $num != $array[$key - 1] + 1) {
            if ($start !== null && $end !== null) {
                $allintList[] = $start . '-' . $end;
            }
            $start = $num;
            $end = $num;
        } else {
            $end = $num;
        }
    }

    if ($start !== null && $end !== null) {
        $allintList[] = $start . '-' . $end;
    }

    return $allintList;
}

//print_r(rangeDetect([1, 2, 3, 5]));

/**There is a function signFunc(x) that returns:
    1 if x is positive.
    -1 if x is negative.
    0 if x is equal to 0.
You are given an integer array nums. Let product be the product of all values in the array nums.
Return signFunc(product).*/
function signFunc(array $x): int
{
    $multplicationResult = 1;
    foreach($x as $num)
    {
        $multplicationResult *= $num;
    }
    if($multplicationResult > 0)
    {
        return 1;
    }
    elseif($multplicationResult < 0 )
    {
        return -1;
    }else {
        return 0;
    }
}
print_r(signFunc([-1, 1, -1, 1, -1]));

//Given a 0-indexed integer array nums, return the array if it can be made strictly increasing after removing exactly one element,
//If the array is already strictly increasing, return the array.
//The array nums is strictly increasing if nums[i - 1] < nums[i] for each index (1 <= i < nums.length).
function arrayIncrease($arr)
{
    $count = count($arr);
    $found = false; 
    for ($i = 1; $i < $count; $i++) {
        if ($arr[$i - 1] >= $arr[$i]) {
            if ($found) {
                return $arr;
            }
            $found = true;

            if ($i > 1 && $arr[$i - 2] >= $arr[$i]) {
                unset($arr[$i]);
            } else {
                unset($arr[$i - 1]);
            }
        }
    }
    return array_values($arr);
}
//var_dump(arrayIncrease([1, 2, 10, 5, 7]));






// You are given an array points where points[i] = [xi, yi] is the coordinates of the ith point on a 2D plane. Multiple points can have the same coordinates.
// You are also given an array queries where queries[j] = [xj, yj, rj] describes a circle centered at (xj, yj) with a radius of rj.
// For each query queries[j], compute the number of points inside the jth circle. Points on the border of the circle are considered inside.
// Return an array answer, where answer[j] is the answer to the jth query.






// Anti-theft security devices are activated inside a bank. You are given a 0-indexed binary string array bank representing the floor 
//plan of the bank, which is an m x n 2D matrix. bank[i] represents the ith row, 
// consisting of '0's and '1's. '0' means the cell is empty, while'1' means the cell has a security device.
// There is one laser beam between any two security devices if both conditions are met:
//     The two devices are located on two different rows: r1 and r2, where r1 < r2.
//     For each row i where r1 < i < r2, there are no security devices in the ith row.
// Laser beams are independent, i.e., one beam does not interfere nor join with another.
// Return the total number of laser beams in the ban


/**An ugly number is a positive integer whose prime factors are limited to 2, 3, and 5.
Given an integer n, return true if n is an ugly number. */

function primeFactors($n) {
    $factors = [];

    while ($n % 2 == 0) {
        $factors[] = 2;
        $n /= 2;
    }
    for ($i = 3; $i <= sqrt($n); $i += 2) {
        while ($n % $i == 0) {
            $factors[] = $i;
            $n /= $i;
        }
    }
    if ($n > 2) {
        $factors[] = $n;
    }

    return $factors;
}


//print_r(primeFactors(315)); 




//You are given two positive integers n and limit.
//Return the total number of ways to distribute n candies among 3 children such that no child gets more than limit candies.

// function dsac($n, $limit)
// {

// }

/**Given 2 sorted arrays arr1[] and arr2[], each of size n, the task is to find the median of the array obtained after merging arr1[] and arr2[].*/

function arraySorted($arr1,$arr2){
    $mergesArrays = array_merge($arr1,$arr2);
    sort($mergesArrays);
    print_r($mergesArrays);
    $arrayLenght=count($mergesArrays);
    //print_r($arrayLenght);
    if(count($mergesArrays)%2 != 0)
    {
        return $mergesArrays[floor($arrayLenght/2)];
    }
    else
    {
        return ($mergesArrays[(($arrayLenght/2)-1)]+$mergesArrays[$arrayLenght/2])/2;
    }
}
var_dump(arraySorted([2, 3, 5, 8],[10, 12, 14, 16, 18, 20]));