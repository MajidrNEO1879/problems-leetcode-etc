//Create an Animal class. The class will have name, age, color, legs properties and create different methods
//Create a Dog and Cat child class from the Animal Class
//Override the method you create in Animal class ->it means using setmethods
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

// console.log(Animal1.getLegs());

class Dog extends Animal
{
    getDog()
    {
        return this.name;
    }
}

const Dog1 = new Dog('teddy', 5, 'brown', 4);

// console.log(Dog1.getDog());
class Cat extends Animal
{
    getCat()
    {
        return this.name;
    }
}

// const Cat1 = new Cat('boo boo', 5, 'brown', 4);
// console.log(Cat1.getCat());


/**Let's try to develop a program which calculate measure of central tendency of a sample(mean, median, mode) 
 * and measure of variability(range, variance, standard deviation). In addition to those measures find the min, max, count, percentile, and frequency
 *  distribution of the sample. You can create a class called Statistics and create all the functions which do statistical calculations as method for the 
 * Statistics class. Check the output below. */


/**
 * ages = [31, 26, 34, 37, 27, 26, 32, 32, 26, 27, 27, 24, 32, 33, 27, 25, 26, 38, 37, 31, 34, 24, 33, 29, 26]

console.log('Count:', statistics.count()) // 25
console.log('Sum: ', statistics.sum()) // 744
console.log('Min: ', statistics.min()) // 24
console.log('Max: ', statistics.max()) // 38
console.log('Range: ', statistics.range() // 14
console.log('Mean: ', statistics.mean()) // 30
console.log('Median: ',statistics.median()) // 29
console.log('Mode: ', statistics.mode()) // {'mode': 26, 'count': 5}
console.log('Variance: ',statistics.var()) // 17.5
console.log('Standard Deviation: ', statistics.std()) // 4.2
console.log('Variance: ',statistics.var()) // 17.5
console.log('Frequency Distribution: ',statistics.freqDist()) // [(20.0, 26), (16.0, 27), (12.0, 32), (8.0, 37), (8.0, 34), (8.0, 33), (8.0, 31), (8.0, 24),
 (4.0, 38), (4.0, 29), (4.0, 25)]
*/

//the output::
/**
 * console.log(statistics.describe())
Count: 25
Sum:  744
Min:  24
Max:  38
Range:  14
Mean:  30
Median:  29
Mode:  (26, 5)
Variance:  17.5
Standard Deviation:  4.2
Frequency Distribution: [(20.0, 26), (16.0, 27), (12.0, 32), (8.0, 37), (8.0, 34), (8.0, 33), (8.0, 31), (8.0, 24), (4.0, 38), (4.0, 29), (4.0, 25)]
 */
class Statistics 
{
    data: number[];
    sum: number;
    
    constructor(data: number[]) {
        this.data = data;
        this.sum = 0;
    }

    getLength() {
        return this.data.length;
    }

    getSum() {
        this.sum = 0; 
        this.data.forEach(element => {
            this.sum += element;
        });
        return this.sum;
    }

    getMin() {
        return Math.min(...this.data);
    }

    getMax() {
        return Math.max(...this.data);
    }

    getRange() {
        return this.getMax() - this.getMin();
    }

    getMean() {
        return Math.ceil(this.getSum() / this.getLength());
    }

    // getMedian() {
    //     const length = this.getLength();
        
    //     // Handle case for empty array
    //     if (length === 0) {
    //         return undefined; // or return null or some message indicating no data
    //     }
        
    //     // Sort the data
    //     const sortedData = [...this.data].sort((a, b) => a - b);

    //     // If odd length, return the middle element
    //     if (length % 2 !== 0) {
    //         return sortedData[Math.floor(length / 2)];
    //     }
        
    //     // If even length, return the average of the two middle elements
    //     const mid1 = sortedData[length / 2 - 1];
    //     const mid2 = sortedData[length / 2];
    //     return (mid1 + mid2) / 2;
    // }
    getMode():  [number | null, number] {
        const counts: { [key: number]: number } = this.data.reduce((acc, item) => {
            acc[item] = (acc[item] || 0) + 1;
            return acc;
        }, {} as { [key: number]: number });

        let maxCount = 0;
        let mostFrequentItem: number | null = null;

        for (const [item, count] of Object.entries(counts)) {
            const numItem = Number(item);
            if (count > maxCount) {
                maxCount = count;
                mostFrequentItem = numItem;
            }
        }

        return [mostFrequentItem, maxCount];
    }
}

const statistics1 = new Statistics([31, 26, 34, 37, 27, 26, 32, 32, 26, 27, 27, 24, 32, 33, 27, 25, 26, 38, 37, 31, 34, 24, 33, 29, 26]);
console.log(statistics1.getLength());
console.log(statistics1.getSum());
console.log(statistics1.getMin());
console.log(statistics1.getMax());
console.log(statistics1.getRange());
console.log(statistics1.getMean());
// console.log(statistics1.getMedian());
console.log(statistics1.getMode());