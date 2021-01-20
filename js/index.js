$( document ).ready(function() {
    const text = $("#text").text();
    if(text!=''){
        var data_cleaned = text;

        // Replace characters like ó for just o
        var data_cleaned = CleanCharacters(data_cleaned);
        // Delete some words like el, la, y, no, etc
        var data_cleaned = DeleteWords(data_cleaned);
        // Delete tags, short words (1-2 letters), etc.
        var data_cleaned = CleanInfo(data_cleaned);
        $("#info").text(data_cleaned);

        var most_common_words = GetMostCommonWords(data_cleaned.trim().replace(/\s+/gi, ' ').split(' '));
        var content = "";
        most_common_words.forEach(function (word) {
            content += "<li class='list-group-item d-flex justify-content-between align-items-center'>" + word["word"] + "<span class='badge badge-primary badge-pill'>" + word["times"] + " </span></li>";
        });
        $("#most-common-words").html(content);
    }
});