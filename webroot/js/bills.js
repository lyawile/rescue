$(document).ready(function () {
    var amount = 0, quantity = 0;
    $('.service > .actions > a ').css("color", "green");
    $(document).on('click', '.service > .actions > a ', function (event) {
        event.preventDefault();
        var numberOfServices = $('.service').size();
        if (numberOfServices == 1) {
            $('.service > .actions > a ').addClass("fa-minus");
        } else {
            $(this).closest('tr').remove();
        }
        $('.service > .actions > a ').addClass("fa-minus");
        console.log("current" + numberOfOptions);
    });
    // print bill
    $('.print').click(function (e) {
        e.preventDefault();
        window.print();
    });
    $('.addService').on('click', function (e) {
        e.preventDefault();
        var serviceBox = $('.service').html();
        $('.table').append('<tr class="service">' + serviceBox + '</tr>');
    });
    $(document).on('change', 'select', function () {
        var position = $('#serviceSelect option:selected').index();
        amount = $('p.index' + position).text();
        $('p.form-control').text(quantity * amount);
    });
    $(document).on('keyup mouseup', '#quantity', function () {
//        alert();
        quantity = $(this).val();
        $('p.form-control').text(quantity * amount);
    });

});


