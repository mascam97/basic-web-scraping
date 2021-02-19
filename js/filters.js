export const RemoveHtmlCode = (htmlCode) => {

    let data = htmlCode.replace(/\<script.*?\>.*?\<\/script\>/gms, " ");
    //"Removes the data in script tags and the tags "

    data = data.replace(/\<style.*?\>.*?\<\/style\>/gms, " ");
    //"Remove the data in style tags and the tags "

    data = data.replace(/\<[a-z]+.*?\>/gms, " ");
    //"Remove opened tags as <table class=''>"     

    data = data.replace(/\<\/[a-z0-9]+\>/g, " ");
    //"Remove closed tags as </table>" 

    data = data.replace(/(\r|\s{2,})/g, " ");
    //"Remove lines and groups of more than 2 spaces" 

    data = data.replace(/^\s/g, "");
    //" If there is an space at the beginning, it is deleted

    data = data.replace(/\s$/g, "");
    //" If there is an space at the final it is deleted

    return data;
}

export const ClearInfo = (text) => {

    let data = text.replace(/\W/g, " ");
    //"Get no words, number or any no word"

    data = data.toLowerCase();
    // Use just lower case

    data = data.replace(/\s[a-z]{1,2}\s/g, " ");
    data = data.replace(/^[a-z]{1,2}\s/g, " ");
    data = data.replace(/\s[a-z]{1,2}$/g, " ");
    //"Get words with just one or two letters" 

    data = data.replace(/(\r|\s{2,})/g, " ");
    //"Get lines and groups of more than 2 spaces" 

    data = data.replace(/^\s/g, "");
    //" If there is an space at the beginning, it is deleted

    data = data.replace(/\s$/g, "");
    //" If there is an space at the final it is deleted

    return data;
}

export const ReplaceCharacters = (words) => {
    data = words.replace(/[âäàåá]/gi, "a");
    data = data.replace(/[êëèé]/gi, "e");
    data = data.replace(/[ïîìí]/gi, "i");
    data = data.replace(/[ôöòóø]/gi, "o");
    data = data.replace(/[üûùú]/gi, "u");
    data = data.replace(/[ñ]/gi, "n");

    return data;
}

export const DeleteWords = (data) => {
    const words = [
        // TODO: check well the common words with an investigation
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
        var reg = new RegExp(" " + words[i] + " ", "gi");
        data = data.replace(reg, " ");
    }

    return data;
}