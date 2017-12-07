$(document).ready(function () {
    $("#logout").click(function () {
        $.ajax({
            url: "/logout",
            type: "post",
            data: {},
            dataType: "json",
            success: function (html) {
                if (html.type == 'true') {
                    window.location.back("/");
                } else {
                    alert(html.msg);
                }
            }
        });
    });
});