$(function () {
    $('.container').click(function () {
        $('#signup').slideUp();
        $('#login').slideUp();
        $('#profile_').slideUp();
        $(".search_result").slideUp();
    });
    $('#toggle-login').click(function () {
        $('#login').slideToggle();
        $('#signup').slideUp();
    });
    $('#toggle-signup').click(function () {
        $('#signup').slideToggle();
        $('#login').slideUp();
    });
    $('.profile_').click(function () {
        $('#profile_').slideToggle();
        $(this).toggleClass('active');
    });
});

function editThis(id) {
    location = window.URL + "profile/edit?id=" + id;
}

function cancelThis(id) {
    location = window.URL + "profile?id=" + id;
}

function addFriend(id) {
    var date = new Date();
    date = date.getDate() + "/" + (date.getMonth() + 1 ) + "/" + date.getFullYear();
    location = window.URL + "index/addFriend?id=" + id + "&date=" + date;
    alert("Friend request sent");
}

function removeFriend(id) {
    location = window.URL + "index/removeFriend?id=" + id;
    alert("Friend removed successfully");
}