//Given an array arr[] of n integers and a target value, the task is to find whether there is a pair of elements in the array whose sum is equal to target
function targetArray(array1: number[], target: number): boolean {
  for (let i = 0; i < array1.length; i++) {
    for (let j = 1; j < array1.length; j++) {
      if (array1[i] + array1[j] == target) {
        return true;
      }
    }
  }
  return false;
}

// console.log(targetArray ([0, -1, 2, -3, 1],2));
/**Given an array prices[] of length N, representing the prices of the stocks on different days, the task is to find the maximum profit possible by buying and selling the
 * stocks on different days when at most one transaction is allowed. Here one transaction means 1 buy + 1 Sell. */

function maxProfit(array: number[]): number | undefined {
  //limits
  if (Math.min(...array) === array[array.length - 1]) {
    return;
  }
  let result = 0;
  for (let i = 0; i < array.length; i++) {
    for (let j = 0; j < array.length; j++) {
      result = Math.max(result, array[j] - array[i]);
    }
  }
  return result;
}

// console.log(maxProfit([7, 10, 1, 3, 6, 9, 2]));

//Given an array of n elements that contains elements from 0 to n-1, with any of these numbers appearing any number of times.
function duplicates(array: number[]): number[] {
  let duplicates: number[] = [];
  for (let i = 0; i < array.length; i++) {
    for (let j = i + 1; j < array.length; j++) {
      if (array[i] === array[j]) {
        duplicates = [...duplicates, array[i]];
      }
    }
  }
  return duplicates;
}
// console.log(duplicates([1, 6, 5, 2, 3, 3, 2]));

//Given an array arr[] of n integers, construct a Product Array prod[] (of the same size) such that prod[i] is equal to the product of all the elements of arr[] except arr[i].
//needs reading
function productResult(array: number[]): number[] {
  const n = array.length;
  const left = new Array(n).fill(1);
  const right = new Array(n).fill(1);
  const prod = new Array(n).fill(1);

  // Fill left array
  for (let i = 1; i < n; i++) {
    left[i] = left[i - 1] * array[i - 1];
  }

  // Fill right array
  for (let j = n - 2; j >= 0; j--) {
    right[j] = right[j + 1] * array[j + 1];
  }

  // Calculate product array
  for (let k = 0; k < n; k++) {
    prod[k] = left[k] * right[k];
  }

  return prod;
}
// console.log(productResult([10, 3, 5, 6, 2]));

//Given an integer array, the task is to find the maximum product of any subarray.

function maxSubArray(array: number[]): number[] {
  for (let i = 0; i < array.length; i++) {
    if (array[i] == 0 ) 
    {
      array = array.slice(array[i]);
    }
    if(array[i] == 1)
    {
      array = array.slice(array[i])
    }
  }
  return array;
}

console.log(maxSubArray([0, 1, 2, 3, 4, 5]));
