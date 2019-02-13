<?php
global $wp_query;

$args = array(
    'posts_per_page' => 5,
    'offset'=> 0,
    'post_type' => 'post',
    'orderby' => 'id',
    'order' =>'desc'
);
$news_all = get_posts( $args );

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
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt="" class="img-fluid">
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
