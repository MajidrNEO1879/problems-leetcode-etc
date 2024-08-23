<?php
//arrays
//an algorithm to determine if a string has all unique characters. 

function uniqueChars($str):bool
{
    $hashTable=[];
    for($i=0;$i<strlen($str);$i++)
    {
        if(isset($hashTable[$str[$i]])){
            return true;
        }
        $hashTable[$str[$i]]=true;
    }
    return false;
}

//var_dump(uniqueChars('helo'));


//given a string write a function to check if it is a permutation of a palindrome.


//given an image represented by a N * N matrix, where each pixel in the images is represented by an integer, write a method to rotate the image by 90 degrees.
function matrixRotation($matrix, $rows, $cols)
{
    $transposedMatrix = [];
  for ($i = 0;$i < $cols;++$i)
  {
    for ($j = 0;$j < $rows;++$j)
    {
      $transposedMatrix[$i][$j] = $matrix[$j][$i];
    }
  }
  $reverseTranspose = [];
  for($i=0;$i<count($transposedMatrix);$i++){
    $reverseTranspose[] = array_reverse($transposedMatrix[$i]);
  };
  return $reverseTranspose;
}

var_dump(matrixRotation([['a','b','c'],['d','e','f'],['g','i','j']],3,3));


//write an algorithm such that if an element in an M*N matrix is O, its entire row and column are set to O.

function rowcolZero($matrix) {
    $rows = count($matrix);
    $cols = count($matrix[0]);

    $rowZero = array_fill(0, $rows, false);
    $colZero = array_fill(0, $cols, false);

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            if ($matrix[$i][$j] == 0) {
                $rowZero[$i] = true;  
                $colZero[$j] = true;  
            }
        }
    }
    for ($i = 0; $i < $rows; $i++) {
        if ($rowZero[$i]) {
            for ($j = 0; $j < $cols; $j++) {
                $matrix[$i][$j] = 0;
            }
        }
    }
    for ($j = 0; $j < $cols; $j++) {
        if ($colZero[$j]) {
            for ($i = 0; $i < $rows; $i++) {
                $matrix[$i][$j] = 0;
            }
        }
    }

    return $matrix;
}
rowcolZero([[1,2,3],[4,5,6],[7,8,9]]);