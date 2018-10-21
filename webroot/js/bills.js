/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $(".navbar .menu").slimscroll({
        height: "200px",
        alwaysVisible: false,
        size: "3px"
    }).css("width", "100%");

    var a = $('a[href="<?php echo $this->request->webroot . $this->request->url ?>"]');
    if (!a.parent().hasClass('treeview') && !a.parent().parent().hasClass('pagination')) {
        a.parent().addClass('active').parents('.treeview').addClass('active');
    }
    //        Javascript for adding and removing services -- Will be removed later
    $('.service > .actions > a ').css("color", "green");
    var totalNumberOfOptions = $('select option').size() - 1;
    $(document).on('click', '.service > .actions > a ', function (event) {
        event.preventDefault();
        var numberOfOptions = $('select option').size() - 1;

        if ($(this).hasClass('fa-plus')) {
            if (numberOfOptions > totalNumberOfOptions) {
                $(".instruction").before('<p style="color: red">You can not add more options</p>');
                $(this).click(function () {
                    return false;
                });
            } else {
                var serviceBox = $('.service').html();
                $('.table').append('<tr class="service">' + serviceBox + '</tr>');
            }

        } else {
            $(this).closest('tr').remove();
        }

        $('.service > .actions > a ').removeClass("fa-plus");
        $('.service > .actions > a ').addClass("fa-minus");
        $('.service > .actions > a:last ').removeClass("fa-minus");
        $('.service > .actions > a:last ').addClass("fa-plus");

        console.log("current" + numberOfOptions);
        console.log("fixed" + totalNumberOfOptions);
//                    console.log(serviceBox[0]);
    });
    // print bill
    $('.print').click(function (e) {
        e.preventDefault();
        window.print();
    });
});

