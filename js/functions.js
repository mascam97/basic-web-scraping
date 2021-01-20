function CleanCharacters(data){
    data = data.replace(/[âäàåá]/gi, "a");
    data = data.replace(/[êëèé]/gi, "e");
    data = data.replace(/[ïîìí]/gi, "i");
    data = data.replace(/[ôöòóø]/gi, "o");
    data = data.replace(/[üûùú]/gi, "u");
    data = data.replace(/[ñ]/gi, "n");

    return data;
}

function DeleteWords(data){
    const words = [
            // spanish
            'de', 'la', 'en', 'el', 'y', 'e', 'ni', 'que', 'tanto', 'como',
            'ni', 'siquiera', 'no', 'solo', 'sino', 'tambien', 'pero', 'aunque', 'al',
            'contrario', 'en', 'cambio', 'sin', 'a', 'de', 'obstante', 'o', 'bien', 
            'sea', 'decir', 'esto', 'porque', 'ya', 'dado', 'debido', 'puesto',
            'como', 'si', 'con', 'tal', 'aunque', 'aun', 'pesar', 'fin', 'consiguiente', 
            'ende', 'tan', 'apenas', 'yo', 'mi', 'nos', 'me', 'nos', 'nosotros', 'nosotras', 
            'conmigo', 'te', 'ti', 'tu', 'os', 'usted', 'ustedes', 'vos',
            'vosotras', 'vosotros', 'contigo', 'el', 'ella', 'ello', 'ellos', 'las', 
            'lo', 'los', 'aquellas', 'aquellos', 'aquel', 'aquella', 'aquello', 'esas', 
            'esa', 'ese', 'esas', 'esos', 'eso', 'otro', 'otra', 'esta', 'estas',
            'este', 'estos', 'este', 'esto', 'mia', 'mias', 'mio', 'mios', 'nuestra', 
            'alguien', 'algunas', 'algunos', 'pasar', 'ultimos', 'asi', 'se', 'uno', 
            'mas', 'un', 'ser', 'para', 'mas', 'es', 'por', 'una', 'puede', 'del', 'su', 
            'son', 'fue', 'sus', 'ha',
            // english
            'and', 'the', 'for', 'with', 'you', 'that', 'are', 'they', 'our', 'him', 'her', 
            'your', 'this', 'those', 'these'
        ];

        for (var i = 0; i < words.length; i++) {
            var reg = new RegExp(" "+words[i]+" ","gi");
            data = data.replace(reg, " ");
        }

        return data;
}

function GetMostCommonTags(data){
   let regex = /\<([a-z0-9]+).*?\>/gms;
   const completed_tags = [...data.matchAll(regex)];

    var tags = new Array();
    for (var a = 0; a < completed_tags.length; a++) {
        if (tags.indexOf(a) == -1) {
            if (tags[completed_tags[a][1]] >= 1)
                tags[completed_tags[a][1]]++;
            else
                tags[completed_tags[a][1]] = 1;
        }
    }

    var tags_top = [];
    Object.keys(tags).forEach(function (e) {
        tags_top.push({
            tag: e,
            times: tags[e]
        });
    });
    tags_top.sort(function (a, b) {
        return b.times - a.times;
    });
    var most_common_tags = [];

    var ammount = 10;
    if(tags_top.length<10)
        ammount = tags_top.length;

    for (var a = 0; a < ammount; a++) {
        most_common_tags.push(tags_top[a]);
    }
    
    return most_common_tags;
}

function GetMostCommonWords(data) {
    var words = new Array();
    for (var a = 0; a < data.length; a++) {
        if (words.indexOf(a) == -1) {
            if (words[data[a]] >= 1)
                words[data[a]]++;
            else
                words[data[a]] = 1;
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

    var ammount = 10;
    if(words_top.length<10)
        ammount = tags_top.length;

    var most_common_words = [];
    for (var a = 0; a < 10; a++) {
        most_common_words.push(words_top[a]);
    }

    return most_common_words;
}

function CleanInfo(data){
    // The data is procesed to return just key words
    
    // Get just the content in the body tag
    let regex_body = /(\<body.*?\/?\>(.|\n)*\<\/body>)/gms;
    var head_data = data.match(regex_body)[0];
    
    head_data = head_data.toLowerCase();

    // BUG: "<body " is deleted in data.match(regex_body)[0]
    data_cleaned = "<body " + head_data;

    let filters = [
        /\<script.*?\>.*?\<\/script\>/gms,
        //"Gets the data in script tags and the tags "

        /\<style.*?\>.*?\<\/style\>/gms,
        //"Get the data in style tags and the tags " 

        /\<[a-z]+.*?\>/gms,
        //"Get opened tags as <table class=''>" 

        /\<\/[a-z0-9]+\>/g, //"Get closed tags as </table>" 

        /\W/g, //"Get no words, number or any no word" 

        /\s[a-z]{1,2}\s/g,
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