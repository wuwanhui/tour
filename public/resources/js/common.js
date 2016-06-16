$(function () {


    // 主菜单点击
    $('.page-header-nav-menu a').click(function () {
        $('.page-header-nav-menu a').removeClass('active');
        $(this).addClass('active');
        $('.page-side-menu a').removeClass('active');
        $('.page-side').children().hide();
        var modelName = $(this).attr('id');
        $('.page-side').children('.' + modelName).show();

    });

    // 左菜单点击
    $('.page-side-menu a').click(function () {
        $('.page-side-menu a').removeClass("active");
        $(this).addClass('active');
        var ii = layer.load()
        $("#main").load(function () {
            layer.close(ii);
        });
    });

    /* 定时隐藏提示信息 */
    $("#message").slideDown(200).delay(4000).slideUp(600);

    $('[data-toggle="popover"]').popover();

    $('.form-horizontal input').keypress(function (e) {
        if (e.which == 13) {
            if ($('.form-horizontal').validate().form()) {
                $('.form-horizontal').submit();
            }
            return false;
        }
    });
    /**
     * 反选
     *
     * items 复选框的name
     */
    function checkName(items) {
        alert(items);
        $('[name=' + items + ']:checkbox').each(function () {
            //直接使用js原生代码，简单实用
            this.checked = !this.checked;
        });
    }

    // $("#CheckAll").click(function () {
    //     if ($("input[name='CheckAll']").attr("checked") == "checked") {
    //         $("input[name='id']").attr("checked", "checked");
    //     } else {
    //         $("input[name='id']").removeAttr("checked", "checked");
    //     }
    //
    // });


});

// iframe自适应
function iFrameHeight() {

    var ifm = document.getElementById("main");

    var subWeb = document.frames ? document.frames["main"].document :

        ifm.contentDocument;

    if (ifm != null && subWeb != null) {

        ifm.height = subWeb.body.scrollHeight;

    }

}
