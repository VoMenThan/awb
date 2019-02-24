<?php
global $wp_query;

get_header();
?>
<main class="main-content project-page">
    <section class="section-project">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="title-section">
                        <?php echo $post->post_title;?>
                    </h2>
                </div>
                <div class="col-lg-12 mb-3">
                    <div class="content-project mb-3">
                        <?php
                        echo $post->post_content;
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
<?php get_footer();?>
