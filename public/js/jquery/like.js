$(document).ready(function () {
    $(".like").click(function () {
        $("#like").css("color", "#147eff");
        $("#like").attr("title", "Unlike");
        $(this).attr("id", "unlike");
        $('#unlike').click(function () {
            $("#unlike").css("color", "#ffffff");
            $("#unlike").attr("title", "Like");
            $(this).attr("id", "like");
        });
    });
});
