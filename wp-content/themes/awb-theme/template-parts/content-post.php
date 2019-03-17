<div class="row item-post">
    <div class="col-md-6">
        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url();?>" alt="">
    </div>
    <div class="col-md-6 text-center">
        <h2 class="title-post"><?php echo get_the_title();?></h2>
        <span class="bd-bottom"></span>
        <p class="description">
            <?php echo get_the_excerpt();?>
        </p>
        <a href="<?php echo get_the_permalink();?>" class="btn btn-transparent-black">READ MORE</a>
    </div>
</div>