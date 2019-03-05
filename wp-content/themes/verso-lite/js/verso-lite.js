(function($) {

    jQuery(document).ready(function($){

      //Custom verso scripts

        /* Init functions */
        revealPosts();

        /* variable declarations */
        var last_scroll = 0;

        /* carousel functions */
        $(document).on('click', '.verso-carousel-thumb', function(){
            var id = $("#" + $(this).attr("id"));
            $(id).on('slid.bs.carousel', function(){
                verso_get_bs_thumbs( id );
            });
        });
        $(document).on('mouseenter', '.verso-carousel-thumb', function(){
            var id = $("#" + $(this).attr("id"));
            verso_get_bs_thumbs( id );
        });

        function verso_get_bs_thumbs( id ){

            var nextThumb = $(id).find('.item.active').find('.next-image-preview').data('image');
            var prevThumb = $(id).find('.item.active').find('.prev-image-preview').data('image');
            $(id).find('.carousel-control.right').find('.thumbnail-container').css({ 'background-image' : 'url('+nextThumb+')' });
            $(id).find('.carousel-control.left').find('.thumbnail-container').css({ 'background-image' : 'url('+prevThumb+')' });
        }

        /* Ajax Functions */
        $(document).on('click','.verso-load-more:not(.loading)', function(){

            var that = $(this);
            var page = that.data('page');
            var newPage = page+1;
            var ajaxurl = that.data('url');
            var prev = that.data('prev');
            var archive = that.data('archive');

            if( typeof prev === 'undefined' ){
              prev = 0;
            }
            if( typeof archive === 'undefined' ){
              archive = 0;
            }

            that.addClass('loading').find('.text').slideUp(320);
            that.find('.verso-load-icon').addClass('spin');

            $.ajax({

              url : ajaxurl,
              type : 'post',
              data : {
                page : page,
                prev : prev,
                archive : archive,
                action : 'verso_load_more'
              },
              error : function( response ) {
                console.log(response);
              },
              success : function( response ) {
                var response = jQuery.parseJSON(response);
                if( response.content == 0 ){

                  $('.verso-posts-container').append( '<div class="text-center verso-post-end-text"><h3>You reached the end of the line</h3><p>No more posts to load.</p></div>' );

                  that.slideUp(320);

                }
                else{
                  setTimeout( function(){

                    if( prev == 1 ){
                      $('.verso-posts-container').prepend( response.content );
                      newPage = page-1;
                    }
                    else{
                      $('.verso-posts-container').append( response.content );
                    }

                    if( newPage == 1 ){

                      that.slideUp(320);

                    }
                    else{

                      that.data('page',newPage);
                      that.removeClass('loading').find('.text').slideDown(320);
                      that.find('.verso-load-icon').removeClass('spin');

                    }

                    revealPosts();
                    if( response.has_next == 0 ){

                      $('.verso-posts-container').append( '<div class="text-center"><h3>You reached the end of the line</h3><p>No more posts to load.</p></div>' );

                      that.slideUp(320);

                    }
                  }, 1000);
                }
              }

            });

        });

          /* Scroll functions */
          $(window).scroll( function(){

            var scroll = $(window).scrollTop();

            if( Math.abs( scroll - last_scroll ) > $(window).height()*0.1 ){

              last_scroll = scroll;

              $('.page-limit').each(function( index ){
                // var pathname = window.location.pathname; // Returns path only
                // var url      = window.location.href;     // Returns full URL
                if( isVisible( $(this) ) ){

                  //var ssss = $(this).attr("data-url")+$(this).attr("data-page");
                  history.replaceState( null, null, $(this).attr("data-page") );
                  return(false);

                }

              });

            }

          });

        /* Helper Functions */
        function revealPosts() {

            $('[data-toggle="tooltip"]').tooltip();

            $('[data-toggle="popover"]').popover();

            var posts = $('article:not(.reveal)');
            var i = 0;

            setInterval(function(){

                if( i >= posts.length ) return false;

                var el = posts[i];
                $(el).addClass('reveal').find('.verso-carousel-thumb').carousel();
                i++;

            }, 200);

        }
        function isVisible( element ){

            var scroll_pos = $(window).scrollTop();
            var window_height = $(window).height();
            var el_top = $(element).offset().top;
            var el_height = $(element).height();
            var el_bottom = el_top + el_height;

            return ( ( el_bottom - el_height*0.25 > scroll_pos ) && ( el_top < ( scroll_pos+0.5*window_height ) ) );

        }

        /* Sidebar functions */

        $(document).on('click', '.js-toggleSidebar', function(){

            $('.verso-sidebar').toggleClass('sidebar-closed');
            $('.sidebar-overlay').fadeToggle( 320 );
            $('body').toggleClass( 'no-scroll' );

        });
        $(document).on('click', '.home4-js-toggleSidebar', function(){

            $('.home-4-sidebar-content-area').toggleClass('sidebar-reveal');
            $('.home-4-main-content-area').toggleClass('col-md-10 col-md-12').toggleClass('col-md-offset-2');
            $(this).find('i').toggleClass('fa-close fa-bars');
            $(this).toggleClass('iconleft');

        });

        //set equal heights to all posts
        function fixButtonHeights() {
        	var heights = new Array();

        	// Loop to get all element heights
        	$('.verso-blog-colums .post').each(function() {
        		// Need to let sizes be whatever they want so no overflow on resize
        		$(this).css('min-height', '0');
        		$(this).css('max-height', 'none');
        		$(this).css('height', 'auto');

        		// Then add size (no units) to array
         		heights.push($(this).height());
        	});

        	// Find max height of all elements
        	var max = Math.max.apply( Math, heights );

        	// Set all heights to max height
        	$('.verso-blog-colums .post').each(function() {
        		$(this).css('height', max + 'px');
                // Note: IF box-sizing is border-box, would need to manually add border and padding to height (or tallest element will overflow by amount of vertical border + vertical padding)
        	});
        }

        $(window).load(function() {
        	// Fix heights on page load
        	fixButtonHeights();

        	// Fix heights on window resize
        	$(window).resize(function() {
        		// Needs to be a timeout function so it doesn't fire every ms of resize
        		setTimeout(function() {
              		fixButtonHeights();
        		}, 120);
        	});
        });

        /* Theme customizing functions */
        // Back to top
        $('#back-to-top').on('click', function(){
          $("html, body").animate({scrollTop: 0}, 500);
          return false;
        });

        // Search expand in header
        $(document).on('click', '.head-search-toggle', function(){
            $('.search-expand').fadeToggle( 320 );
            $('.search-overlay').fadeToggle( 320 );
        });

        // pre loader
     	$(window).on('load', function () {
         $('#preloader').fadeOut('slow',function(){
     			$(this).remove();
     		});
      	});

     	// Affix height
     	//$(".nav_wrapper").height($(".header-container").height());

        // Change target to _blank to _self for portfolio
        $(".tlp-portfolio-item .tlp-item .tlp-overlay a").attr("target", "_self");

        // Smooth scroll to down
        $(".scroll-down").click(function(event){
    		event.preventDefault();
    		$('html,body').animate({scrollTop:$(this.hash).offset().top - 200}, 500);
    	});
        // Smooth scroll to menus
        // scroll handler
        var scrollToAnchor = function( id ) {
            // grab the element to scroll to based on the name
            var elem = $("a[name='"+ id +"']");
            // if that didn't work, look for an element with our ID
            if ( typeof( elem.offset() ) === "undefined" ) {
              elem = $("#"+id);
            }
            // if the destination element exists
            if ( typeof( elem.offset() ) !== "undefined" ) {
              // do the scroll
              $('html, body').animate({
                      scrollTop: elem.offset().top - 100
              }, 1000 );
            }
        };
        // bind to click event
        $("a[rel='relativeanchor']").click(function( event ) {
            // only do this if it's an anchor link
            if ( $(this).attr("href").match("#") ) {
              // cancel default event propagation
              event.preventDefault();
              // scroll to the location
              var href = $(this).attr('href').replace('#', '')
              scrollToAnchor( href );
            }
        });

        // Hide Header on on scroll down
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var navbarHeight = $('.affix-header-container').outerHeight();

        $(window).scroll(function(event){
            didScroll = true;
        });

        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 200);

        function hasScrolled() {
            var st = $(this).scrollTop();

            // Make sure they scroll more than delta
            if(Math.abs(lastScrollTop - st) <= delta)
                return;

            if (st >= 100) {

                // If they scrolled down and are past the navbar, add class .nav-up.
                // This is necessary so you never see what is "behind" the navbar.
                if (st > lastScrollTop && st > navbarHeight){
                    // Scroll Down
                    $('.affix-header-container').removeClass('nav-down').addClass('nav-up');
                }
                else {
                    // Scroll Up
                    if(st + $(window).height() < $(document).height()) {
                        $('.affix-header-container').removeClass('nav-up').addClass('nav-down');
                    }
                }
            }
            else{
                $('.affix-header-container').removeClass('nav-down').removeClass('nav-up');
            }

            lastScrollTop = st;
        }
    });

})(jQuery);
