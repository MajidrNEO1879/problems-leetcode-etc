//Create an Animal class. The class will have name, age, color, legs properties and create different methods

class Animal
{
    name: string;
    age: number;
    color: string;
    legs: number;
    constructor(name:string, age:number, color:string, legs:number)
    {
        this.name=name;
        this.age=age;
        this.color=color;
        this.legs=legs;
    }
    getName()
    {
        return this.name;
    }
    getAge()
    {
        return this.age;
    }
    getColor()
    {
        return this.color;
    }
    getLegs()
    {
        return this.legs;
    }

}


const Animal1 = new Animal('dog', 2, 'brown', 4);

console.log(Animal1.getLegs());