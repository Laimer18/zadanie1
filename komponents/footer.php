<footer class="tm-footer">
            
            <div class="tm-social-icons-container text-xs-center">
                <a href="#" class="tm-social-link"><i class="fa fa-facebook"></i></a>
                <a href="#" class="tm-social-link"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="tm-social-link"><i class="fa fa-twitter"></i></a>
                <a href="#" class="tm-social-link"><i class="fa fa-behance"></i></a>
                <a href="#" class="tm-social-link"><i class="fa fa-linkedin"></i></a>
          </div>
            
            <p class="tm-copyright-text">Copyright &copy; <span class="tm-copyright-year">current year</span> Your Company 
            
             | Design: <a href="www.templatemo.com" target="_parent">Template Mo</a></p>

        </footer>
                
    </div> <!-- .cd-hero -->
    

    <!-- Preloader, https://ihatetomatoes.net/create-custom-preloading-screen/ -->
    <div id="loader-wrapper">
        
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    
    <!-- load JS files -->
    
    <script src="js/tether.min.js"></script> <!-- Tether (http://tether.io/)  --> 
    <script src="js/bootstrap.min.js"></script>             <!-- Bootstrap js (v4-alpha.getbootstrap.com/) -->
    <script src="js/hero-slider-main.js"></script>          <!-- Hero slider (https://codyhouse.co/gem/hero-slider/) -->
    <script src="js/jquery.magnific-popup.min.js"></script> <!-- Magnific popup (http://dimsemenov.com/plugins/magnific-popup/) -->
    
    <script>

        function adjustHeightOfPage(pageNo) {

            var pageContentHeight = 0;

            var pageType = $('div[data-page-no="' + pageNo + '"]').data("page-type");

            if( pageType != undefined && pageType == "gallery") {
                pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .tm-img-gallery-container").height();
            }
            else {
                pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .js-tm-page-content").height() + 20;
            }
           
            // Get the page height
            var totalPageHeight = $('.cd-slider-nav').height()
                                    + pageContentHeight
                                    + $('.tm-footer').outerHeight();

            // Adjust layout based on page height and window height
            if(totalPageHeight > $(window).height()) 
            {
                $('.cd-hero-slider').addClass('small-screen');
                $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", totalPageHeight + "px");
            }
            else 
            {
                $('.cd-hero-slider').removeClass('small-screen');
                $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", "100%");
            }
        }

        /*
            Everything is loaded including images.
        */
        $(window).load(function(){

            adjustHeightOfPage(1); // Adjust page height

            /* Gallery One pop up
            -----------------------------------------*/
            $('.gallery-one').magnificPopup({
                delegate: 'a', // child items selector, by clicking on it popup will open
                type: 'image',
                gallery:{enabled:true}                
            });
            
            /* Gallery Two pop up
            -----------------------------------------*/
            $('.gallery-two').magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery:{enabled:true}                
            });

            /* Gallery Three pop up
            -----------------------------------------*/
            $('.gallery-three').magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery:{enabled:true}                
            });

            /* Collapse menu after click 
            -----------------------------------------*/
            $('#tmNavbar a').click(function(){
                $('#tmNavbar').collapse('hide');

                adjustHeightOfPage($(this).data("no")); // Adjust page height       
            });

            /* Browser resized 
            -----------------------------------------*/
            $( window ).resize(function() {
                var currentPageNo = $(".cd-hero-slider li.selected .js-tm-page-content").data("page-no");
                
                // wait 3 seconds
                setTimeout(function() {
                    adjustHeightOfPage( currentPageNo );
                }, 1000);
                
            });
    
            // Remove preloader (https://ihatetomatoes.net/create-custom-preloading-screen/)
            $('body').addClass('loaded');

            // Write current year in copyright text.
            $(".tm-copyright-year").text(new Date().getFullYear());
                       
        });

        /* Google map
        ------------------------------------------------*/
        var map = '';
        var center;

        function initialize() {
            var mapOptions = {
                zoom: 13,
                center: new google.maps.LatLng(37.779724, -122.452152),
                scrollwheel: false
            };
        
            map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

            google.maps.event.addDomListener(map, 'idle', function() {
              calculateCenter();
            });
        
            google.maps.event.addDomListener(window, 'resize', function() {
              map.setCenter(center);
            });
        }

        function calculateCenter() {
            center = map.getCenter();
        }

        function loadGoogleMap(){
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
            document.body.appendChild(script);
        }
    
        // DOM is ready
        $(function() {   
            loadGoogleMap(); // Google Map
        });

    </script>            

</body>
</html>