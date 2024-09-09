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
    if($str1 . $str2 != $str2 . $str1)
    {
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
    $candyBool= [];
    for($i=0;$i<count($candies);$i++)
    {
        for($j=0;$j<count($candies);$j++)
        {
            if($candies[$i]+$extraCandy>$candies[$j])
            {
                $candyBool[]= true;
            }
            else 
            {
                $candyBool[]=false;
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
    if (count($flowerbed)<5)
    {
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
    while($p1<$p2)
    {
        if(in_array($s[$p1], $vowels) && in_array($s[$p2], $vowels))
        {
            $temp=$s[$p1];
            $s[$p1] = $s[$p2];
            $s[$p2]=$temp;
            $p1 ++;
            $p2 --;
        }elseif (!in_array($s[$p1], $vowels)) {
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
    $sentence = explode(' ',$sentence);
    $x = array_reverse($sentence);
    $y = '';
    foreach($x as $item)
    {
        $y .= $item . ' ';
    }
    return trim($y);
}

var_dump(reverseWord('a good   example'));

