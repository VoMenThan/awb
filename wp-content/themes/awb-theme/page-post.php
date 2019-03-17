<?php
get_header();

?>
    <main class="main-content">
        <section class="slider-homepage">
            <div class="carousel-main owl-carousel owl-theme owl-loaded">

                <div class="owl-stage-outer">

                    <div class="owl-stage">


                        <?php
                        $slide =get_field("slider", 13);

                        foreach ($slide as $item):
                            ?>
                            <div class="owl-item">

                                <img src="<?php echo $item["photo"];?>" alt="">

                                <div class="box-info-slider">
                                    <?php echo $item["info"];?>
                                    <?php  if ($item["link"]!=''):?>
                                        <a href="<?php echo $item["link"];?>" class="btn btn-transparent">READ MORE</a>
                                    <?php endif;?>
                                </div>

                            </div>
                        <?php
                        endforeach;
                        ?>
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


                <?php
                $paged = get_query_var('paged');
                $array = array(
                    'post_type' => 'post',
                    'paged' => $paged
                );
                $the_query = new WP_Query( $array );

                if ($the_query->have_posts()):
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                        get_template_part('template-parts/content', 'post');
                    endwhile;

                    $big = 999999999; // need an unlikely integer

                    echo paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, $paged ),
                        'total' => $the_query->max_num_pages
                    ) );

                else:
                    ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php
                endif;
                ?>

            </div>
        </section>
    </main>
<?php get_footer();?>