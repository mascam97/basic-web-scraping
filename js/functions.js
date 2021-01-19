function CleanCharacters(data){
    data = data.replace(/[í]/g, "i");
    data = data.replace(/[ó]/g, "o");
    data = data.replace(/[é]/g, "e");
    data = data.replace(/[ü]/g, "u");
    data = data.replace(/[â]/g, "a");
    data = data.replace(/[ä]/g, "a");
    data = data.replace(/[à]/g, "a");
    data = data.replace(/[å]/g, "a");
    data = data.replace(/[ê]/g, "e");
    data = data.replace(/[ë]/g, "e");
    data = data.replace(/[è]/g, "e");
    data = data.replace(/[ï]/g, "ò");
    data = data.replace(/[î]/g, "i");
    data = data.replace(/[ì]/g, "i");
    data = data.replace(/[Ä]/g, "A");
    data = data.replace(/[Å]/g, "A");
    data = data.replace(/[É]/g, "E");
    data = data.replace(/[æ]/g, " ");
    data = data.replace(/[á]/g, "a");
    data = data.replace(/[ô]/g, "o");
    data = data.replace(/[ö]/g, "o");
    data = data.replace(/[ò]/g, "o");
    data = data.replace(/[û]/g, "u");
    data = data.replace(/[ù]/g, "u");
    data = data.replace(/[ú]/g, "u");
    data = data.replace(/[ÿ]/g, "y");
    data = data.replace(/[Ö]/g, "O");
    data = data.replace(/[Ü]/g, "U");
    data = data.replace(/[ø]/g, "o");
    data = data.replace(/[£]/g, " ");
    data = data.replace(/[Ø]/g, "O");
    data = data.replace(/[×]/g, "x");
    data = data.replace(/[ƒ]/g, "f");
    data = data.replace(/[Á]/g, "A");
    data = data.replace(/[Í]/g, "I");
    data = data.replace(/[Ó]/g, "O");
    data = data.replace(/[Ú]/g, "U");
    data = data.replace(/[Ë]/g, "E");
    data = data.replace(/[Ï]/g, "I");
    data = data.replace(/[Ü]/g, "U");
    return data;
}

function GetTop10(array) {
    var words = new Array();
    for (var a = 0; a < array.length; a++) {
        if (words.indexOf(a) == -1) {
            if (words[array[a]] >= 1)
                words[array[a]]++;
            else
                words[array[a]] = 1;
        }
    }
    words.sort();

    var words_top = [];
    Object.keys(words).forEach(function (e) {
        words_top.push({
            word: e,
            times: words[e]
        });
    });
    words_top.sort(function (a, b) {
        return b.times - a.times;
    });
    var top_10_words = [];
    for (var a = 0; a < 10; a++) {
        top_10_words.push(words_top[a]);
    }
    return top_10_words;
}

function CleanInfo(data){
    // The data is proceced to return just key words
    
    // Get just the content in the body tag
    let regex_body = /(\<body.*?\/?\>(.|\n)*\<\/body>)/gms;
    var head_data = data.match(regex_body)[0];
    
    head_data = head_data.toLowerCase();

    // BUG: "<body " is deleted
    data_cleaned = "<body " + head_data;

    let filters = [
        /\<script.*?\>.*?\<\/script\>/gms,
        //"Gets the data in script tags and the tags "

        /\<style.*?\>.*?\<\/style\>/gms,
        //"Get the data in style tags and the tags " 

        /\<[a-z]+.*?\/\>/gms,
        // description: "Get single tags as <img src='' />" 

        /\<[a-z]+.*?\>/gms,
        //"Get opened tags as <table class=''>" 

        /\<\/[a-z0-9]+\>/g, //"Get closed tags as </table>" 

        /\W/g, //"Get no words, number or any no word" 

        /\s[\w\d]{1,2}\s/g,
        //"Get words with just one or two letters" 

        /(\r|\s{2,})/g,
         //"Get lines and groups of more than 2 spaces" 
    ];
    
    for (const i in filters) {
        // Get the filters and remplace with a space the considences
        data_cleaned = data_cleaned.replace(filters[i], " ");
      }

      return data_cleaned;
}