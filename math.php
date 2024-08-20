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

echo "Original List: ";
$linkedlist->printList();

$linkedlist->insertGCDNodes();

echo "Updated List with GCD Nodes: ";
$linkedlist->printList();

