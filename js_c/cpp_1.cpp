#include <iostream>
#include <vector>
#include <set>
using namespace std;
//merging
int main_1()
{
    int a[]= {1,2,3};
    int b[]= {4,5,6};
    int n_a = sizeof(a)/sizeof(a[0]);
    int n_b = sizeof(b)/sizeof(b[0]);
    int z[n_a + n_b];
    for (int i=0;i<n_a;i++)
    {
        z[i] = a[i];
    }
    for (int i=0;i<n_b;i++)
    {
        z[n_a+ i]=b[i]; 
    }
    for (int i=0; i<n_a+n_b;i++)
    {
        std::cout << z[i];
    }
}

//removing duplicates 
vector<int> removeDup(const vector<int>& arr1)
{
    set <int> uniqItems (arr1.begin(), arr1.end());
    vector<int> result (uniqItems.begin(), uniqItems.end());
    return result;
}
int main ()
{
    // cout << main_1();
    vector <int> arr1 = {1,2,3,4,5,5,6};
    vector <int> result = removeDup(arr1);
    for (int num : result)
    {
        cout << num;
    }
    cout << endl;
    return 0;

}