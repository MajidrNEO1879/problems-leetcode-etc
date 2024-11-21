#include <iostream>
#include <vector>
#include <algorithm>
using namespace std;

// Given an array arr[] of n integers and a target value, the task is to find whether there is a
// pair of elements in the array whose sum is equal to target. This problem is a variation of 2Sum problem.

bool givenSum(vector<int> arr, int target)
{
    int len = sizeof(arr) / sizeof(arr[0]);
    // or for size : arr.size();
    for (int i = 0; i < len; i++)
    {
        for (int j = 0; j < len; j++)
        {
            if (arr[i] + arr[j] == target)
            {
                return true;
            }
        }
    }
    return false;
}
bool givenSum2(vector<int> arr, int target)
{
    sort(arr.begin(), arr.end());
    int a = 0;
    int b = arr.size() - 1;
    while (a < b)
    {
        int sum = arr[a] + arr[b];
        if (sum < target)
        {
            a++;
        }
        else if (sum > target)
        {
            b--;
        }
        else
        {
            return true;
        }
    }
    return false;
}
int main()
{
    vector<int> arr = {0, -1, 2, -3, 1};
    int target = -2;
    // cout << givenSum(arr, target);
    cout << givenSum2(arr, target);
}