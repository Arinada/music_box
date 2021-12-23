let filter = null;

$(document).ready(function () {
    $(".dropdown-menu li a").click(function () {
        setFilterValue(this.text);
        document.getElementById("search_concept").textContent = this.text;
    });
});

function ShowSearchedSongsOnPage(page)
{
    let search_by = document.getElementById("search_by").value;
    if (search_by === null) {
        search_by = '';
    }

    removeElementsByClass('audios-wrapper');
    $.ajax({
        type: 'POST',
        url: 'find_song',
        data: ({"condition": filter, "parameter": search_by, "page": page}),
        success: function (audios_html) {
            renderAudioElements(audios_html)
        }
    });
}

function ShowSongsListOnPage(page)
{
    //alert(search_by + '  ' + page + $filter);
    removeElementsByClass('audios-wrapper');

    $.ajax({
        type: 'POST',
        url: 'songs_list/page',
        data: ({"page": page}),
        success: function (audios_html) {
            renderAudioElements(audios_html)
        }
    });
}

/*function ShowSearchedSongs()
{
    let search_by = document.getElementById("search_by").value;
    if (search_by !== null && search_by !== '') {
        removeElementsByClass('audios-wrapper');
        $.ajax({
            type: 'POST',
            url: 'find_song',
            data: ({"condition": filter, "parameter": search_by}),
            success: function (audios_html) {
                renderAudioElements(audios_html)
            }
        });
    }
}*/

function setFilterValue(new_filter)
{
    filter = new_filter;
}
