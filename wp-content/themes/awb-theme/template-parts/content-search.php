<div class="row item-post">
    <div class="col-md-12">
        <?php the_title( sprintf( '<h2 class="title-post pb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <div class="description pb-1">
            <?php the_excerpt(); ?>
        </div>
    </div>
</div>