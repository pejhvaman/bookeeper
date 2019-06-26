<?php
require('sabad.php');
require('next_step.php');
?>

<script>
    function updateBasket(basketId, num, tag) {
        var chosenLi = $(tag);
        var textOpt = chosenLi.text();
        $('.option_selected').text(textOpt);
        var url = 'showcart/updatebasket';
        var data = {'basketId': basketId, 'tedad': num};
        $.post(url, data, function (msg) {
            $basket = msg[0];
            $totPrice = msg[1];
            createBasketList(msg[0], msg[1]);
        }, 'json');
        sessionForTotPrice();
    }

    function deleteBasket(basketId) {
        var url = 'showcart/deletebasket/' + basketId;
        var data = {};
        $.post(url, data, function (msg) {
            $basket = msg[0];
            $totPrice = msg[1];
            createBasketList(msg[0], msg[1]);
        }, 'json');
    }

    function createBasketList(basket, totAllPrice) {
        /*var i;
        for (i=1;i<31;i++){
            var liTags = '<li onclick="updateBasket(' + value['basketId'] + ', '+i+')"></li>';
        }
        alert(liTags);*/
        $('table tbody tr').remove();
        $.each(basket, function (index, value) {
            var trTag = '<tr><td><span class="delete_prod" onclick="deleteBasket(' + value['basketId'] + ')"></span></td><td style="width: 380px"><div class="right_img"><img src="public/images/books/' + value['id'] + '/book_100.jpg"></div><div class="left_title"><p>' + value['esm'] + '</p><p>' + value['nevisande'] + '</p><p>' + value['entInfo']['nam'] + '</p></div></td><td><div class="choose_option" onclick="openOptions(this)"><span class="option_selected">' + value['tedad'] + '</span><ul class="nashers"><li onclick="updateBasket(' + value['id'] + ', 1)">1</li><li onclick="updateBasket(' + value['id'] + ', 2)">2</li></ul></div></td><td class="one_price">مبلغ واحد:<br>' + value['gheymat'] + '</td><td class="all_price">مبلغ کل:<br>' + value['gheymat'] * value['tedad'] + '</td></tr>';
            $('table tbody').html(trTag);
        });
        //var finalPrice = totAllPrice;
        $('#totPrice').text(totAllPrice);
    }

    function openOptions(tag) {
        $(tag).find('.nashers').slideToggle(100);
    }

    $('.nashers li').click(function () {
        var textOpt = $(this).text();
        $('.option_selected').text(textOpt);
        sessionForTotPrice();
        //window.location = "showcart";
    });
    //////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////
    function sessionForTotPrice() {
        var exTotalPrice = $('#totPrice').text();
        exTotalPrice = parseInt(exTotalPrice);
        var url = "showcart/session_for_totPrice";
        var data = {'totPrice': exTotalPrice};
        $.post(url, data, function (msg) {
            console.log(msg);
        });
    }
    sessionForTotPrice();
</script>

