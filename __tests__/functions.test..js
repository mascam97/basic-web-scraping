import { GetMostCommonTags, GetMostCommonWords, GetBody } from '../js/functions.js';

describe('Get most common words', () => {
    test('get words', () => {
        // TODO: change the format about the received data and allow less than 10 words
        expect(GetMostCommonWords("dog cat dog dog fish"))
            .toHaveLength(10);
    });
});

// describe('Get most common tags', () => {
// BUG: refactor all the function with good practices
//     test('Get tags', () => {
//         expect(GetMostCommonTags(`
//         <main>
//             <h1><b>Main</b> Title<h1/>
//             <p>
//                 Visit <a href="http://">this link</a>, there are many <b>Things</b>
//                 Or <a href="http://">this one</a>.
//                 <img src="http://"><img src="http://"><img src="http://">
//             </p>
//         </main>
//         `))
//             .toHaveLength(10);
//     });
// });

describe('Get body from HTML code', () => {
    test('get body tags', () => {
        expect(GetBody(
            `<h1>
            <head> <title>Title</title></head>
            <body><h1>Title</h1><p>Text</p></body>
            </h1>
            `
        )).toBe("<body><h1>Title</h1><p>Text</p></body>");
    });
});

