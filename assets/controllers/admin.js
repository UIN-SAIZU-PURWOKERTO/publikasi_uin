'use strict';

$('.checklist').on('click', function() {
    const link = $(this).data('link');
    const userlevelid = $(this).data('userlevelid');
    const kode_menu = $(this).data('kode');

    $.ajax({
        url: baseUrl + "/admin/changeaccess",
        type: 'post',
        data: {
            link: link,
            userlevelid: userlevelid,
            kode_menu: kode_menu
        },
        success: function() {
            document.location.href = userlevelid;
        }
    });

});

$('.reload').on('change', function() {
    const link = $("#dd_redirect").val();
    const userlevelid = $("#userlevelid").val();

    $.ajax({
        url: baseUrl + "/admin/aksesredirect",
        type: 'post',
        data: {
            link: link,
            userlevelid: userlevelid
        },
        success: function() {
            document.location.href = userlevelid;
        }
    });

});