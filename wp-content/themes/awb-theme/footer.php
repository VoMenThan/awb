<!-- FOOTER -->
<footer>
    <div class="container-fluid d-lg-block d-none">
        <div class="container">
            <div class="box-menu-footer text-center d-flex justify-content-around">
                <a href="#about-us">ABOUT US</a>
                <a href="#how-we-work">HOW WE WORK</a>
                <a href="<?php echo home_url()."/projects";?>">PROJECTS</a>
                <a href="<?php echo home_url()."/awb-global";?>">AWB GLOBAL</a>
                <a href="<?php echo home_url()."/post";?>">POST</a>
                <a href="#join-us">JOIN US</a>
                <a href="#contact-us">CONTACT US</a>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-blue-black">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright-footer text-center"><?php echo get_field("copyright", 13);?></div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer();?>

<script>
    /*============ slide home page =================*/
    $(document).ready(function() {

        $('.carousel-main').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            autoplay: false,
            autoplayTimeout: 5000,
            smartSpeed:450,
            navText: ['<i class="btn-prev-slide"></i>', '<i class="btn-next-slide"></i>'],
            responsive: {
                0: {
                    items: 1,
                    dots: false
                },
                768: {
                    items: 1,
                    dots: false
                },
                1024: {
                    items: 1
                }
            }
        });



        /*slider product detail*/
        $(".carousel-products-detail").owlCarousel({
            items:1,
            margin:0,
            stagePadding: 0,
            smartSpeed: 200,
            loop: false,
            nav: false,
            dots: false,
            slideBy: 1,
            URLhashListener:true,
            autoplayHoverPause:true,
            startPosition: 'URLHash'
        });

        $(".box-icon-mini").owlCarousel({
            center: false,
            items:4,
            margin:0,
            stagePadding: 0,
            smartSpeed: 200,
            loop: false,
            nav: true,
            dots: false,
            slideBy: 1
        });
        /* end slider product detail*/
    });


    /*croll js*/
    $(".main-menu .nav-item a[href^='#']").on('click', function(e) {
        // prevent default anchor click behavior
        e.preventDefault();

        // store hash
        var hash = this.hash;
        if($(hash).length <= 0) window.location.href = "<?php echo get_home_url();?>"+hash;
        $("html, body").animate({ scrollTop: $(e.target.hash).offset().top }, 'slow');
        $(".main-menu .nav-item a[href^='#']").removeClass("active");
        $(this).addClass('active');


    });
    var onloadCallback = function() {
        alert("grecaptcha is ready!");
    };
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>
</script>

</body>
</html>