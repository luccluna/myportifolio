(function($){
    "use strict";

    $(document).ready(function() {

        var $window = $(window),
            $body = $('body'),
            isRtl = $body.hasClass('rtl');

        /*-----------------------------------------------------------------------------------*/
        /* For RTL Languages
         /*-----------------------------------------------------------------------------------*/
        if( $('body').hasClass('rtl') ) {
            $('.contact-number .fa-phone,' +
                '.more-details .fa-caret-right').addClass('fa-flip-horizontal');
        }

        /*-----------------------------------------------------------------------------------*/
        /* Cross Browser
        /*-----------------------------------------------------------------------------------*/
        $('.property-item .features span:last-child').css('border', 'none');
        $('.dsidx-prop-title').css('margin','0 0 15px 0');
        $('.dsidx-prop-summary a img').css('border','none');


        /*-----------------------------------------------------------------------------------*/
        /* Main Menu Dropdown Control
        /*-----------------------------------------------------------------------------------*/
        $('.main-menu ul li').hover(function(){
            $(this).children('ul').stop(true, true).slideDown(200);
        },function(){
            $(this).children('ul').stop(true, true).delay(50).slideUp(750);
        });


        /*-----------------------------------------------------------------------------------*/
        /*	Responsive Nav
        /*-----------------------------------------------------------------------------------*/
        var $mainNav    = $('.main-menu > div > ul');
        var optionsList = '<option value="" selected>'+ localized.nav_title +'</option>';

        $mainNav.find('li').each(function() {
            var $this   = $(this),
                $anchor = $this.children('a'),
                depth   = $this.parents('ul').length - 1,
                indent  = '';
            if( depth ) {
                while( depth > 0 ) {
                    indent += ' - ';
                    depth--;
                }
            }
            optionsList += '<option value="' + $anchor.attr('href') + '">' + indent + ' ' + $anchor.text() + '</option>';
        }).end().last()
            .after('<select class="responsive-nav">' + optionsList + '</select>');

        $('.responsive-nav').on('change', function() {
            window.location = $(this).val();
        });


        /*-----------------------------------------------------------------------------------*/
        /*	Flex Slider
        /*-----------------------------------------------------------------------------------*/
        if(jQuery().flexslider)
        {
            // Flex Slider for Homepage
            $('#home-flexslider .flexslider').flexslider({
                animation: "fade",
                slideshowSpeed: 7000,
                animationSpeed:	1500,
                directionNav: true,
                controlNav: false,
                keyboardNav: true,
                start: function (slider) {
                    slider.removeClass('loading');
                }
            });

            // Remove Flex Slider Navigation for Smaller Screens Like IPhone Portrait
            $('.slider-wrapper , .listing-slider').hover(function(){
                var mobile = $('body').hasClass('probably-mobile');
                if(!mobile)
                {
                    $('.flex-direction-nav').stop(true,true).fadeIn('slow');
                }
            },function(){
                $('.flex-direction-nav').stop(true,true).fadeOut('slow');
            });

            // Flex Slider for Detail Page
            $('#property-detail-flexslider .flexslider').flexslider({
                animation: "slide",
                directionNav: true,
                controlNav: "thumbnails",
                start: function ( slider ) {
                    slider.resize();
                }
            });

            // Flex Slider Gallery Post
            $('.listing-slider').flexslider({
                animation: "slide"
            });

            /* Property detail page slider variation two */
            $('#property-carousel-two').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 113,
                itemMargin: 10,
                // move: 1,
                asNavFor: '#property-slider-two'
            });
            $('#property-slider-two').flexslider({
                animation: "slide",
                directionNav: true,
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#property-carousel-two",
                start: function (slider) {
                    slider.removeClass('loading');
                }
            });

        }


        /*-----------------------------------------------------------------------------------*/
        /*	jCarousel
        /*-----------------------------------------------------------------------------------*/
        if(jQuery().jcarousel){
            // Jcarousel for Detail Page
            jQuery('#property-detail-flexslider .flex-control-nav').jcarousel({
                vertical: true,
                scroll:1
            });

            // Jcarousel for partners
            jQuery('.brands-carousel .brands-carousel-list ').jcarousel({
                scroll:1
            });
        }


        /*-----------------------------------------------------------------------------------*/
        /*	Carousel - Elastislide
        /*-----------------------------------------------------------------------------------*/
        var param = {
            speed : 500,
            imageW : 245,
            minItems : 1,
            margin : 30,
            onClick : function($object) {
                window.location = $object.find('a').first().attr('href');
                return true;
            }
        };

        function cstatus(a,b,c){
            var temp = a.children("li");
            temp.last().attr('style', 'margin-right: 0px !important');
            if ( temp.length > c ) { b.elastislide(param); }
        };

        if(jQuery().elastislide){
            var fp = $('.featured-properties-carousel .es-carousel-wrapper ul'),
                fpCarousel = $('.featured-properties-carousel .carousel');
            cstatus(fp,fpCarousel,4);
        }


        /*-------------------------------------------------------*/
        /*	 Focus and Blur events with input elements
        /* -----------------------------------------------------*/
        var addFocusAndBlur = function($input, $val){
            $input.focus(function(){
                if ( $(this).value == $val ){
                    $(this).value = '';
                }
            });

            $input.blur(function(){
                if ( $(this).value == '' ) {
                    $(this).value = $val;
                }
            });
        };

        // Attach the events
        addFocusAndBlur(jQuery('#principal'),'Principal');
        addFocusAndBlur(jQuery('#interest'),'Interest');
        addFocusAndBlur(jQuery('#payment'),'Payment');
        addFocusAndBlur(jQuery('#texes'),'Texes');
        addFocusAndBlur(jQuery('#insurance'),'Insurance');
        addFocusAndBlur(jQuery('#pmi'),'PMI');
        addFocusAndBlur(jQuery('#extra'),'Extra');


        /*-----------------------------------------------------------------------------------*/
        /*	Apply Bootstrap Classes on Comment Form Fields to Make it Responsive
        /*-----------------------------------------------------------------------------------*/
        $('#respond #submit, #dsidx-contact-form-submit').addClass('real-btn');
        $('.lidd_mc_form input[type=submit]').addClass('real-btn');
        $('.pages-nav > a').addClass('real-btn');
        $('.dsidx-search-button .submit').addClass('real-btn');
        $('.wpcf7-submit').addClass('real-btn');

        /*----------------------------------------------------------------------------------*/
        /* Contact Form AJAX validation and submission
        /* Validation Plugin : http://bassistance.de/jquery-plugins/jquery-plugin-validation/
        /* Form Ajax Plugin : http://www.malsup.com/jquery/form/
        /*---------------------------------------------------------------------------------- */
        if(jQuery().validate && jQuery().ajaxSubmit)
        {

            var submitButton = $( '#submit-button'),
                ajaxLoader = $( '#ajax-loader' ),
                messageContainer = $( '#message-container'),
                errorContainer = $( "#error-container" );

            var formOptions = {
                beforeSubmit: function(){
                    submitButton.attr('disabled','disabled');
                    ajaxLoader.fadeIn('fast');
                    messageContainer.fadeOut('fast');
                    errorContainer.fadeOut('fast');
                },
                success: function( ajax_response, statusText, xhr, $form) {
                    var response = $.parseJSON ( ajax_response );
                    ajaxLoader.fadeOut('fast');
                    submitButton.removeAttr('disabled');
                    if( response.success ) {
                        $form.resetForm();
                        messageContainer.html( response.message ).fadeIn('fast');
                    } else {
                        errorContainer.html( response.message ).fadeIn('fast');
                    }
                }
            };

            // Contact page form
            $('#contact-form .contact-form').validate({
                errorLabelContainer: errorContainer,
                submitHandler: function(form) {
                    $(form).ajaxSubmit( formOptions );
                }
            });

            // Agent single page form
            $('#agent-single-form').validate( {
                errorLabelContainer: errorContainer,
                submitHandler: function(form) {
                    $(form).ajaxSubmit( formOptions );
                }
            } );

        }



        /*-----------------------------------------------------------------------------------*/
        /* Swipe Box Lightbox
        /*-----------------------------------------------------------------------------------*/
        if( jQuery().swipebox ) {
            $('.clone .swipebox').removeClass('swipebox');
            $(".swipebox").swipebox();
        }


        /*-----------------------------------------------------------------------------------*/
        /* Pretty Photo Lightbox
        /*-----------------------------------------------------------------------------------*/
        if( jQuery().prettyPhoto )
        {
            $(".pretty-photo").prettyPhoto({
                deeplinking: false,
                social_tools: false
            });

            $('a[data-rel]').each(function() {
                $(this).attr('rel', $(this).data('rel'));
            });

            $("a[rel^='prettyPhoto']").prettyPhoto({
                overlay_gallery: false,
                social_tools:false
            });
        }


        /*-------------------------------------------------------*/
        /*	Isotope
        /*------------------------------------------------------*/
        $( window ).load( function(){
            if( jQuery().isotope )
            {
                $(function() {

                    var container = $('.isotope'),
                        filterLinks = $('#filter-by a');

                    /* to fix floating bugs due to variation in height */
                    setTimeout(function () {
                        container.isotope({
                            filter: "*",
                            layoutMode: 'fitRows',
                            itemSelector: '.isotope-item',
                            animationEngine: 'best-available'
                        });
                    }, 1000);

                    filterLinks.click(function(e){
                        var selector = $(this).attr('data-filter');
                        container.isotope({ filter : '.' + selector });
                        filterLinks.removeClass('active');
                        $('#filter-by li').removeClass('current-cat');
                        $(this).addClass('active');
                        e.preventDefault();
                    });

                });
            }
        } );


        /* ---------------------------------------------------- */
        /*	Gallery Hover Effect
        /* ---------------------------------------------------- */
        $(function(){
            $('.gallery-item figure').hover( function(){
                    var $currentFigure = $(this);
                    var $mediaContainer = $currentFigure.find('.media_container');
                    var $media = $mediaContainer.find('a');
                    var $margin = - ( $media.first().height() / 2 );
                    $media.css( 'margin-top', $margin );
                    var linkWidth = $media.first().width();
                    var targetPosition = ( $mediaContainer.width() / 2 ) - ( linkWidth + 2 );
                    $mediaContainer.stop().fadeIn(300);
                    $mediaContainer.find('a.link').stop().animate({'right':targetPosition}, 300);
                    $mediaContainer.find('a.zoom').stop().animate({'left':targetPosition}, 300);
                },
                function() {
                    var $currentFigure = $(this);
                    var $mediaContainer = $currentFigure.find('.media_container');
                    $mediaContainer.stop().fadeOut(300);
                    $mediaContainer.find('a.link').stop().animate({'right':'0'}, 300);
                    $mediaContainer.find('a.zoom').stop().animate({'left':'0'}, 300);
                }
            );
        });



        /* ---------------------------------------------------- */
        /*  Sizing Header Outer Strip
        /* ---------------------------------------------------- */
        function outer_strip(){
            var $item    = $('.outer-strip'),
                $c_width = $('.header-wrapper .container').width(),
                $w_width = $(window).width(),
                $i_width = ($w_width -  $c_width)/2;

            if( $('body').hasClass('rtl') ){
                $item.css({
                    left: -$i_width,
                    width: $i_width
                });
            }else{
                $item.css({
                    right: -$i_width,
                    width: $i_width
                });
            }
        }

        outer_strip();
        $(window).resize(function(){
            outer_strip();
        });


        /* ---------------------------------------------------- */
        /*	Notification Hide Function
        /* ---------------------------------------------------- */
        $(".icon-remove").click(function() {
           $(this).parent().fadeOut(300);
        });


        /*-----------------------------------------------------------------------------------*/
        /*	Image Hover Effect
        /*-----------------------------------------------------------------------------------*/
        if(jQuery().transition)
        {
            $('.zoom_img_box img').hover(function(){
                $(this).stop(true,true).transition({
                    scale: 1.1
                },300);
            },function(){
                $(this).stop(true,true).transition({
                    scale: 1
                },150);
            });
        }


        /*-----------------------------------------------------------------------------------*/
        /*	Grid and Listing Toggle View
        /*-----------------------------------------------------------------------------------*/
        if($('.listing-grid-layout').hasClass('property-toggle')) {
            $('.listing-layout  .property-item-grid').hide();
            $('a.grid').on('click', function(){
                      $('.listing-layout').addClass('property-grid');
                      $('.property-item-grid').show();
                      $('.property-item-list').hide();
                      $('a.grid').addClass('active');
                      $('a.list').removeClass('active');
            });
            $('a.list').on('click', function(){
                $('.listing-layout').removeClass('property-grid');
                $('.property-item-grid').hide();
                $('.property-item-list').show();
                $('a.grid').removeClass('active');
                $('a.list').addClass('active');
            });
         }


        /*-----------------------------------------------------------------------------------*/
        /* Calendar Widget Border Fix
        /*-----------------------------------------------------------------------------------*/
        var $calendar = $('.sidebar .widget #wp-calendar');
        if( $calendar.length > 0){
            $calendar.each(function(){
                $(this).closest('.widget').css('border','none').css('background','transparent');
            });
        }

        var $single_listing = $('.sidebar .widget .dsidx-widget-single-listing');
        if( $single_listing.length > 0){
            $single_listing.each(function(){
                $(this).closest('.widget').css('border','none').css('background','transparent');
            });
        }

        /*-----------------------------------------------------------------------------------*/
        /*	Tags Cloud
        /*-----------------------------------------------------------------------------------*/
        $('.tagcloud').addClass('clearfix');
        $('.tagcloud a').removeAttr('style');


        /* dsIDXpress */
        $('#dsidx-top-search #dsidx-search-form table td').removeClass('label');
        $('.dsidx-tag-pre-foreclosure br').replaceWith(' ');


        /*-----------------------------------------------------------------------------------*/
        /* Properties Sorting
        /*-----------------------------------------------------------------------------------*/
        function insertParam(key, value) {
            key = encodeURI(key);
            value = encodeURI(value);

            var kvp = document.location.search.substr(1).split('&');

            var i = kvp.length;
            var x;
            while (i--) {
                x = kvp[i].split('=');

                if (x[0] == key) {
                    x[1] = value;
                    kvp[i] = x.join('=');
                    break;
                }
            }

            if (i < 0) {
                kvp[kvp.length] = [key, value].join('=');
            }

            //this will reload the page, it's likely better to store this until finished
            document.location.search = kvp.join('&');
        }

        $('#sort-properties').on('change', function() {
            var key = 'sortby';
            var value = $(this).val();
            insertParam( key, value );
        });


        /*-----------------------------------------------------------------------------------*/
        /* Add to favorites
        /*-----------------------------------------------------------------------------------*/
        $('a#add-to-favorite').click(function(e){
            e.preventDefault();
            var $star = $(this).find('i');
            var add_to_fav_opptions = {
                target:        '#fav_target',   // target element(s) to be updated with server response
                beforeSubmit:  function(){
                    $star.addClass('fa-spin');
                },  // pre-submit callback
                success:       function(){
                    $star.removeClass('fa-spin');
                    $('#add-to-favorite').hide(0,function(){
                        $('#fav_output').delay(200).show();
                    });
                }
            };

            $('#add-to-favorite-form').ajaxSubmit( add_to_fav_opptions );
        });

        /*-----------------------------------------------------------------------------------*/
        /* Remove from favorites
        /*-----------------------------------------------------------------------------------*/
        $('a.remove-from-favorite').click(function(event){
            event.preventDefault();
            var $this = $(this);
            var property_item = $this.closest('.property-item');
            var loader = $this.siblings('.loader');
            var ajax_response = property_item.find('.ajax-response');

            $this.hide();
            loader.show();

            var remove_favorite_request = $.ajax({
                url: $this.attr('href'),
                type: "POST",
                data: {
                    property_id : $this.data('property-id'),
                    action : "remove_from_favorites"
                },
                dataType: "json"
            });

            remove_favorite_request.done( function( response ) {
                loader.hide();
                if( response.success ) {
                    property_item.remove();
                } else {
                    ajax_response.text( response.message );
                }
            });

            remove_favorite_request.fail( function( jqXHR, textStatus ) {
                ajax_response.text( "Request failed: " + textStatus );
            });
        });


        /*-----------------------------------------------------------------------------------*/
        /* Select2
        /* URL: http://select2.github.io/select2/
        /*-----------------------------------------------------------------------------------*/
        if ( jQuery().select2 ) {
            var selectOptions = {
                //minimumResultsForSearch: -1,  // Disable search feature in drop down
                width : 'off'
            };

            if ( isRtl ) {
                selectOptions.dir = "rtl";
            }

            $('.search-select').select2 ( selectOptions );
        }

        /*-------------------------------------------------------*/
        /*	More Options in Search Form
        /* -----------------------------------------------------*/
        $ ( '.more-option-trigger > a').click( function(e) {
            e.preventDefault();
            var triggerIcon = $( this).find( 'i' );
            var moreOptionsWrapper = $( '.more-options-wrapper' );
            if( triggerIcon.hasClass( 'fa-plus-square-o' ) ) {
                triggerIcon.removeClass( 'fa-plus-square-o' ).addClass( 'fa-minus-square-o' );
                moreOptionsWrapper.removeClass( 'collapsed' );
            } else if ( triggerIcon.hasClass( 'fa-minus-square-o' ) ){
                triggerIcon.removeClass( 'fa-minus-square-o' ).addClass( 'fa-plus-square-o' );
                moreOptionsWrapper.addClass( 'collapsed' );
            }
        });

        /*-----------------------------------------------------------------------------------*/
        /*	Scroll to Top
        /*-----------------------------------------------------------------------------------*/
        $(function(){
            var scroll_anchor = $('#scroll-top');
            $( window ).scroll(function () {
                if ( $( window ).width() > 980 ) {
                    if ( $(this).scrollTop() > 250 ) {
                        scroll_anchor.fadeIn('fast');
                        return;
                    }
                }
                scroll_anchor.fadeOut('fast');
            });

            scroll_anchor.on( 'click', function ( event ) {
                event.preventDefault();
                $('html, body').animate( { scrollTop:0 }, 'slow' );
            });
        });


        /*-----------------------------------------------------------------------------------*/
        /* Home page properties pagination
        /*-----------------------------------------------------------------------------------*/
        var homePropertiesSection = $('#home-properties-section');

        // if homepage
        if( homePropertiesSection.length && homePropertiesSection.hasClass('ajax-pagination') ) {

            

            $(document).on('click','#home-properties-section-wrapper .pagination > a',function(e){
                e.preventDefault();
            	var homePropertiesContainer = $( '#home-properties-section-wrapper',homePropertiesSection );
            	var paginationLinks = $('.pagination > a',homePropertiesSection);
				var svgLoader = $( '.svg-loader',homePropertiesSection );
                var currentButton = $(this);
                svgLoader.slideDown('fast');
                homePropertiesContainer.fadeTo('slow',0.5);
				paginationLinks.removeClass('current');
              //  currentButton.addClass('current');
                homePropertiesContainer.load(
                    currentButton.attr('href') + ' ' + '#home-properties-section-inner',
                    function( response, status, xhr ) {
                        if ( status == 'success' ) {
                            homePropertiesContainer.fadeTo('slow',1);
                            svgLoader.slideUp('fast');

                            // $('html, body').animate( { scrollTop: homePropertiesContainer.offset().top - 60 }, 'slow' );
                        } else {
                            homePropertiesContainer.fadeTo('slow',1);
                            console.log( status + ' ' + xhr.statusText );
                        }
                    }
                );
            });
        }


        /*-----------------------------------------------------------------*/
        /* Sticky Header
        /*-----------------------------------------------------------------*/

        if( $('body').hasClass('sticky-header') ){


            $(window).scroll(function(){

                var $window = $(this);

                if( $window.width() > 979 ){    // work only above 600px screen size
                    var body = $('body');
                    var header = $('.header-wrapper');
                    var headerTop = $('#header-top');

                    // get the admin bar height
                    var adminBarHeight = 0;
                    if ( body.hasClass('admin-bar') ) {
                        adminBarHeight = $('#wpadminbar').outerHeight();
                    }

                    // header header top bar and header height
                    // var headerTopBarHeight = headerTop.outerHeight();
                    var headerHeight = header.outerHeight();

                    if ( $window.scrollTop() > 0 ) {
                        headerTop.css('marginBottom','5px');
                        header.addClass('stick').css('top', adminBarHeight);
                        body.css( 'padding-top', headerHeight );
                    } else {
                        headerTop.css('marginBottom','30px');
                        header.removeClass('stick').css('top', 'auto');
                        body.css( 'padding-top', 0);
                    }
                }

            });

        }


        /*-----------------------------------------------------------------*/
        /* Currency Switcher
        /*-----------------------------------------------------------------*/
        var currencySwitcherList = $('#currency-switcher-list');
        if( currencySwitcherList.length > 0 ) {     // if currency switcher exists

            var currencySwitcherForm = $('#currency-switcher-form');
            var currencySwitcherOptions = {
                success: function( ajax_response, statusText, xhr, $form) {
                    var response = $.parseJSON ( ajax_response );
                    if( response.success ) {
                        window.location.reload();
                    } else {
                        console.log( response );
                    }
                }
            };

            $('#currency-switcher-list > li').click(function(event){
                event.stopPropagation();
                currencySwitcherList.slideUp( 200 );

                // get selected currency code
                var selectedCurrencyCode = $(this).data( 'currency-code' );

                if ( selectedCurrencyCode ) {
                    $('#selected-currency').html( selectedCurrencyCode );
                    $('#switch-to-currency').val( selectedCurrencyCode );           // set new currency code
                    currencySwitcherForm.ajaxSubmit( currencySwitcherOptions );    // submit ajax form to update currency code cookie
                }
            });

            $('#currency-switcher').click(function(event){
                currencySwitcherList.slideDown( 200 );
                event.stopPropagation();
            });

            $('html').click(function() {
                currencySwitcherList.slideUp( 100 );
            });

        }


        /*-----------------------------------------------------------------*/
        /* Property Floor Plans
        /*-----------------------------------------------------------------*/
        $('.floor-plans-accordions .floor-plan:first-child').addClass('current')
            .children('.floor-plan-content').css('display', 'block').end()
            .find('i.fa').removeClass( 'fa-plus').addClass( 'fa-minus' );

        $('.floor-plan-title').on( 'click', function(){
            var parent_accordion = $(this).closest('.floor-plan');
            if ( parent_accordion.hasClass('current') ) {
                $(this).find('i.fa').removeClass( 'fa-minus').addClass( 'fa-plus' );
                parent_accordion.removeClass('current').children('.floor-plan-content').slideUp(300);
            } else {
                $(this).find('i.fa').removeClass('fa-plus').addClass( 'fa-minus' );
                parent_accordion.addClass('current').children('.floor-plan-content').slideDown(300);
            }
            var siblings = parent_accordion.siblings('.floor-plan');
            siblings.find('i.fa').removeClass( 'fa-minus').addClass( 'fa-plus' );
            siblings.removeClass('current').children('.floor-plan-content').slideUp(300);
        });



    });

})(jQuery);