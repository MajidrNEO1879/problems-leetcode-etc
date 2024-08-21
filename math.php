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
echo isBoomerang($points) ? 'true' : 'false';


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