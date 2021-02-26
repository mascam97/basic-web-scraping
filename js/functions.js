export const GetTagsAsText = (data) => {
    let regex = /\<([a-z0-9]+).*?\>/gms;
    const completed_tags = [...data.matchAll(regex)];

    let string_tags = '';
    completed_tags.forEach( ( tag ) => {
        string_tags += `${tag[1]} `;
      });

    return string_tags;
}

export const GetWordsAndRepetitions = (data) => {
    
    data = data.trim().split(' ');
    let words = {};

    // create an object {word_1:times_1, word_n:times_n}
    data.forEach( ( word ) => {
        words[ word ] = ( words[ word ] || 0 ) + 1;
      });

    // format the data in array with objects [{word:name_1,times:time_1}, {word:name_n,times:times_n}]
    let words_array = [];
    Object.keys(words).forEach(function (e) {
        words_array.push({
            word: e,
            times: words[e]
        });
    });
    
    words_array.sort(function (a, b) {
        return b.times - a.times;
    });

    return words_array;
}

export const GetBody = (data) => {
    // Get just the content in the body tag
    const regex_body = /(\<body.*?\/?\>(.|\n)*\<\/body>)/gms;
    let head_data = data.match(regex_body)[0];

    return head_data;
}
