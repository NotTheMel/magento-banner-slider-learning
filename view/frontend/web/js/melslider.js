jQuery(document).ready(function(){

    var sliderId = jQuery('#slider_id').text();
    var $loader  = jQuery('#loading');
    $loader.show();
    //Slider using REST API
    getSliderRestAPI();

    //Slider using GraphQL API
    //getSliderGraphQl();

    /**
     * Gets slider using REST api
     */
    function getSliderRestAPI()
    {
        jQuery.ajax({
            url: 'rest/V1/banners?id=' + sliderId,
            type: 'get',
            success:
                function(result) {
                    $loader.hide();
                    //console.log(result);
                    console.log("rest api");
                    jQuery.each(result, function (index, banner){
                        console.log(banner.image);
                        jQuery('.owl-carousel').append(`<a href="#"><img src="${banner.image}" /></a>`)
                    });
                   loadOwlCarousel();
                },
            error: function (error) {
                console.log(error);
                $loader.text("Oops something went wrong loading slider..");
            }
        });
    }

    /**
     * Gets slider using graphql api
     */
    function getSliderGraphQl()
    {
        var query = `
                 query{
                      sliders(slider_id: ${sliderId})
                      {
                        banners{
                          banner_id
                          image
                        }
                      }
                    }`;
        jQuery.ajax({
            url: '/graphql',
            type: "GET",
            contentType: "application/json",
            data: {
                query: query
            },
            success: function (result){
                $loader.hide();
                console.log("graphql");
                jQuery.each(result.data.sliders.banners, function (index, banner){
                    console.log(banner.image);
                    jQuery('.owl-carousel').append(`<a href="#"><img src="${banner.image}" /></a>`)
                });
                loadOwlCarousel();
            },
            error: function (error){
                console.log(error);
            }
        });
    }

    /**
     * Load Owl carousel
     */
    function loadOwlCarousel() {
        var owl = jQuery("#slider-api");
        owl.owlCarousel({
            loop:true,
            items:1,
            autoplay: true,
        });
    }
});