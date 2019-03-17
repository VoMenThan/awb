<?php
    $search = $_GET['s'];
    $arr = array(
        's' => $search,
        'post_type' => array( 'post', 'awb_global', 'projects', 'page' )
        );
    $the_query = new WP_Query($arr);

    get_header();
?>


    <main class="main-content">

        <section class="section-post search-page">
            <div class="container">

            <?php if ( $the_query->have_posts() ) : ?>
                 <div class="row justify-content-center">
                    <div class="col-12">
                        <header class="page-header mb-lg-3 mb-3">
                            <h1 class="page-title title-section">
                                <?php printf( __( 'Search results for: %s', 'awb' ), '<b>' . esc_html( get_search_query() ) . '</b>' ); ?>
                            </h1>
                        </header>
                    </div>
                 </div>

                <?php
                // Start the loop.
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                        get_template_part('template-parts/content', 'search');
                    endwhile;

                    if (  $the_query->max_num_pages > 1 ){
                            echo '<div class="misha_loadmore btn btn-blue-env w-100 mb-5">Load more</div>'; // you can use <a> as well
                        };


                        // Previous/next page navigation.
                        /*the_posts_pagination( array(
                        'prev_text'          => __( 'Previous page', 'envzone' ),
                        'next_text'          => __( 'Next page', 'envzone' ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'envzone' ) . ' </span>',
                        ) );*/

                        // If no content, include the "No posts found" template.
                        else :
                            get_template_part( 'template-parts/content', 'none' );
                        endif;
                        ?>




            </div>
        </section>
    </main>

<?php get_footer()?>