#include <iostream>
#include <vector>
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
int main ()
{
    std::cout << main_1();
    return 0;
}