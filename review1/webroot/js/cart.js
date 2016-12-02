/**
 * Created by Vuilniss on 11/09/2016.
 */

$(document).ready(function(){



  $('.grid li').on('click', function() {
    $(this).addClass('active').siblings().removeClass('active');

    $('.numeric1').on('keypress', function(event) {
        if (event.keyCode == 13) {
            return true;
        }
        return (/\d/.test(String.fromCharCode(event.keyCode)));
    });

    $('.numeric').on('keyup change', function(event) {

        var quantity = Math.round($(this).val());

        if ((event.keyCode == 46 || event.keyCode == 8) && quantity > 0) {
        } else {
            if(/\d/.test(String.fromCharCode(event.keyCode)) === false) {
                return false;
            }
        }

        ajaxcart($(this).attr("data-id"), quantity, $(this).attr("data-mods"));

    });


    function ajaxcart(id, quantity, mods) {

        if(quantity === 0) {
            $('#row-' + id).fadeOut(1000, function(){ $('#row-' + id).remove(); });
        }

        $.ajax({
            type: "POST",
            url: Shop.basePath + "shop/itemupdate",
            data: {
                id: id,
                mods: mods,
                quantity: quantity
            },
            dataType: "json",
            success: function(data) {
                $.each(data.OrderItem, function(key, value) {
                    if($('#subtotal_' + key).html() != value.subtotal) {
                        $('#ProductQuantity-' + key).val(value.quantity);
                        $('#subtotal_' + key).html(value.subtotal).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
                    }
                });
                $('#subtotal').html('$' + data.Order.total).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
                $('#total').html('$' + data.Order.total).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
                if(data.Order.total === 0) {
                    window.location.replace(Shop.basePath + "shop/clear");
                }
            },
            error: function() {
                window.location.replace(Shop.basePath + "shop/clear");
            }
        });
    }

});
