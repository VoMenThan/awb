<?php

    global $wp_query;

    $args = array(
        'posts_per_page' => -1,
        'offset'=> 0,
        'post_type' => 'post',
        'orderby' => 'id',
        'order' =>'desc'
    );
    $news_all = get_posts( $args );

    get_header();

?>
    <main class="main-content">
        <section class="slider-homepage">
            <div class="carousel-main owl-carousel owl-theme owl-loaded">

                <div class="owl-stage-outer">

                    <div class="owl-stage">


                        <div class="owl-item">

                            <img src="<?php echo ASSET_URL;?>images/banner-home.jpg" alt="">

                            <div class="box-info-slider">
                                <h2>SUPPORT POOR FARMERS</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Praesent eget dui vestibulum, vestibulum risus a, ornare
                                    eros. Donec eleifend vitae ante et cursus. Integer eu
                                    metus quis felisbibendumaccumsan ac consectetur nulla.
                                </p>
                                <a href="#" class="btn btn-transparent">READ MORE</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-post">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="title-section text-center">
                            LATEST POSTS
                        </div>
                    </div>
                </div>
                <?php foreach ($news_all as $item):?>

                <div class="row item-post">
                    <div class="col-md-6">
                        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($item->ID);?>" alt="">
                    </div>
                    <div class="col-md-6 text-center">
                        <h2 class="title-post"><?php echo $item->post_title;?></h2>
                        <span class="bd-bottom"></span>
                        <p class="description">
                            <?php echo $item->post_excerpt;?>
                        </p>
                        <a href="<?php echo home_url()."/".$item->post_name;?>" class="btn btn-transparent-black">READ MORE</a>
                    </div>
                </div>
                <?php endforeach;?>

            </div>
        </section>
    </main>
<?php get_footer();?>