$(function () {
    $('.container').click(function () {
        $('#signup').slideUp();
        $('#login').slideUp();
        $('#profile_').slideUp();
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
