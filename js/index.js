import { GetTagsAsText, GetWordsAndRepetitions, GetBody } from './functions.js';
import { RemoveHtmlCode, ClearInfo, ReplaceCharacters, DeleteWords } from './filters.js';

let text = document.getElementById('text').textContent;
if (text != '') {

    let source_code = text;
    source_code = GetBody(source_code);
    source_code = RemoveHtmlCode(source_code);
    source_code = DeleteWords(source_code);
    source_code = ReplaceCharacters(source_code);
    source_code = ClearInfo(source_code);
    document.getElementById('info').innerHTML = source_code;

    const most_common_words = GetWordsAndRepetitions(source_code);
    const words_container = document.getElementById('most-common-words');
    let i = 0;
    // You can set how many words and at least how many times here
    while (i <= 10 && most_common_words[i].times >= 3) {
        words_container.innerHTML += `
            <li>
                ${most_common_words[i].word}
                <span>${most_common_words[i].times}</span>
            </li>`;
        i++;
    };

    console.log(GetTagsAsText(text));
    const most_common_tags = GetWordsAndRepetitions(GetTagsAsText(text));
    const tags_container = document.getElementById('most-common-tags');
    i = 0;
    // You can set how many words and at least how many times here
    while (i <= 10 && most_common_tags[i].times >= 4) {
        tags_container.innerHTML += `
                <li>
                    ${most_common_tags[i].word}
                    <span>${most_common_tags[i].times}</span>
                </li>`;
        i++;
    };
}
