$(document).ready(function () {
    function refreshWidget() {
        var widget_path = base_url+"bin/widget";//TODO:Перевести на js_router
        $.ajax({
            url:widget_path,
            success:function (data) {
                $("#bin_widget").html(data);
            }
        });
    }

    $(document).on('click','.korzina',function () {
        var path = $(this).attr("href");
        var amount = 1, discPage = false;
//        if ($(this).hasClass('button_buy_bin')){
//            $amount = parseInt($('#amount').val());
//            discPage = true;
//        }
        $.ajax({
            url:path,
            data:{ amount: amount, discPage : discPage  },
            success:function (data) {
                $('#disc-added').html(data).dialog(
                        {
                            closeText: "",
                            height: 370,
                            width: 265,
                            show: 'fadeIn',
                            hide: 'fadeOut',
                            draggable: true

                        }
                    );
                refreshWidget();
            }
        });
    });

    $(".disc_add").click(function () {
        var input = $(this).prev('.disc_input');
        var amount = input.val();
        amount++;
        input.val(amount);
        discTotal(input,amount);
     });
    $(".disc_rem").click(function () {
        var input = $(this).next('.disc_input');
        var amount = input.val();
        if (amount > 1)
            amount--;
        input.val(amount);
        discTotal(input,amount);
    });
    function discTotal(input,amount){

        var html_price = input.nextAll('.disc_total_price').children('.som');
        var price = 40;
        html_price.html(price * amount);
        calculate();

    }

    function calculate() {
        var sumPrice = 0;
        $('.bin_table').find('tr[id]').each(function (i, el) {
            var value = $(this).children('td:last').find('.som').html();
            sumPrice += parseInt(value);
        });
        $('.total_value').html(sumPrice.toString());
    }


    $(".bin_remove_disc").click(function(){
        if (confirm("Вы действительно хотите удалить диск?")){
            var id = $(this).data('id'),
                url = Routing.generate("cinemax_bin_delete_disc", { "id" : id });
            $.ajax({
                url:url,
                error:function(){
                    alert('error');
                },
                success:function (data) {
                    $("#"+id).remove();
                    calculate();
                    refreshWidget();
                }
            });
        }
        return false;
    });

    $('.disc_input').bind("change blur", function(){
        var val = $(this).val();
        val = val.replace(/[^\d]/gi, '');
        $(this).val(val);

        discTotal($(this), val);
    });
});