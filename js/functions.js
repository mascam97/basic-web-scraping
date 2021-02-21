export const GetMostCommonTags = (data) => {
    let regex = /\<([a-z0-9]+).*?\>/gms;
    const completed_tags = [...data.matchAll(regex)];

    let tags = new Array();
    for (let a = 0; a < completed_tags.length; a++) {
        if (tags.indexOf(a) == -1) {
            if (tags[completed_tags[a][1]] >= 1)
                tags[completed_tags[a][1]]++;
            else
                tags[completed_tags[a][1]] = 1;
        }
    }

    let tags_top = [];
    Object.keys(tags).forEach(function (e) {
        tags_top.push({
            tag: e,
            times: tags[e]
        });
    });
    tags_top.sort(function (a, b) {
        return b.times - a.times;
    });
    let most_common_tags = [];

    let ammount = 10;
    if (tags_top.length < 10)
        ammount = tags_top.length;

    for (let a = 0; a < ammount; a++) {
        most_common_tags.push(tags_top[a]);
    }

    return most_common_tags;
}

export const GetMostCommonWords = (data) => {
    data = data.trim().split(' ');
    let words = new Array();
    for (let a = 0; a < data.length; a++) {
        if (words.indexOf(a) == -1) {
            if (words[data[a]] >= 1)
                words[data[a]]++;
            else
                words[data[a]] = 1;
        }
    }
    words.sort();

    let words_top = [];
    Object.keys(words).forEach(function (e) {
        words_top.push({
            word: e,
            times: words[e]
        });
    });
    words_top.sort(function (a, b) {
        return b.times - a.times;
    });

    let ammount = 10;
    if (words_top.length < 10)
        ammount = words_top.length;

    let most_common_words = [];
    for (let a = 0; a < 10; a++) {
        most_common_words.push(words_top[a]);
    }

    return most_common_words;
}

export const GetBody = (data) => {
    // Get just the content in the body tag
    const regex_body = /(\<body.*?\/?\>(.|\n)*\<\/body>)/gms;
    let head_data = data.match(regex_body)[0];

    return head_data;
}
