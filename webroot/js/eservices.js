$(document).ready(function () {
    $(".navbar .menu").slimscroll({
        height: "200px",
        alwaysVisible: false,
        size: "3px"
    }).css("width", "100%");

    // $(".region, .district, .centre").chosen({
    //     width: "200"
    // });

    $('.region').chosen({
        width: '150'
    }).change(function () {
        $('.centre').find('option').not(':first').remove();
        $('.centre').trigger("chosen:updated");
        loadDistricts($(this).val());
    });

    $('.district').chosen({
        width: '200',
        allow_single_deselect: true
    }).change(function () {
        loadCentres($(this).val());
    });

    $('.centre').chosen({
        width: '250',
        allow_single_deselect: true
    }).change(function () {
        // reloadPage();
    });


    $('.reload').on('click', function () {
        reloadPage();
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
            const district = $('.district'); //Clear select options
            district.find('option').not(':first').remove();
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
            const centre = $('.centre'); //Clear select options
            centre.find('option').not(':first').remove();
            $.each(data, function (key, value) {
                centre.append($('<option>').attr('value', key).text(value));
            });

            centre.trigger("chosen:updated");
        }
    });
}

function reloadPage() {
    $.ajax({
        url: 'users/reload/?regionId=' + $('.region').val() + '&districtId=' + $('.district').val() + '&centreId=' + $('.centre').val(),
        // data: {
        //     regionId: $('.region').val(),
        //     districtId: $('.district').val(),
        //     centreId: $('.centre').val()
        // },
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data.response) {
                location.reload(true);
            }
        }
    });
}
