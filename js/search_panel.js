$filter = null;

$(document).ready(function () {
    $(".dropdown-menu li a").click(function () {
        $filter = this.text;
        document.getElementById("search_concept").textContent = this.text;
    });
});

function showSearchValue()
{
    let search_by = document.getElementById("search_by").value;
    if (search_by !== null && search_by !== '') {
        removeElementsByClass('audios-wrapper');
        $.ajax({
            type: 'POST',
            url: 'find_song',
            data: ({"condition": $filter, "parameter": search_by}),
            success: function (data) {
                if (data) {
                    let newDiv = document.createElement("div");
                    newDiv.className = 'audios-wrapper';
                    document.body.lastChild.after(newDiv);
                    newDiv.innerHTML += data;
                }
            }
        });
    }
}

function removeElementsByClass(className)
{
    const elements = document.getElementsByClassName(className);
    while (elements.length > 0) {
        elements[0].parentNode.removeChild(elements[0]);
    }
}