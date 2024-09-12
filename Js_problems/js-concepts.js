//Read the countries API using fetch and print the name of country, capital, languages, population and area.

const countryData = async (apiUrl) => {
    try {
      const response = await fetch(apiUrl);
      const responseJson = await response.json();
      const countryItems = [...responseJson.map(item => ({
        name: item.name,
        capital: item.capital,
        languages: item.languages.map(lang => lang.name),
        population: item.population,
        area:item.area
      }))];
      return countryItems;
    } catch (err) {
      console.error("Error fetching data:", err);
      throw err; 
    }
  };

const countriesAPI = "https://restcountries.com/v2/all";

// countryData(countriesAPI).then(
//     data=>{
//         console.log(data);
//     }
// )

//Print out all the cat names in to catNames variable.
//const catsAPI = 'https://api.thecatapi.com/v1/breeds'

const catName = async()=>
{
    try
    {
        const reponse = await fetch('https://api.thecatapi.com/v1/breeds');
        const responseJsons = await reponse.json();
        // const catName =[];
        // responseJsons.forEach(item => {
        //     catName.push(item.name);
        // });
        // return catName;

        //cleaner way
        const catName = [...responseJsons.map(item=>{return item.name})];
        return catName;
    }
    catch(err)
    {
        console.log(err);
    }
}

// catName().then(data=>console.log(data));


// Read the cats api and find the average weight of cat in metric unit.

const catData =async (link)=>
{
    try
    {
        const response = await fetch(link);
        const responseJson = await response.json();
        const catW = []
        responseJson.map(item=>{
            const catweight = item.weight.metric.split(' - ').map(Number);
            catW.push((catweight[1]+catweight[0])/2);
        });
        return catW;
    }
    catch(err)
    {
        console.log(err);
    }
}
const link = 'https://api.thecatapi.com/v1/breeds';
// catData(link).then(data=>console.log(data));

// Read the countries api and find out the 10 largest countries
const countriesApiLargest = async(link)=>
{
    try{
    const response = await fetch(link);
    const responseJson = await response.json();
    const population = [];
    responseJson.map(data=>{
        population.push(data.population);
    });
    population.sort((a, b) => b - a);
    return population.slice(0,10);
    }
    catch(err)
    {
        console.log(err);
    }
}
// countriesApiLargest(countriesAPI).then(data=>console.log(data));

// Read the countries api and count total number of languages in the world used as officials.
const countriesApiLanguages = async(link)=>
    {
        try{
        const response = await fetch(link);
        const responseJson = await response.json();
        const lan =[];
        responseJson.map(item=>{
           lan.push(item.languages);
        });
return lan;
        }
        catch(err)
        {
            console.log(err);
        }
    }
// countriesApiLanguages(countriesAPI).then(data=>console.log(data));