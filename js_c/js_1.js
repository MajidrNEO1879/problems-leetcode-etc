/**You are given two integer arrays nums1 and nums2, sorted in non-decreasing order, and two integers m and n, representing the number of elements in nums1 and 
 * nums2 respectively. Merge nums1 and nums2 into a single array sorted in non-decreasing order. */
const mergeA_1 = (nums1 ,m,nums2 , n)=>
{
    let x = nums1.slice(0, m);
    let y = nums2.slice(0, n);
    nums1 = [...x, ...y];
    nums1.sort();
    return nums1;
}

// console.log(mergeA_1([1,2,3,0,0,0], 3, [2,5,6], 3));

/**Given an integer array nums and an integer val, remove all occurrences of val in nums in-place. The order of the elements may be changed. 
 * Then return the number of elements in nums which are not equal to val. */

const removeEl=(nums, val)=>
{
    nums = nums.filter(item =>{
        return item != val;
    })
    return [nums, nums.length];
}
// console.log(removeEl([3,2,2,3], 3));

/**Given an integer array nums sorted in non-decreasing order, remove the duplicates in-place such that each unique element appears only once. 
 * The relative order of the elements should be kept the same. Then return the number of unique elements in nums. */
// --
function removeDuplicates(arr) {
  
    let i = 0; 
    let j = 1; 
  
    while (j < arr.length) {
      if (arr[i] !== arr[j]) {
        i++;
        arr[i] = arr[j];
      }
      j++;
    }
  
    arr.length = i + 1;
  
    return arr;
  }
//console.log(removeDuplicates([1,1,3,4,5,6]));
//--

//merge two sorted array

const mergSorted = (array1, array2)=>
{
//   array2.forEach(element => {
//      array1.push(element) 
//   });
// return array1;
  array1 = [...array1, ...array2];
  return array1;
}
console.log(mergSorted([1,2,3,4,5],[6,7,8]));