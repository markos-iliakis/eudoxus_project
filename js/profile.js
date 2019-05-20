$(function () {
    $('#student_uni_change').on('show.bs.modal', function () {
        // $('#student-extra-form').removeClass('d-none');
    });
});

$(function () {
    $('.uni-control').change(function () {
        if ($('.uni-control :selected').val() == "ekpa") {
            $('#ekpa-selection').removeClass('d-none');
        }
        else{
            $('#ekpa-selection').addClass('d-none');
        }
        if ($('.uni-control :selected').val() == "ntua") {
            $('#ntua-selection').removeClass('d-none');
        }
        else{
            $('#ntua-selection').addClass('d-none');
        }
        if ($('.uni-control :selected').val() == "aueb") {
            $('#aueb-selection').removeClass('d-none');
        }
        else{
            $('#aueb-selection').addClass('d-none');
        }
    });
});
