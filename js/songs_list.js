(function () {
    $(document).ready(function () {
        $('body').on('click', '.page-link', (event) => ShowSongsListOnPage(event.target.textContent));

    });

    function ShowSongsListOnPage(page)
    {
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
})();