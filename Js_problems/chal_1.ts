/**One hot summer day Pete and his friend Billy decided to buy a watermelon. They chose the biggest and the ripest one, in their opinion. 
 * .After that the watermelon was weighed, and the scales showed w kilos. They rushed home, dying of thirst, and decided to divide the berry, 
 * .however they faced a hard problem.
Pete and Billy are great fans of even numbers, that's why they want to divide the watermelon in such a way that each of the two parts weighs even number of kilos, 
at the same time it is not obligatory that the parts are equal. The boys are extremely tired and want to start their meal as soon as possible, that's why you should
 help them and find out, if they can divide the watermelon in the way they want. For sure, each of them should get a part of positive weight. */

/**Sometimes some words like "localization" or "internationalization" are so long that writing them many times in one text is quite tiresome.

Let's consider a word too long, if its length is strictly more than 10 characters. All too long words should be replaced with a special abbreviation.

This abbreviation is made like this: we write down the first and the last letter of a word and between them we write the number of letters between the first and 
the last letters. That number is in decimal system and doesn't contain any leading zeroes. Thus, "localization" will be spelt as "l10n", and "internationalization» 
will be spelt as "i18n". You are suggested to automatize the process of changing the words with abbreviations. At that all too long words should be replaced by
 the abbreviation and the words that are not too long should not undergo any changes. */

 function abbreviateLongWords(text:string) {
    return text.split(' ').map(word => {
        if (word.length > 10) {
            const firstLetter = word.charAt(0);
            const lastLetter = word.charAt(word.length - 1);
            const middleCount = word.length - 2;
            return `${firstLetter}${middleCount}${lastLetter}`;
        }
        return word; 
    }).join(' '); 
}
const inputText = "localization and internationalization are too long words.";
const result = abbreviateLongWords(inputText);
console.log(result);