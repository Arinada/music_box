(function () {
    let filter = null;

    $(document).ready(function () {
        $(".dropdown-menu li a").click(function () {
            setFilterValue(this.text);
            document.getElementById("search_concept").textContent = this.text;
        });

        let search_btn = document.getElementById('search_btn');
        if (search_btn) {
            search_btn.addEventListener("click", () => ShowSearchedSongsOnPage(1));
        }

        $('body').on('click', '.page-link', (event) => ShowSearchedSongsOnPage(event.target.textContent));

    });

    function ShowSearchedSongsOnPage(page)
    {
        let search_by = null;
        if (document.getElementById("search_by")) {
            search_by = document.getElementById("search_by").value;
        }
        if (search_by !== null && search_by !== '') {
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
    }

    function setFilterValue(new_filter)
    {
        filter = new_filter;
    }
})();


