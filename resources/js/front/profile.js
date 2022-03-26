$(document).ready(function () {
    $(document).on('change', '#profile', function () {
        $(document).find('#profile_pic_form').submit();
    });

    //edit profile
    $(document).on('click', '#edit_profile_btn', function () {
        $(document).find('._edit_profile_control').show();
        $(this).hide();
    });

    $(document).on('click', '#cancel_profile_btn', function () {
        $(document).find('._edit_profile_control').hide();
        $(document).find('#edit_profile_btn').show();
    });
});
