#include <iostream>
#include <vector>

using std::vector;
using std::cout;

// Function to find two indices whose elements sum to target
vector<int> targetAdd(const vector<int>& nums, int target)
{
    int s = 0;
    int e = nums.size() - 1;

    while (s < e)  
    {
        int sum = nums[s] + nums[e];

        if (sum == target)
        {
            return {s, e}; 
        }
        else if (sum < target)
        {
            s++;  
        }
        else
        {
            e--; 
        }
    }
    return {}; 
}

int main()
{
    vector<int> nums = {2, 7, 11, 15}; 
    int target = 9;
    vector<int> result = targetAdd(nums, target);  
    if (!result.empty())
    {
        cout << "Indices: " << result[0] << ", " << result[1] << "\n";
    }
    else
    {
        cout << "No pair found that adds to the target.\n";
    }
    return 0;
}
