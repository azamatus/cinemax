/**
 * Created with JetBrains PhpStorm.
 * User: User
 * Date: 23.01.13
 * Time: 16:35
 * To change this template use File | Settings | File Templates.
 */
jQuery(function($)
{
    $("#carousel_catalog").rcarousel(
        {
            visible: 1,
            step: 1,
            speed: 500,
            navigation: {
                prev: "#slider-carousel-prev",
                next: "#slider-carousel-next"
            },
            auto:
            {
                enabled: false,
                interval: 1000
            },
            width: 865,
            height: 345,
            margin: 0,

            start: generatePages
        }
    );
    function generatePages()
    {
        var _total, i, _link;

        _total = $( "#carousel_catalog" ).rcarousel( "getTotalPages" );

        for ( i = 0; i < _total; i++ )
        {
            _link = $( "<a href='#'></a>" );

            $(_link)
                .bind("click", {page: i},

                function( event )
                {
                    $( "#carousel_catalog" ).rcarousel( "goToPage", event.data.page );
                    event.preventDefault();
                }

            )

        }

    }

});