$ = require('jquery');
require('bootstrap');

require('@coreui/chartjs');
coreui = require('@coreui/coreui');
require('prismjs');
require('@coreui/utils');

require('perfect-scrollbar');

require('simplebar');

function table_responsive() {
    $('.table-responsive-stack').each(function (i) {
        var id = $(this).attr('id');
        $(this).find("th").each(function (i) {
            $('#' + id + ' td:nth-child(' + (i + 1) + ')').prepend('<span class="table-responsive-stack-thead">' + $(this).text() + ':</span> ');
            $('.table-responsive-stack-thead').hide();
        });
    });
    $('.table-responsive-stack.online').each(function () {
        var thCount = $(this).find("th").length;
        var rowGrow = 100 / thCount + '%';
        //console.log(rowGrow);
        $(this).find("th, td").css('flex-basis', rowGrow);
    });
    function flexTable() {
        if ($(window).width() < 768) {
            $(".table-responsive-stack").each(function (i) {
                $(this).find(".table-responsive-stack-thead").show();
                $(this).addClass("online");
                $(this).find('thead').hide();
            });
            // window is less than 768px
        } else {
            $(".table-responsive-stack").each(function (i) {
                $(this).find(".table-responsive-stack-thead").hide();
                $(this).removeClass("online");
                $(this).find('thead').show();
            });
        }
        // flextable
    }
    flexTable();
    window.onresize = function (event) {
        flexTable();
    };
}
window.addEventListener('jquery', event => {
    table_responsive();
});
$(function () {
    table_responsive();
});
