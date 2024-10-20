#include <iostream>
#include <vector>
#include <set>
using namespace std;
// merging
int main_1()
{
    int a[] = {1, 2, 3};
    int b[] = {4, 5, 6};
    int n_a = sizeof(a) / sizeof(a[0]);
    int n_b = sizeof(b) / sizeof(b[0]);
    int z[n_a + n_b];
    for (int i = 0; i < n_a; i++)
    {
        z[i] = a[i];
    }
    for (int i = 0; i < n_b; i++)
    {
        z[n_a + i] = b[i];
    }
    for (int i = 0; i < n_a + n_b; i++)
    {
        std::cout << z[i];
    }
}

// removing duplicates
vector<int> removeDup(const vector<int> &arr1)
{
    set<int> uniqItems(arr1.begin(), arr1.end());
    vector<int> result(uniqItems.begin(), uniqItems.end());
    return result;
}

vector<pair<int, int>> countFrequency(const vector<int> &arr)
{
    vector<pair<int, int>> freq;             // Vector to store the unique elements and their frequencies
    vector<bool> visited(arr.size(), false); // Track if an element is already processed

    for (int i = 0; i < arr.size(); i++)
    {
        if (visited[i]) // Skip already processed elements
            continue;

        int count = 1; // Initial count for the current element

        // Count occurrences of arr[i]
        for (int j = i + 1; j < arr.size(); j++)
        {
            if (arr[i] == arr[j])
            {
                count++;
                visited[j] = true; // Mark the duplicate as visited
            }
        }

        // Store the element and its count as a pair in the frequency vector
        freq.push_back({arr[i], count});
    }

    return freq; // Return the vector of pairs containing frequencies
}
int main()
{
    // cout << main_1();
    vector<int> arr1 = {1, 2, 3, 4, 5, 5, 6};
    // vector <int> result = removeDup(arr1);
    // for (int num : result)
    // {
    //     cout << num;
    // }
    // cout << endl;
    vector<int> arr = {1, 2, 3, 2, 4, 1, 5, 1};
    vector<pair<int, int>> result = countFrequency(arr);
    cout << "Element frequencies:" << endl;
    for (const auto &p : result)
    {
        cout << "Element: " << p.first << ", Frequency: " << p.second << endl;
    }
    return 0;
}