<?php

    $args = array(
        'posts_per_page' => -1,
        'offset'=> 0,
        'post_type' => 'projects',
        'orderby' => 'id',
        'order' =>'asc'
    );
    $projects_all = get_posts( $args );
    get_header()
;?>
    <main class="main-content project-page">
        <section class="section-project">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="title-section">
                            AQUALCULTURE WITHOUT BORDER / PROJECTS
                        </h2>
                    </div>
                    <?php
                        for ($i=0; $i<3; $i++):
                    ?>

                    <div class="col-lg-4 col-md-6 col-12 item-project">
                        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($projects_all[$i]->ID);?>" alt="">
                        <div class="box-info-project">
                            <h3>
                                <?php echo $projects_all[$i]->post_title;?>
                            </h3>
                            <p>
                                <?php echo $projects_all[$i]->post_excerpt;?>
                            </p>
                            <a href="<?php echo home_url()."/projects/".$projects_all[$i]->post_name;?>" class="btn btn-read-more">READ MORE</a>
                        </div>
                    </div>

                    <?php endfor;
                    if (count($projects_all)>3):
                    ?>

                    <div class="col-lg-6 col-12 item-project">
                        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($projects_all[3]->ID);?>" alt="">
                        <div class="box-info-project">
                            <h3>
                                <?php echo $projects_all[3]->post_title;?>
                            </h3>
                            <p>
                                <?php echo $projects_all[3]->post_excerpt;?>
                            </p>
                            <a href="<?php echo home_url()."/projects/".$projects_all[3]->post_name;?>" class="btn btn-read-more">READ MORE</a>
                        </div>
                    </div>

                    <?php
                    endif;
                    if (count($projects_all)>4):
                        for ($i=4; $i<count($projects_all); $i++):
                    ?>
                    <div class="col-lg-3 col-md-6 col-12 item-project">
                        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($projects_all[$i]->ID);?>" alt="">
                        <div class="box-info-project">
                            <h3>
                                <?php echo $projects_all[$i]->post_title;?>
                            </h3>
                            <p>
                                <?php echo $projects_all[$i]->post_excerpt;?>
                            </p>
                            <a href="<?php echo home_url()."/projects/".$projects_all[$i]->post_name;?>" class="btn btn-read-more">READ MORE</a>
                        </div>
                    </div>
                    <?php endfor;
                    endif;
                    ?>
                </div>
            </div>
        </section>
    </main>
<?php get_footer();?>