$(function () {
    $("#search").keyup(function () {
        var search = $(this).val();
        if (search != '') {
            $.get(window.URL + "home/jquery_search", {'search': search}, function (o) {
                $(".search_result").html(o).slideDown();
            });
        }
        else {
            $(".search_result").html(null).slideUp();
        }
    });
});


function goThisProfile(id) {
    location = window.URL + "profile?id=" + id;
}
