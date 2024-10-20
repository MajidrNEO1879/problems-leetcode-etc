#include <iostream>
#include <string>
using namespace std;
// string stuff
void word()
{
    using std::string;
    string word = "hello world";
    for (int i = 0; i < word.size(); i++)
    {
        std::cout << "the word is :" << word[i] << std::endl;
    }
}
void displayanumber(int a, float b)
{
    cout << a << endl;
    cout << b;
}
void array1 ()
{
    int a[5]= {1,2,3,4,5};
    for(int i = 0; i<5;i++)
    {
        cout << a[i] << endl;
    }
}

//taking 3 items from user::
void user1()
{
    cout <<  "enter 3 nnumbers :" ;
    int a[3]={};
    for (int i=0;i<3;i++)
    {
        //قرار دادن ورودی در ایندکس
        cin >> a[i];
    }
    //display
    for (int i=0;i<3;i++)
    {
        cout  << a[i] << endl;
    }
}


int main()
{
    //word();
    int n = 5;
    float m = 5.9;
    //displayanumber(n, m);
    // array1();
    //user1();
   //char str[5];
    // cin >> str;
    // cout << "this is what you added: " << str << endl;  // only 5 characters
    //now the string obj
    string str;
    cout << "Enter a string: ";
    getline(cin, str);

    cout << "You entered: " << str << endl;
    return 0;
}