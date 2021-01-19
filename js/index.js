$(".look_top").hide();

$(".clean_code").click(function () {
    var newstringreplaced = CleanCharacteres($("#text").text());
    
    var newstringreplaced = newstringreplaced.replace(/</gi, "++#<");
    var substring_array = newstringreplaced.split("++#");
    var total_content = "";
    for (var a = 1; a < substring_array.length; a++) {
        if ((substring_array[a - 1].indexOf("<style") == -1) && (substring_array[a - 1].indexOf("<script") == -1)) {
            if (substring_array[a].indexOf("</") == 0)
                total_content += " " + substring_array[a - 1];
        }
        var space = "";
        var lowcases = total_content.toLowerCase();

        substring_array2 = lowcases.split(space);
        var total_content2 = "";
    }

    const omitted_characters = ['.', ',', '(', ')', '»', '«', ':', ';', '?', '/', '!', '|', '=', '+', '¿', '[', ']', '-', '_', '~', '&', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '?', '#', '¡', '@', '"', '>', '<', "'", '...', '●', '%', '*', '+', '^', '`', '{', '}', 'Ç', '¶'];
    var carry_on = false;
    for (var a = 1; a < substring_array2.length; a++) {
        if (substring_array2[a] == "<") {
            carry_on = false;
        }
        if (substring_array2[a] == ">") {
            carry_on = true;
            continue;
        }
        if (carry_on == true) {
            for (var b = 0; b < omitted_characters.length; b++)
                if (substring_array2[a].indexOf(omitted_characters[b]) != -1)
                    substring_array2[a] = " ";
            total_content2 += substring_array2[a];
        }
    }
    space = " ";
    substring_array3 = total_content2.split(space);
    var total_content3 = "";
    const omitted_words = ['de', 'la', 'en', 'el', '&nsbp', 'y', 'e', 'ni', 'que', 'tanto', 'como',
        'ni', 'siquiera', 'no', 'solo', 'sino', 'tambien', 'pero', 'aunque', 'al', 'contrario', 'en', 'cambio',
        'sin', 'a', 'de', 'obstante', 'o', 'bien', 'sea', 'decir', 'esto', 'porque', 'ya', 'dado', 'debido', 'puesto',
        'como', 'si', 'con', 'tal', 'aunque', 'aun', 'pesar', 'fin', 'consiguiente', 'ende', 'tan', 'apenas', 'yo', 'mi',
        'nos', 'me', 'nos', 'nosotros', 'nosotras', 'conmigo', 'te', 'ti', 'tu', 'os', 'usted', 'ustedes', 'vos',
        'vosotras', 'vosotros', 'contigo', 'el', 'ella', 'ello', 'ellos', 'las', 'lo', 'los', 'aquellas', 'aquellos',
        'aquel', 'aquella', 'aquello', 'esas', 'esa', 'ese', 'esas', 'esos', 'eso', 'esotro', 'esotra', 'esta', 'estas',
        'este', 'estos', 'este', 'esto', 'mia', 'mias', 'mio', 'mios', 'nuestra', 'alguien', 'algunas', 'algunos',
        'ultimas', 'ultimos', 'asi', 'se', 'uno', 'mas', 'un', 'ser', 'para', 'mas', 'es', 'por', 'una', 'puede', 'del', 'su', 'son', 'fue', 'sus', 'ha'
    ];
    var carry_on = false;
    for (var a = 1; a < substring_array3.length; a++) {
        for (var b = 0; b < omitted_words.length; b++) {
            if (substring_array3[a] == omitted_words[b])
                substring_array3[a] = " ";
        }
        total_content3 += " " + substring_array3[a];
    }
    $("#text").text(total_content3);
    $('.look_top').show();
});

$(".look_top").click(function () {
    var sim = /\s+/gi;
    var text = $("#text").text().trim().replace(sim, ' ').split(' ');

    var top_10_words = GetTop10(text);
    var content = "";
    top_10_words.forEach(function (word) {
        content += "<tr><th>" + word["word"] + "</th><th>" + word["times"] + "</th></tr>";
    });
    $("#top").html(content);
});
