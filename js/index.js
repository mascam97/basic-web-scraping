$("#look_top").hide();

$("#clean_data").click(function () {
    const text = CleanCharacters($("#text").text());
    const data_cleaned = CleanInfo(text);

    substring_array3 = data_cleaned.split(" ");
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
    for (var a = 1; a < substring_array3.length; a++) {
        for (var b = 0; b < omitted_words.length; b++) {
            if (substring_array3[a] == omitted_words[b])
                substring_array3[a] = " ";
        }
        total_content3 += " " + substring_array3[a];
    }
    $("#text").text(total_content3);
    $('#look_top').show();
});

$("#look_top").click(function () {
    let sim = /\s+/gi;
    var text = $("#text").text().trim().replace(sim, ' ').split(' ');

    var top_10_words = GetTop10(text);
    var content = "";
    top_10_words.forEach(function (word) {
        content += "<tr><th>" + word["word"] + "</th><th>" + word["times"] + "</th></tr>";
    });
    $("#top").html(content);
});
