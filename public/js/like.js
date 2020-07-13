$(document).ready(function () {
    $(document).on('click', '.like', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("href"),
            dataType: 'json',
            success: function (result) {
                if (result.status == 'success') {
                    if (result.liked == false) {
                        $('.status-like').addClass("status-liked");
                        $('.totalLike').html(result.likes);
                    } else {
                        $('.status-like').removeClass("status-liked");
                        $('.totalLike').html(result.likes);
                    }
                }
            },
            statusCode : {
                401: function () {
                    toastr.error('Please login to like this song', '', {
                        timeOut: 1000,
                        showMethod: 'slideDown'
                    });
                }
            }
        })
    });
    $(document).on('click', '#comment-submit', function (e) {
        e.preventDefault();
        var url = $(this).closest("form").attr("action");
        var comment = $(this).closest("form").find(".form-control").val();
        var token = $("input[name='_token']").val();
        var data = "_token=" + token + "&comment=" + comment;
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            success: function (result) {
                if (result.status == 'success') {
                    // var cmt = '';
                    // $.each(result.comment, function (key, value) {
                    //     cmt += '<div class="media mb-3" style="background-color: #383838; border-radius: 20px;">\n' +
                    //         '                &emsp;&emsp;&emsp;\n' +
                    //
                    //         '                    &emsp;&emsp;&emsp;&emsp;&emsp;\n' +
                    //         '                    <div class="media-body">\n' +
                    //         '                        <h4 class="media-heading user_name" style="color: red">'+value.user_id+'</h4>\n' +
                    //         '                        <span style="font-size: 20px; color: white">'+value.desc+'</span>\n' +
                    //         '\n' +
                    //         '                        <p class="pull-right mr-2" style="color: white"><small>'+value.created_at+'</small></p>\n' +
                    //         '                    </div>\n' +
                    //         '            </div>'
                    // });
                    // $(".comments-list").html(cmt);
                    var count = result.comment.length;
                    $.ajax({
                        url: window.location.href,
                        type: 'GET',
                        success: function (result) {
                            $(".comments-list").html($(result).find(".comments-list").html());
                            $(".total-cmt").html(count + " comments");
                            $('textarea.form-control').val("");
                        }
                    })
                }
            }
        })
    });
    $('.table').on('click', '.delete-song', function (e) {
        var songId = $(this).attr('data-id')
        e.preventDefault();
        $.ajax({
            url: $(this).attr("href"),
            dataType: 'json',
            success: function (result) {
                if (result.status == 'success') {
                    $('#user-song-' + songId).fadeOut('300');
                    toastr.success('Deleted Successfully', '', {
                        timeOut: 1000,
                    });
                }
            }
        })
    });
    $('.table').on('click', '.delete-song2', function (e) {
        var songId2 = $(this).attr('data-id')
        e.preventDefault();
        $.ajax({
            url: $(this).attr("href"),
            dataType: 'json',
            success: function (result) {
                if (result.status == 'success') {
                    $('#user-song2-' + songId2).fadeOut('300');
                    toastr.success('Deleted Successfully', '', {
                        timeOut: 1000,
                    });
                }
            }
        })
    })
})
