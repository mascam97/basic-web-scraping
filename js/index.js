import { GetMostCommonTags, GetMostCommonWords, GetBody } from './functions.js';
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

        const most_common_words = GetMostCommonWords(source_code);
        most_common_words.forEach(function (word) {
            $("#most-common-words").append(`
            <li class='list-group-item d-flex justify-content-between align-items-center'>
                ${word["word"]}
                <span class='badge badge-primary badge-pill'>${word["times"]}</span>
            </li>`);
        });

        const most_common_tags = GetMostCommonTags(text);
        most_common_tags.forEach(function (tag) {
            $("#most-common-tags").append(`
            <li class='list-group-item d-flex justify-content-between align-items-center'>
                ${tag["tag"]}
                <span class='badge badge-success badge-pill'>${tag["times"]}</span>
            </li>`);
        });
    }
});
