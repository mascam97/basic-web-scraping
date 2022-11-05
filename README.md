# Basic Web Scraping ![Status](https://img.shields.io/badge/status-no_longer_maintained-orange) ![Coverage](https://img.shields.io/badge/coverage-82%25-yellowgreen) ![Tests](https://img.shields.io/badge/tests-100%25-green)

_Website to get data from other website, clean the code and get the most common words._

### Project goal by mascam97

This was a [project developed](https://github.com/mascam97/basic-web-scraping/tree/4e429cd4f112737a973d295d4a6b9b07b2aec3ed) in a subject when I was student.
As better developer **I refactor all the project** with better practices and unit testing.

Due to this project is not deployed anymore and does not have more purposes, is no longer maintained.

### Achievements :star2:

- Teamwork in the first release.
- Got the data with PHP and process it with JavaScript.
- Better HTML semantic, JavaScript code and practices.
- Used regular expressions to clean the data instead of fors and ifs.
- Implemented unit testing with Jest.

---

## Getting Started :rocket:

These instructions will get you a copy of the project up and running on your local machine.

### Installing 🔧

The programs you need are:

- PHP 7.
- [NodeJs](https://nodejs.org/en/).
 
Install the JavaScript dependencies.

```
npm run install
```

Finally run the server:

```
php -S localhost:8080
```

---

## Testing

### Unit JavaScript testing

There are some unit testing to guarantee functionalities about functions and filters, some snapshots are included to save results about many functions and filter. Run the test with: 

```
npm run test
```

Note: You can run the previous command dynamically with `test:watch`.

Run the coverage about functions and filters with:

```
npm run test:coverage
```

---

## Functionality ⚙️

- Paste a complete URL in the input and click on get information.
- The program cleaned the source code (delete html tags, javascript and css code) to get just valuable text (words with 1 or 2 characters, special characters and some words are deleted).
- Then the program calculates the most common words and tags.

Note: At the moment this program does not work well with website with client side server or/and strange structure.

---

### Authors

- Martín S. Campos [mascam97](https://github.com/mascam97)
- Some classmates who do not use github anymore :´(.

### Contributing

You're free to contribute to this project by submitting [issues](https://github.com/mascam97/basic-web-scraping/issues) and/or [pull requests](https://github.com/mascam97/basic-web-scraping/pulls).

### License

This personal project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/).

### References :books:

- [JavaScript Testing with Jest introduction course](https://platzi.com/clases/js-jest-2019/) 
- [JavaScript basic course](https://platzi.com/clases/basico-javascript/) 
- [Regular expression course](https://platzi.com/clases/expresiones-regulares/) 
