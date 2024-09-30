use std::collections::HashSet;

fn main() {
    let mut nums = vec![1, 1, 2, 3, 2, 4, 3];
    //remove_duplicates(&mut nums);
    //println!("After removing duplicates: {:?}", nums);
}

fn remove_duplicates(nums: &mut Vec<i32>) {
    let mut seen = HashSet::new();
    nums.retain(|&x| seen.insert(x)); 
}


fn name(name, lName)
{
    println!("my name is {} and my last name is {}", name , lName);
}