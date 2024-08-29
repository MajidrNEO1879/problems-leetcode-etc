<?php
//Write a PHP abstract class called 'Animal' with abstract methods like 'eat()' and 'makeSound()'. Create subclasses like 'Dog', 'Cat', and 'Bird' 
//that implement these methods.

abstract class Animal
{


    abstract public function eat();
    abstract public function makeSound();
}

class Dog extends Animal
{
    public function drink()
    {
        echo 'drink water';
    }
    public function eat()
    {
        echo 'eates meat';
    }
    public function makeSound()
    {
        echo 'woof woof';
    }

}
$dog = new Dog;
//print_r($dog->eat());

//Write a PHP class called 'Person' with properties like 'name' and 'age'. Implement the '__toString()' magic method to display person information. 

class Person
{
    private $name;
    private $age;
    public function __construct($age, $name)
    {
        $this->name = $name;
        $this->age = $age;
    }
    public function __tostring()
    {
        return 'my name is ' . $this->name . ' and im ' . $this->age;
    }
}

$person = new Person(12, 'andy');
//print_r($person->__tostring());

//Write a class called 'Employee' that extends the 'Person' class and adds properties like 'salary' and 'position'. Implement methods 
//to display employee details. 

class Employee extends Person
{
    private $salary;
    private $position;

    public function __construct($name, $age, $salary, $position)
    {
        parent::__construct($name, $age);
        $this->salary = $salary;
        $this->position = $position;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function getPosition()
    {
        return $this->position;
    }
}
//$employee = new Employee('boss', 2000);

//var_dump($employee);


//Write a class called 'Product' with properties like 'name' and 'price'. Implement the 'Comparable' interface to compare products based on their prices.


interface Comparable
{
    public function compare($things);
}
class Product implements Comparable
{
    private $name;
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
    public function name()
    {
        return $this->name;
    }
    public function price()
    {
        return $this->price;
    }
    public function compare($things)
    {
        if ($things instanceof Product) {
            if ($this->price < $things->price()) {
                return -1;
            } elseif ($this->price > $things->price()) {
                return 1;
            } else {
                return 0;
            }
        } else {
            throw new Exception("Invalid comparison object.");
        }
    }
}


// $product1 = new Product("Desktop", 1200);
// $product2 = new Product("Laptop", 1000);

// $result = $product1->compare($product2);
// if ($result < 0) {
//     echo $product1->name() . " is cheaper than " . $product2->name() . "</br>";
// } elseif ($result > 0) {
//     echo $product1->name() . " is more expensive than " . $product2->name() . "</br>";
// } else {
//     echo $product1->name() . " and " . $product2->name() . " have the same price.</br>";
// }


//Write a PHP class called 'File' with properties like 'name' and 'size'. Implement a static method to calculate the total size of multiple files.
class File 
{
    public $name;
    public $size;
    public function __construct($name, $size) {
        $this->name = $name;
        $this->size = $size;
    }
    public static function size($files) {
        $totalSize = 0;

        foreach ($files as $file) {
            if ($file instanceof File) {
                $totalSize += $file->size;
            }
        }

        return $totalSize;
    }
} 

$file1 = new File("file1.txt", 1000);
$file2 = new File("file2.txt", 2000);
$file3 = new File("file3.txt", 1500);

$files = [$file1, $file2, $file3];
$totalSize = File::size($files);

echo "Total size of files: " . $totalSize . " bytes";

//write a mathod to replace all spaces in a string with '%20'.
//example='mr john smith' => 'mr%20smith%20smith'

class SpaceChange
{
    public $str;
    public function __construct($str)
    {
        $this->str = $str;
    }
    public function spaceTochar()
    {
        $lastSp= trim($this->str);
        $newString=  str_replace(' ','%20',$lastSp);
        return $newString;
        
    }
}

$string = new SpaceChange(' mr john smith ');
echo($string->spaceTochar());


//Design and implement a TwoSum class. It should support the following operations: add and find.
// add - Add the number to an internal data structure.
// find - Find if there exists any pair of numbers which sum is equal to the value.

// class TwoSum
// {

// }