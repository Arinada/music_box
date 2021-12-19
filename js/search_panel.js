/*$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);
    });
});*/

$(document).ready(function() {
    $(".dropdown-menu li a").click(function() {
        document.getElementById("search_concept").textContent = this.text;
      //  alert( this.text);
    });
});

function showSearchValue() {
    $search_by = document.getElementById("search_by").value;
    alert($search_by);
}
