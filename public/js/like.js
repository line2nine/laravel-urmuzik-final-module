$(document).ready(function () {
    $(document).on('click', '.like', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("href"),
            type: 'get',
            dataType: 'json',
            success: function (result) {
                console.log(result);
                if (result.status == false) {
                    $('.status-like').addClass("status-liked");
                    $('.totalLike').html(result.likes);
                } else {
                    $('.status-like').removeClass("status-liked");
                    $('.totalLike').html(result.likes);
                }
                console.log(result.likes);
            }
        })
    });
    $(document).on('click', '#comment-submit', function (e) {
        e.preventDefault();
        var url = $(this).closest("form").attr("action");
        var comment = $(this).closest("form").find(".form-control").val();
        var token = $("input[name='_token']").val();
        var data = "_token="+token+"&comment="+comment;
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            success: function (result) {
                if (result.status == 'success') {
                    console.log(result.comment);
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
                            $(".total-cmt").html(count+" comments");
                            $('textarea.form-control').val("");
                        }
                    })
                }
            }
        })
    })
})
