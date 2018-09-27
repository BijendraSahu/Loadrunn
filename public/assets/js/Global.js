/**
 * Created by Pinku Kesharwani on 12/01/2018.
 */
    $(document).ready(function () {
        $('.glo_menuclick').click(function (e) {
            var chkopen = $(this).find('.menu_basic_popup').attr('class');
            $('#setting_box_slide').removeClass('show_setting');
            if (chkopen != 'menu_basic_popup effect') {
                if (chkopen != 'menu_basic_popup menu_popup_setting effect') {
                    $('.menu_basic_popup').addClass('scale0');
                    $(this).find('.menu_basic_popup').removeClass('scale0');
                } else {
                    $('.menu_basic_popup').addClass('scale0');
                }
            } else {
                $('.menu_basic_popup').addClass('scale0');
            }
            e.stopPropagation();
        });
        $(document).click(function (e) {
            $('.menu_basic_popup').addClass('scale0');
            e.stopPropagation();
        });
    });
var append_this="<div onclick='GloCloseModel();' class='modal-backdrop fade in'></div>";
    function update_password() {
        $('#myModal_UpdatePassword').addClass('in');
        $('#myModal_UpdatePassword').show();
        $('body').append(append_this);
        $('body').addClass('modal-open');
    }
function Model_NewAdd() {
    $('#Modal_NewAdd').addClass('in');
    $('#Modal_NewAdd').show();
    $('body').append(append_this);
    $('body').addClass('modal-open');
}
function  GloCloseModel() {
    $('#Modal_NewAdd').hide();
    $('#myModal_UpdatePassword').hide();
    $('#Modal_NewAdd').removeClass('in');
    $('#myModal_UpdatePassword').removeClass('in');
    $('body').removeClass('modal-open');
    var thisbox=$('body').find('.modal-backdrop');
    $(thisbox).remove();
}
function LikeUnlike(dis) {
    var chk_like=$(dis).attr('class');
    var curr_count=Number($(dis).parent().find('.count_like').text());
    if (chk_like == 'heart') {
        $(dis).addClass('happy').removeClass('broken');
        $(dis).parent().find('.count_like').text(curr_count+1);
    }
    else if (chk_like == 'heart broken')
    {
        $(dis).addClass('happy').removeClass('broken');
        $(dis).parent().find('.count_like').text(curr_count+1);
    }else
    {
        $(dis).removeClass('happy').addClass('broken');
        $(dis).parent().find('.count_like').text(curr_count-1);
    }
}