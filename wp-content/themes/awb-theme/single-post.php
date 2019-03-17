<?php

get_header();
?>

<main class="main-content project-page">
    <section class="section-project">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="title-section">
                        AQUALCULTURE WITHOUT BORDER / PROJECTS
                    </h2>
                </div>

                <div class="col-lg-4">
                    <?php
                    $list_photo = get_field("album_photo", $post->ID);
                    ?>

                    <div class="carousel-products-detail owl-carousel owl-theme">

                        <?php
                        foreach ($list_photo as $photo):
                            ?>
                            <div class="item"  data-hash="<?php echo $photo["ID"]?>">
                                <a data-fancybox="gallery-detail" href="<?php echo $photo["url"];?>">
                                    <img src="<?php echo $photo["url"];?>" alt="">
                                </a>
                            </div>
                        <?php endforeach;?>
                    </div>


                    <div class="box-icon-mini owl-carousel owl-theme">
                        <?php
                        foreach ($list_photo as $photo):
                            ?>
                            <div class="item">
                                <a href="#<?php echo $photo["ID"]?>"><img src="<?php echo $photo["url"];?>" alt=""></a>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>

                <div class="col-lg-8 mb-lg-3">
                    <h1><?php echo $post->post_title;?></h1>
                    <div class="content-project">
                        <?php echo $post->post_content;?>
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
                        OTHER POSTS
                    </div>
                </div>
            </div>
            <?php
            $array = array(
                'post_type' => 'post'
            );
            $the_query = new WP_Query( $array );
            $id_post = $post->ID;
            if ($the_query->have_posts()):
                while ($the_query->have_posts()):
                    $the_query->the_post();
                    if (get_the_ID() == $id_post) continue;
                    get_template_part('template-parts/content', 'post');
                endwhile;

                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'envzone' ),
                    'next_text'          => __( 'Next page', 'envzone' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'envzone' ) . ' </span>',
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
