$(document).ready(function () {
    $('.like').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("data-title"),
            type: 'get',
            dataType: 'json',
            success: function (result) {
                if (result.status) {
                    $('.status-like').removeClass("icon-like");
                    $('.status-like').addClass("fa fa-thumbs-o-down");
                } else {
                    $('.status-like').removeClass("fa fa-thumbs-o-down");
                    $('.status-like').addClass("icon-like");
                }
                console.log(result.likes);
                $(this).children("ins").html(result.likes);
            }
        })
    })
})
