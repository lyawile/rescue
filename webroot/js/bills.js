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
        getTotal();
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
        var position = $(this).find('option:selected').index();
        amount = $('span.index' + position).text();
//        alert(amount);
        quantity = $(this).closest('tr').find('#quantity').val();
        $(this).closest('tr').find('p').text(quantity * amount)
//        $('p.form-control').text(quantity * amount);
        if (position === 0) {
            $(this).closest('tr').find('p').text('-')
        }
        getTotal();
    });
    $(document).on('keyup mouseup', '#quantity', function () {
        quantity = $(this).val();
        // update amount
        var position = $(this).closest('tr').find('#serviceSelect option:selected').index();
        amount = $('span.index' + position).text();
        console.log(amount);
        var maxInt = 222222;
        var random = Math.floor(Math.random() * maxInt);
        var addedClass = 'test' + random;
        $(this).addClass(addedClass);
        $(this).closest('tr').find('p').addClass(addedClass).text(quantity * amount);
        getTotal();
    });



});
function getTotal() {
     total = 0;
    $('table tr.service p').each(function () {
        $(this).each(function () {
            total += parseInt($(this).text());
        });
        $('.total>span:last-child').text(total);
        console.log("The total is:" + total);

    });
}


