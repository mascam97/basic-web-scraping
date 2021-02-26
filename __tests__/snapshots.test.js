import { RemoveHtmlCode, ClearInfo, ReplaceCharacters, DeleteWords } from '../js/filters';
import { GetTagsAsText, GetWordsAndRepetitions, GetBody } from '../js/functions.js';

const html_code_example = `
<html>
    <head>
        <title>Title website</title>
    </head>
    <body>
        <style>
            p {font-size:10rem;}
        </style>
        <header>Title header</header>
        <main>
            <h1> Welcome     to  
            company      
            </h1>
            <p>We are a company in Mexico to share good value</p>
            <img src="">
            <div>
                Wanna contact them? Cellphone: +00 1234, let´s talk!!!!!!
            </div>
        </main>
        <footer>
            <img src="http://">
            Visit my blog in <a href="http://">this link<a>.
        </footer>
        <script>
                alert("hello world from javascript");
        </script>
    </body>
</html>
`;

describe('Snapshot', () => {
    test('All the filters to get just text', () => {
        let source_code = html_code_example;

        source_code = GetBody(source_code);
        source_code = RemoveHtmlCode(source_code);
        source_code = DeleteWords(source_code);
        source_code = ReplaceCharacters(source_code);
        source_code = ClearInfo(source_code);

        expect(source_code).toMatchSnapshot();
    });
    test('Get words and repetitions', () => {
        const text_examples = `
        Peter´s tongue twister
        Peter Piper picked a peck of pickled peppers. 
        How many pickled peppers did Peter Piper pick?
        `;
        let text_clean = DeleteWords(text_examples);
        text_clean = ReplaceCharacters(text_clean);
        text_clean = ClearInfo(text_clean);

        expect(GetWordsAndRepetitions(text_clean)).toMatchSnapshot();
    })

    test('Get tags and repetitions', () => {
        // TODO: implement GetTagsAsText function
        const tags_as_text_examples = `
        html head meta meta meta meta link script link title body
        header h1 ul li a li li a li li a hr section div h1 div
        ul li a i li a i li a i li a i li a i span li i span li
        i span footer p 
        `;

        expect(GetWordsAndRepetitions(tags_as_text_examples)).toMatchSnapshot();

    })
});
