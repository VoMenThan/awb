<?php
$args = array(
    'posts_per_page' => 6,
    'offset'=> 0,
    'post_type' => 'projects',
    'orderby' => 'id',
    'order' =>'asc'
);
$projects_all = get_posts( $args );


get_header();?>
<main class="main-content home-page">
    <section class="slider-homepage">
        <div class="carousel-main owl-carousel owl-theme owl-loaded">

            <div class="owl-stage-outer">

                <div class="owl-stage">

                    <?php
                        $slide =get_field("slider", $post->ID);

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

    <section id="about-us" class="about-us">
        <div class="container">
            <h2 class="title-section text-center"><?php echo get_field("title_about", $post->ID);?></h2>
            <?php echo get_field("info_about", $post->ID);?>
        </div>

    </section>

    <section id="how-we-work" class="how-we-work">
        <div class="container">
            <h2 class="title-section text-center">
                <?php echo get_field("title_we_work", $post->ID);?>
            </h2>
            <div class="row justify-content-center">
                <?php $work = get_field("how_we_work", $post->ID);
                    foreach ($work as $item):
                ?>
                <div class="col-md-4 mb-lg-5 mb-md-4 mb-3">
                    <div class="box-how-we-work">
                        <img src="<?php echo $item["icon"];?>" alt="">
                        <?php echo $item["work"];?>
                    </div>
                </div>
                <?php endforeach;?>

            </div>
        </div>
    </section>
    <section class="section-project">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="title-section text-center">
                        PROJECT
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
    <section id="join-us" class="section-support">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title-section text-center">
                        <?php echo get_field("title_support", $post->ID);?>
                    </h2>
                </div>
                <div class="col-lg-10 col-md-9">
                    <p>
                        <?php echo get_field("description_support", $post->ID);?>
                    </p>
                </div>
                <div class="col-lg-2 col-md-3">
                    <a href="<?php echo get_field("link_donates", $post->ID);?>" class="btn btn-orange mb-3">DONATES</a>
                    <a href="<?php echo get_field("link_volunteer", $post->ID);?>" class="btn btn-white">VOLUNTEER</a>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-us" class="section-contact-us">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title-section text-center">
                        <?php echo get_field("title_contact", $post->ID);?>
                    </h2>
                </div>
                <div class="col-lg-6">
                    <?php echo get_field("info_contact", $post->ID);?>
                </div>

                <?php

                $result = new stdClass();
                // Checks if form has been submitted
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    function post_captcha($user_response) {
                        $fields_string = '';
                        $fields = array(
                            'secret' => '6LdfebIUAAAAACNiNjtWPEs0--absZpGcmer_fO3',
                            'response' => $user_response
                        );
                        foreach($fields as $key=>$value)
                            $fields_string .= $key . '=' . $value . '&';
                        $fields_string = rtrim($fields_string, '&');

                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
                        curl_setopt($ch, CURLOPT_POST, count($fields));
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

                        $result = curl_exec($ch);
                        curl_close($ch);

                        return json_decode($result, true);
                    }

                    // Call the function post_captcha
                    $res = post_captcha($_POST['g-recaptcha-response']);

                    if(count($_POST) > 1 and $res['success']){
                        $data = $_POST;

                        $post_type = 'contact_us';
                        $post_id = wp_insert_post(
                            array(  'post_title'    => $data['mail_contact'],
                                'post_status'   => 'publish',
                                'post_type'     => $post_type));


                        /*write if in database*/
                        if ($post_id) {
                            $fs = array(
                                'name_contact',
                                'subject_contact',
                                'messages_contact'
                            );

                            foreach ($fs as $k) {
                                if (isset($_POST[$k])) {
                                    update_post_meta($post_id, $k, $_POST[$k]);
                                }
                            }
                            $result->st = 1;

                        } else {
                            $result->st = 0;
                        }
                    }
                    else{
                        $result->form = 1;
                    }
                }

                ?>

                <div class="col-lg-6">
                    <?php
                    if ($result->st == 1):
                        echo '<h5>Contact successfully!</h5>';
                    else:?>
                        <form id="form-contact" method="post" action="#contact-us">
                            <input required class="input-name" name="name_contact" value="<?php echo $_POST['name_contact'];?>" type="text" placeholder="Name">
                            <input required class="input-mail" name="mail_contact" value="<?php echo $_POST['mail_contact'];?>" type="email" placeholder="Mail">
                            <input required class="input-subject" name="subject_contact" value="<?php echo $_POST['subject_contact'];?>" type="text" placeholder="Subject">
                            <textarea required class="input-message" name="messages_contact" placeholder="Messages" cols="30" rows="10"><?php echo $_POST['messages_contact'];?></textarea>
                            <div class="g-recaptcha" data-sitekey="6LdfebIUAAAAAN6N3CeDKBg9i4Ebk2N1J7a4p3H7"></div>
                            <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    if (!$res['success']) {
                                        // What happens when the CAPTCHA wasn't checked
                                        echo '<p style="color: red;">Please make sure you check the security CAPTCHA box.</p><br>';
                                    }
                                }
                            ?>
                            <div id="capcha_key"></div>
                            <button type="submit" class="btn btn-orange" style="margin-top: 15px;">SEND</button>
                        </form>

                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer();?>
