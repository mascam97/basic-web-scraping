import { GetTagsAsText, GetWordsAndRepetitions, GetBody } from './functions.js';
import { RemoveHtmlCode, ClearInfo, ReplaceCharacters, DeleteWords } from './filters.js';

$(document).ready(function () {
    let text = $("#text").text();
    if (text != '') {

        let source_code = text;
        source_code = GetBody(source_code);
        source_code = RemoveHtmlCode(source_code);
        source_code = DeleteWords(source_code);
        source_code = ReplaceCharacters(source_code);
        source_code = ClearInfo(source_code);
        $("#info").text(source_code);

        const most_common_words = GetWordsAndRepetitions(source_code);
        let i = 0;
        // You can set how many words and at least how many times here
        while (i <= 10 && most_common_words[i].times >= 3) {
            $("#most-common-words").append(`
            <li class='list-group-item d-flex justify-content-between align-items-center'>
                ${most_common_words[i].word}
                <span class='badge badge-primary badge-pill'>${most_common_words[i].times}</span>
            </li>`);
            i++;
        };

        const most_common_tags = GetWordsAndRepetitions(GetTagsAsText(text));
        i = 0;
        // You can set how many words and at least how many times here
        while (i <= 10 && most_common_tags[i].times >= 4) {
            $("#most-common-tags").append(`
                <li class='list-group-item d-flex justify-content-between align-items-center'>
                    ${most_common_tags[i].word}
                    <span class='badge badge-success badge-pill'>${most_common_tags[i].times}</span>
                </li>`);
            i++;
        };
    }
});
