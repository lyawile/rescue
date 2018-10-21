$(document).ready(function () {
    $(".navbar .menu").slimscroll({
        height: "200px",
        alwaysVisible: false,
        size: "3px"
    }).css("width", "100%");

    $(".region, .district, .centre").chosen({
        max_selected_options: 1,
        width: "200"
    });

    $(".region").on('change', function () {
        loadDistricts($(this).val());
    });

    $(".district").on('change', function () {
        loadCentres($(this).val());
    });

    $('.multi').chosen({
        width: '100%'
    });

    var a = $('a[href="<?php echo $this->request->webroot . $this->request->url ?>"]');
    if (!a.parent().hasClass('treeview') && !a.parent().parent().hasClass('pagination')) {
        a.parent().addClass('active').parents('.treeview').addClass('active');
    }
});

function loadDistricts(regionId) {
    $.ajax({
        url: 'districts/list-districts/' + regionId,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            const district = $('.district').empty(); //Clear select options
            $.each(data, function (key, value) {
                district.append($('<option>').attr('value', key).text(value));
            });

            district.trigger("chosen:updated");
        }
    });
}

function loadCentres(districtId) {
    $.ajax({
        url: 'centres/list-centres/' + districtId,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            const centre = $('.centre').empty(); //Clear select options
            $.each(data, function (key, value) {
               centre.append($('<option>').attr('value', key).text(value));
            });

            centre.trigger("chosen:updated");
        }
    });
}
