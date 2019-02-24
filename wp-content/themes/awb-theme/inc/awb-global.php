<?php get_header();?>
<main class="main-content project-page">
    <section class="section-project">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="title-section">
                        <?php echo $post->post_title;?>
                    </h2>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="content-project mb-3">
                        <?php
                        echo $post->post_content;
                        ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt="" class="img-fluid">
                </div>



            </div>
        </div>
    </section>
</main>
<?php get_footer();?>