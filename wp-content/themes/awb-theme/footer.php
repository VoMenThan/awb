<!-- FOOTER -->
<footer>
    <div class="container-fluid d-lg-block d-none">
        <div class="container">
            <div class="box-menu-footer text-center d-flex justify-content-around">
                <a href="">ABOUT US</a>
                <a href="">HOW WE WORK</a>
                <a href="">PROJECTS</a>
                <a href="">AWB GLOBAL</a>
                <a href="">POST</a>
                <a href="">JOIN US</a>
                <a href="">CONTACT US</a>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-blue-black">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright-footer text-center">© 2017 by Agriculture without Border</div>
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
    });
</script>

</body>
</html>