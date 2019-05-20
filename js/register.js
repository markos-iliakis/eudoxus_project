$('#user-role')
  .dropdown()
;



$(function () {
    $('.user-type').change(function () {
        if ($('.user-type :selected').val() == "student") {
            $('#student-extra-form').removeClass('d-none');
            $('.publisher-form-control').removeAttr('required');
        }
        else{
            $('#student-extra-form').addClass('d-none');
        }
        if ($('.user-type :selected').val() == "publisher") {

            $('#publisher-extra-form').removeClass('d-none');
        }
        else{
            $('#publisher-extra-form').addClass('d-none');
        }
        if ($('.user-type :selected').val() == "secretary") {

            $('#secretary-extra-form').removeClass('d-none');
        }
        else{
            $('#secretary-extra-form').addClass('d-none');
        }
        if ($('.user-type :selected').val() == "provider") {

            $('#provider-extra-form').removeClass('d-none');
        }
        else{
            $('#provider-extra-form').addClass('d-none');
        }

        if ($('.user-type :selected').val() == "distributor") {

            $('#distributor-extra-form').removeClass('d-none');
        }
        else{
            $('#distributor-extra-form').addClass('d-none');
        }
        if ($('.user-type :selected').val() == "library") {

            $('#library-extra-form').removeClass('d-none');
        }
        else{
            $('#library-extra-form').addClass('d-none');
        }

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
