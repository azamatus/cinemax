$(document).ready(function(){
    $('#projectors').bind('mouseover mouseleave', function(event){
        if(event.type == 'mouseover'){
            $('.projectors_light').fadeIn('slow');
        }
        else {
            $('.projectors_light').fadeOut('slow');
        }
    });
    $(document).on('click','#menu_bounce',function(){
       $(this).effect('bounce',{times:3},'slow');
    });
    $('#login').bind('focus blur', function(event){
            if(event.type == 'focus'){
                 if(this.value == 'Введите свой логин')
                 { this.value = ''; }
            }
            if(event.type == 'blur'){
                if(this.value == '')
                { this.value = 'Введите свой логин'; }
            }
      }
    );

    $('#password').bind('focus blur', function(event){
        if(event.type == 'focus'){
            if(this.value == 'password')
            { this.value = '';}
        }
        if(event.type == 'blur'){
            if(this.value == '')
            { this.value = 'password';}
        }
    });

        $(".disc").hover(

            function(){
                $(this).find('.trigger').stop(true,true);
                $(this).find('.trigger').fadeIn();
            },

            function(){
                $(this).find('.trigger').stop(true,true);
                $(this).find('.trigger').fadeOut();
            }
        );

//    Sorting
        $('.sort_header').click(function(){
            $(this).next('.layout_sort').toggle("slide");
        });

        $("#zoom").elevateZoom({
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500,
            lensFadeIn: 500,
            lensFadeOut: 500,
            easing : true
        });

    $(".trailer").colorbox({rel:'group1', transition:"elastic", width:"45%", minHeight:"75%", current: false});
});

