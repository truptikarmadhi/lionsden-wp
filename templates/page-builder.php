<?php

/* Template Name: Page Builder */

?>
<?php if (have_rows('flexible_content')):
    while (have_rows('flexible_content')):
        the_row();
        if (get_row_layout() == 'hero_section'):
            $hero_slider = get_sub_field('hero_slider');
            $countable_cards = get_sub_field('countable_cards');
?>
        <!-- hero-section -->
        <section class="hero-section position-relative z-3">
            <div class="d-none d-lg-block h-100">
                <?php if(!empty($hero_slider)):?>
                    <div class="hero-main-slider h-100">
                        <?php foreach($hero_slider as $slide):
                            $background_image = $slide['background_image'];
                            $image = $slide['image'];
                            $video = $slide['video'];
                            $youtube = $slide['youtube'];
                            $vimeo = $slide['vimeo'];
                            $prefix = $slide['prefix'];
                            $heading = $slide['heading'];
                            $description = $slide['description'];
                            $buttons = $slide['buttons'];
                        ?>
                            <div class="position-relative h-100">
                                <?php if(!empty($background_image) && $background_image == 'Image' && !empty($image)):?>
                                    <img src="<?php echo $image['sizes']['medium'];?>" class="h-100 w-100 object-cover" alt="<?php echo $image['title'];?>">
                                <?php elseif(!empty($background_image) && $background_image == 'Video' && !empty($video)):?>
                                    <video id="hero-video" loop autoplay muted playsinline preload="auto"
                                        class="w-100 h-100 object-cover">
                                        <source src="<?php echo $video['url']; ?>" type="video/mp4">
                                    </video>
                                <?php elseif(!empty($background_image) && $background_image == 'Youtube' && !empty($youtube)):?>
                                    <iframe class="w-100 h-100 object-cover"
                                        src="https://www.youtube.com/embed/<?php echo convert_youtube_to_embed($youtube); ?>?autoplay=1&mute=1&loop=1&playlist=<?php echo convert_youtube_to_embed($youtube); ?>&controls=0&rel=0&modestbranding=1&playsinline=1"
                                        allow="autoplay; fullscreen"
                                        allowfullscreen>
                                    </iframe>
                                <?php elseif(!empty($background_image) && $background_image == 'Vimeo' && !empty($vimeo)):?>
                                    <iframe class="w-100 h-100 object-cover"
                                        src="https://player.vimeo.com/video/<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                        allow="autoplay" allowfullscreen>
                                    </iframe>
                                <?php endif;?>
                                <div class="hero-bg-layer position-absolute top-0 start-0 h-100 w-100 bg-black opacity-50"></div>
                                <div class="hero-content position-absolute top-0 start-0 w-100 d-flex align-items-center">
                                    <div class="container">
                                        <div class="col-6 pe-5">
                                            <?php if(!empty($prefix)):?>
                                                <div class="prefix manrope-regular font16 leading30 space-0_32 text-EF9F00 dmb-10"><?php echo $prefix;?></div>
                                            <?php endif;?>
                                            <?php if(!empty($heading)):?>
                                                <div class="main-heading archivo-thin font76 leading70 space-0_48 text-white dmb-15">
                                                    <?php echo $heading;?>
                                                </div>
                                            <?php endif;?>
                                            <?php if(!empty($description)):?>
                                                <div class="manrope-regular font20 leading26 text-F1F1F1 pe-lg-4 dmb-15">
                                                    <?php echo $description;?>
                                                </div>
                                            <?php endif;?>
                                            <?php if(!empty($buttons)):?>
                                                <div class="hero-btns">
                                                    <?php foreach($buttons as $btn):
                                                            $button = $btn['button'];
                                                    ?>
                                                        <?php if(!empty($button['url']) && !empty($button['title'])):?>
                                                            <a href="<?php echo $button['url'];?>" target="<?php echo $button['target'] == '_blank' ? '_blank' : ''; ?>" class="btnA bg-white-btn d-inline-flex align-items-center text-decoration-none archivo-medium font18 leading20 space-0_32 text-223E4F transition">
                                                                <?php echo $button['title'];?> 
                                                                <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/Subtract.svg" class="icon transition" alt="Subtract" />
                                                            </a>
                                                        <?php endif;?>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="d-lg-none tmb-75">
                <div class="position-relative tmb-55">
                    <div class="hero-img">
                        <?php if(!empty($background_image) && $background_image == 'Image' && !empty($image)):?>
                            <img src="<?php echo $image['sizes']['medium'];?>" class="h-100 w-100 object-cover" alt="<?php echo $image['title'];?>">
                        <?php elseif(!empty($background_image) && $background_image == 'Video' && !empty($video)):?>
                            <video id="hero-video" loop autoplay muted playsinline preload="auto"
                                class="w-100 h-100 object-cover">
                                <source src="<?php echo $video['url']; ?>" type="video/mp4">
                            </video>
                        <?php elseif(!empty($background_image) && $background_image == 'Youtube' && !empty($youtube)):?>
                            <iframe class="w-100 h-100 object-cover"
                                src="https://www.youtube.com/embed/<?php echo convert_youtube_to_embed($youtube); ?>?autoplay=1&mute=1&loop=1&playlist=<?php echo convert_youtube_to_embed($youtube); ?>&controls=0&rel=0&modestbranding=1&playsinline=1"
                                allow="autoplay; fullscreen"
                                allowfullscreen>
                            </iframe>
                        <?php elseif(!empty($background_image) && $background_image == 'Vimeo' && !empty($vimeo)):?>
                            <iframe class="w-100 h-100 object-cover"
                                src="https://player.vimeo.com/video/<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                allow="autoplay" allowfullscreen>
                            </iframe>
                        <?php endif;?>
                    </div>
                    <div class="hero-bg-layer position-absolute top-0 start-0 h-100 w-100 bg-black opacity-50"></div>
                </div>
                <div class="container">
                    <?php if(!empty($prefix)):?>
                        <div class="prefix manrope-regular font16 leading30 space-0_32 res-font12 text-EF9F00 dmb-10"><?php echo $prefix;?></div>
                    <?php endif;?>
                    <?php if(!empty($heading)):?>
                        <div class="main-heading archivo-thin font36 res-leading38 space-0_48 text-223E4F dmb-15 pe-5">
                            <?php echo $heading;?>
                        </div>
                    <?php endif;?>
                    <?php if(!empty($description)):?>
                        <div class="manrope-regular font16 leading26 space-0_16 text-223E4F tmb-30">
                            <?php echo $description;?>
                        </div>
                    <?php endif;?>
                    <?php if(!empty($buttons)):?>
                        <div class="hero-btns">
                            <?php foreach($buttons as $btn):
                                $button = $btn['button'];
                            ?>
                                <?php if(!empty($button['url']) && !empty($button['title'])):?>
                                    <a href="<?php echo $button['url'];?>" target="<?php echo $button['target'] == '_blank' ? '_blank' : ''; ?>" class="btnA bg-white-btn d-inline-flex align-items-center text-decoration-none archivo-medium font18 leading20 space-0_32 text-223E4F transition tmb-30">
                                        <?php echo $button['title'];?> 
                                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/Subtract.svg" class="icon transition" alt="Subtract" />
                                    </a>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <?php if(!empty($countable_cards)):?>
                <div class="position-absolute bottom-0 start-0 w-100 dmb-80 tmb-0 p-initial">
                    <div class="container">
                        <div class="row row6">
                            <?php foreach($countable_cards as $card):
                                $count = $card['count'];
                                $icon = $card['icon'];
                                $heading = $card['heading'];
                            ?>
                                <div class="col-lg-4 tmb-10">
                                    <div class="counter-card radius10">
                                        <?php if(!empty($count)):?>
                                            <div class="archivo-regular font66 res-font56 leading58 space-0_48 text-white res-text-EF9F00 dmb-25 tmb-10">
                                                <span class="count" data-number="<?php echo $count;?>"><?php echo $count;?></span>
                                                <?php if(!empty($icon)):?>
                                                    <?php echo $icon;?>
                                                <?php endif;?>
                                            </div>
                                        <?php endif;?>
                                        <?php if(!empty($heading)):?>
                                            <div class="manrope-medium font18 leading20 space-0_32 text-white res-text-223E4F"><?php echo $heading;?></div>
                                        <?php endif;?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        </section>
           

    <?php elseif (get_row_layout() == 'who_we_are_section'):
        $prefix = get_sub_field('prefix');
        $heading = get_sub_field('heading');
        $description = get_sub_field('description');
        $work_cards = get_sub_field('work_cards');
        ?>
        <!-- who-we-are-section -->
        <section class="who-we-are-section position-relative z-3">
            <div class="container">
                <div class="col-lg-6 dmb-40 tmb-20 wow animated animate__fadeInUp" data-wow-duration="1.5s">
                    <?php if(!empty($prefix)):?>
                        <div class="prefix manrope-regular font16 leading20 space-0_32 text-EF9F00 dmb-10 res-font12"><?php echo $prefix;?></div>
                    <?php endif;?>
                    <?php if(!empty($heading)):?>
                        <div class="archivo-thin font56 leading48 space-0_48 text-223E4F dmb-15 res-font36 res-leading38 tmb-10"><?php echo $heading;?></div>
                    <?php endif;?>
                    <?php if(!empty($description)):?>
                        <div class="manrope-regular font20 leading28 text-223E4F res-font16 res-leading22 res-space-0_16 pe-2 pe-lg-0">
                            <?php echo $description;?>
                        </div>
                    <?php endif;?>
                </div>
                <div class="row row5">
                    <?php if(!empty($work_cards)):
                        foreach($work_cards as $card):
                            $heading = $card['heading'];
                            $description = $card['description'];
                    ?>
                        <div class="col-lg-3 col-md-6 col-12 tmb-10 wow animated animate__fadeInUp" data-wow-duration="1.5s">
                            <div class="who-we-card bg-white radius10 h-100">
                                <?php if(!empty($heading)):?>
                                    <div class="archivo-regular font22 leading24 space-0_16 text-223E4F dmb-10 res-font20 res-space-0_48"><?php echo $heading;?></div>
                                <?php endif;?>
                                <?php if(!empty($description)):?>
                                    <div class="manrope-regular font16 leading20 text-223E4F res-font14 res-leading20">
                                        <?php echo $description;?>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>


    <?php elseif (get_row_layout() == 'brand_slider_section'):
        $brand_logos = get_sub_field('brand_logos');
        ?>
        <!-- brand-slider-section -->
        <?php if(!empty($brand_logos)): ?>
            <section class="brand-slider-section position-relative overflow-hidden">
                <div class="container">
                    <div class="brand-slider col-lg-11 col-7 mx-auto wow animated animate__fadeInUp" data-wow-duration="1.5s">
                        <?php foreach($brand_logos as $logo):
                            $image = $logo['image'];
                        ?>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="brand-logo">
                                    <?php if(!empty($image)):?>
                                        <img src="<?php echo $image['url'];?>" class="w-100" alt="<?php echo $image['title'];?>">
                                    <?php endif;?>
                                </div>
                            </div>
                        <?php endforeach; ?> 
                    </div>
                </div>
            </section>
        <?php endif; ?>


    <?php elseif (get_row_layout() == 'service_section'):
        $id = get_sub_field('id');
        $prefix = get_sub_field('prefix');
        $heading = get_sub_field('heading');
        $description = get_sub_field('description');
        $selection = get_sub_field('selection');
        $service_post = get_sub_field('service_post');

        $args = [
            'post_type'      => 'services',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ];

        $query = new WP_Query($args);
    ?>
        <!-- service-section -->
        <section id="<?php echo $id; ?>" class="service-section dpt-140 dpb-140 position-relative z-3 radius30 tpt-80 tpb-95 wow animated animate__fadeInUp" data-wow-duration="1.5s">
            <div class="container">
                <div class="col-lg-5 dmb-30">
                    <?php if(!empty($prefix)):?>
                        <div class="prefix manrope-regular font16 leading30 space-0_32 text-EF9F00 dmb-10 res-font12 res-leading20"><?php echo $prefix;?></div>
                    <?php endif;?>
                    <?php if(!empty($heading)):?>
                        <div class="archivo-thin font56 leading48 text-F1F1F1 dmb-10 res-font36 res-leading38"><?php echo $heading;?></div>
                    <?php endif;?>
                    <?php if(!empty($description)):?>
                        <div class="manrope-regular font20 leading28 space-0_16 text-F1F1F1 res-font16 res-leading22 pe-2">
                            <?php echo $description;?>
                        </div>
                    <?php endif;?>
                </div>
                <?php if(!empty($selection) && $selection == "All"):?>
                    <div class="row row16">
                        <?php if ($query->have_posts()):
                            $count = 1;
                            while ($query->have_posts()):
                                $query->the_post();
                                $post_id = get_the_ID();
                                $title = get_the_title();
                                $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                                $description = get_the_excerpt();
                        ?>
                            <div class="col-lg-6 col-12 tmb-10 dmb-25">
                                <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasService-<?php echo $post_id; ?>" aria-controls="offcanvasService" class="service-cards d-inline-block text-decoration-none radius15 overflow-hidden">
                                    <div class="row">
                                        <div class="col-lg-4 col-5 tmb-20">
                                            <div class="service-img radius15 overflow-hidden">
                                                <img src="<?php echo esc_url($image); ?>" class="h-100 w-100 object-cover" alt="<?php echo esc_html($title); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-7">
                                            <div class="service-number archivo-regular font14 leading20 space-0_32 text-EF9F00 text-lg-center text-end"> <?php echo sprintf('%02d', $count++); ?></div>
                                        </div>
                                        <div class="col-lg-7 col-12">
                                            <div class="archivo-regular font26 leading28 space-0_48 text-F1F1F1 dmb-15"><?php echo esc_html($title); ?></div>
                                            <div class="archivo-regular font16 leading24 space-0_16 text-F1F1F1 dmb-10 tmb-15 col-lg-10 col-12 res-font14">
                                                <?php echo esc_html($description); ?>
                                            </div>
                                            <div class="arrow">
                                                <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/Subtract.svg" class="h-100 w-100" alt="Subtract">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; 
                        wp_reset_postdata();
                            endif; ?>
                    </div>
                <?php elseif(!empty($selection) && $selection == "Select"):?>
                    <div class="row row16">
                        <?php if(!empty($service_post)):
                            foreach ($service_post as $key => $service):
                                $post_id = get_the_ID();
                                $service_id = $service->ID;
                                $title = get_the_title($service_id);
                                $image = get_the_post_thumbnail_url($service_id, 'full');
                                $description = get_the_excerpt($service_id);
                            ?>
                            <div class="col-lg-6 col-12 tmb-10 dmb-25">
                                <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasService-<?php echo $post_id; ?>" aria-controls="offcanvasService" class="service-cards d-inline-block text-decoration-none radius15 overflow-hidden">
                                    <div class="row">
                                        <div class="col-lg-4 col-5 tmb-20">
                                            <div class="service-img radius15 overflow-hidden">
                                                <img src="<?php echo esc_url($image); ?>" class="h-100 w-100 object-cover" alt="<?php echo esc_html($title); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-7">
                                            <div class="archivo-regular font14 leading20 space-0_32 text-EF9F00 text-lg-center text-end"><?php echo $key + 1; ?></div>
                                        </div>
                                        <div class="col-lg-7 col-12">
                                            <div class="archivo-regular font26 leading28 space-0_48 text-F1F1F1 dmb-15"><?php echo esc_html($title); ?></div>
                                            <div class="archivo-regular font16 leading24 space-0_16 text-F1F1F1 dmb-10 tmb-15 col-lg-10 col-12 res-font14">
                                                <?php echo esc_html($description); ?>
                                            </div>
                                            <div class="arrow">
                                                <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/Subtract.svg" class="h-100 w-100" alt="Subtract">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; 
                         wp_reset_postdata();  
                    endif;?>
                    </div>
                <?php endif;?>
            </div>
        </section>

        <?php if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
                    $service_id = get_the_ID();
                    $title = get_the_title();
                    $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    $description = get_the_excerpt();
                    $service_modal = get_field('service_modal');
                    $requirements = get_field('requirements');
        ?>
            <div class="offcanvas service-offcanvas offcanvas-end" tabindex="-1" id="offcanvasService-<?php echo $service_id; ?>" aria-labelledby="offcanvasServiceLabel">
                <div class="offcanvas-body p-0">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="close-btn bg-transparent border-0 ms-auto p-0 dmb-15 " data-bs-dismiss="offcanvas" aria-label="Close">
                            <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/close-icon.svg" class="h-100 w-100" alt="close-icon">
                        </button>
                    </div>
                    <div class="d-flex align-items-center dmb-30">
                        <div class="col-3">
                            <?php if(!empty($image)):?>
                                <div class="service-img radius15 overflow-hidden">
                                    <img src="<?php echo $image; ?>" class="w-100 h-100 object-cover" alt="<?php echo $title; ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($title)):?>
                            <div class="col-9">
                                <div class="archivo-regular font36 leading36 space-0_48 text-223E4F res-font26 res-leading28"><?php echo $title; ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($service_modal)):
                        $service_content = $service_modal['service_content'];
                        ?>
                        <div class="service-content-group dmb-5">
                            <?php if(!empty($service_content)):
                                foreach($service_content as $content):
                                    $heading = $content['heading'];
                                    $description = $content['description'];
                                ?>
                                <div class="service-content dpt-40 dpb-30 tpt-25 tpb-25">
                                    <?php if(!empty($heading)):?>
                                        <div class="archivo-thin font24 leading24 space-0_48 text-223E4F dmb-15 res-font20 dmb-10">
                                            <?php echo $heading; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($description)):?>
                                        <div class="service-desc manrope-regular font16 leading26 space-0_16 text-223E4F res-font14 res-leading22">
                                            <?php echo $description; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach;
                            endif; ?> 
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($requirements)):
                        $title = $requirements['title']; 
                        $description = $requirements['description']; 
                        $button = $requirements['button']; 
                        $contact = $requirements['contact']; 
                    ?>
                        <div class="booking-box radius10 dmt-30">
                            <?php if(!empty($title)):?>
                                <div class="archivo-regular font24 leading24 space-0_48 text-223E4F dmb-5 res-font20 res-leading24"><?php echo $title; ?></div>
                            <?php endif;?>
                            <?php if(!empty($description)):?>
                                <div class="manrope-regular font16 leading20 space-0_16 text-223E4F dmb-15 res-font14 res-leading22 tmb-5"><?php echo $description; ?></div>
                            <?php endif;?>
                            <?php if(!empty($button['url']) && !empty($button['title'])):?>
                                <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? '_blank' : ''; ?>" class="btnA bg-223E4F-btn d-inline-flex align-items-center text-decoration-none archivo-medium font18 leading20 space-0_32 text-223E4F transition dmb-20">
                                    <?php echo $button['title']; ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/Subtract.svg" class="icon transition" alt="Subtract">
                                </a>
                            <?php endif;?>
                            <?php if(!empty($contact)):?>
                                <div class="book-contact manrope-regular font16 leading20 space-0_16 text-223E4F res-font14 res-leading22"><?php echo $contact; ?></div>
                            <?php endif;?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        <?php endwhile; 
            wp_reset_postdata();
        endif; ?>


    <?php elseif (get_row_layout() == 'about_us_section'):
        $id = get_sub_field('id');
        $prefix = get_sub_field('prefix');
        $heading = get_sub_field('heading');
        $description = get_sub_field('description');
        $team_cards = get_sub_field('team_cards');
        ?>
        <!-- about-us-section -->
        <section id="<?php echo $id; ?>" class="about-us-section position-relative z-3 overflow-hidden">
            <div class="container">
                <div class="col-lg-9 col-12 dmb-40 tmb-25 wow animated animate__fadeInUp" data-wow-duration="1.5s">
                    <?php if(!empty($prefix)):?>
                        <div class="prefix manrope-regular font16 leading30 space-0_32 text-EF9F00 dmb-10 res-font12 res-leading20 dmb-15"><?php echo $prefix;?></div>
                    <?php endif;?>
                    <?php if(!empty($heading)):?>
                        <div class="archivo-thin font56 leading58 space-0_48 text-223E4F dmb-20 res-font36 res-leading38 tmb-15">
                            <?php echo $heading;?>
                        </div>
                    <?php endif;?>
                    <?php if(!empty($description)):?>
                        <div class="archivo-regular font20 leading28 space-0_16 text-223E4F res-font16 res-leading22 pe-5">
                            <?php echo $description;?>
                        </div>
                    <?php endif;?>
                </div>
                <?php if(!empty($team_cards)):?>
                    <div class="about-us-slider col-10 pe-2 col-lg-12 pe-lg-0 wow animated animate__fadeInUp" data-wow-duration="1.5s">
                        <?php foreach($team_cards as $card):
                            $image = $card['image'];
                            $member_name = $card['member_name'];
                            $member_profession = $card['member_profession'];
                            $member_description = $card['member_description'];
                        ?>
                                <div class="about-us-cards h-100 text-decoration-none d-inline-block radius15 overflow-hidden">
                                    <?php if(!empty($image)):?>
                                        <div class="about-us-img radius15 dmb-35 tmb-25 overflow-hidden">
                                            <img src="<?php echo $image['sizes']['medium'];?>" class="h-100 w-100 object-cover" alt="<?php echo $image['title'];?>">
                                        </div>
                                    <?php endif;?>
                                    <?php if(!empty($member_name)):?>
                                        <div class="archivo-regular font24 leading24 space-0_48 text-223E4F dmb-5 res-font22"><?php echo $member_name;?></div>
                                    <?php endif;?>
                                    <?php if(!empty($member_profession)):?>
                                        <div class="manrope-regular font16 leading22 space-0_16 text-223E4F opacity30 dmb-20 res-font14">
                                            <?php echo $member_profession;?>
                                        </div>
                                    <?php endif;?>  
                                    <?php if(!empty($member_description)):?>
                                        <div class="manrope-regular font16 leading26 space-0_16 text-223E4F pe-lg-4 res-font14 res-leading22">
                                            <?php echo $member_description;?>
                                        </div>
                                    <?php endif;?> 
                                </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif;?>
            </div>
        </section>


    <?php elseif (get_row_layout() == 'testimonials_section'):
        $id = get_sub_field('id');
        $args = [
            'post_type'      => 'testimonials',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ];

        $query = new WP_Query($args);
        ?>
        <!-- testimonial-section -->
        <section id="<?php echo $id; ?>" class="testimonial-section position-relative z-3 wow animated animate__fadeInUp" data-wow-duration="1.5s">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-lg-3 col-12">
                        <div class="slick-arrow d-flex align-items-center tmt-65">
                            <div class="prev-arrow cursor-pointer me-3"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/prev-arrow.svg" class="h-100" alt="prev-arrow"></div>
                            <div class="next-arrow cursor-pointer"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/next-arrow.svg" class="h-100" alt="next-arrow"></div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="testimonial-slider">
                            <?php if ($query->have_posts()):
                                while ($query->have_posts()):
                                    $query->the_post();

                                    $post_id = get_the_ID();
                                    $title = get_the_title();
                                    $content = wpautop(get_the_content());
                                    $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');

                                    $company_name = get_field('company_name');
                                ?>
                                <div class="testimonial-card">
                                    <div class="archivo-regular font46 leading48 space-0_48 text-223E4F col-lg-11 pe-lg-5 dmb-60 res-font30 res-leading38 tmb-50">
                                        <?php echo $content; ?>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="testimonial-img me-3 bg-white rounded-circle d-flex align-items-center justify-content-center">
                                            <img src="<?php echo $image; ?>" class="w-100" alt="<?php echo $title; ?>">
                                        </div>
                                        <div>
                                            <div class="archivo-regular font18 leading24 space-0_48 text-223E4F opacity-50 res-font16 pe-3 pe-lg-0">
                                                <?php echo $title; ?>, Pharmaceutical Company
                                            </div>
                                            <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTestimonial-<?php echo $post_id; ?>" aria-controls="offcanvasTestimonial" class="archivo-regular font18 leading24 space-0_48 text-223E4F res-font16">View Case Study</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; 
                            wp_reset_postdata();
                        endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();

                $post_id = get_the_ID();

                $title = get_the_title();
                $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');

                $company_name = get_field('company_name');
                $testimonial_content = get_field('testimonial_content');
                $session_cards = get_field('session_cards');

                $requirements = get_field('requirements');
        ?>
            <div class="offcanvas Testimonial-offcanvas offcanvas-end" tabindex="-1" id="offcanvasTestimonial-<?php echo $post_id; ?>"
                aria-labelledby="offcanvasTestimonialLabel-<?php echo $post_id; ?>">
                <div class="offcanvas-body p-0">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="close-btn bg-transparent border-0 ms-auto p-0 dmb-25" data-bs-dismiss="offcanvas" aria-label="Close">
                            <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/close-icon.svg" class="h-100 w-100" alt="close-icon">
                        </button>
                    </div>
                
                        <div class="d-flex align-items-center dpb-40 dmb-40 tmb-25 tpb-35 testimonial-container">
                            <?php if(!empty($image)):?>
                                <div class="testimonial-img me-3 rounded-circle d-flex align-items-center justify-content-center">
                                    <img src="<?php echo $image; ?>" class="w-100" alt="<?php echo $title; ?>">
                                </div>
                                <?php endif;?>
                            <div>
                                <?php if(!empty($title)):?>
                                    <div class="archivo-regular font26 leading28 space-0_48 tetx-223E4F res-font20 res-leading22"><?php echo $title; ?></div>
                                <?php endif;?>
                                <?php if(!empty($company_name)):?>
                                    <div class="archivo-regular font18 leading24 space-0_48 text-223E4F opacity-50"><?php echo $company_name; ?></div>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="testimonial-content-group">
                            <?php if(!empty($testimonial_content)):
                                foreach($testimonial_content as $content):
                                    $heading = $content['heading'];
                                    $description = wp_strip_all_tags($content['description']);
                                ?>
                                    <div class="testimonial-content dmb-10">
                                        <?php if(!empty($heading)):?>
                                            <div class="archivo-regular font24 leading24 space-0_48 text-223E4F dmb-15 res-font20 tmb-10">
                                                <?php echo esc_html($heading); ?>
                                            </div>
                                        <?php endif;?>
                                        <?php if(!empty($description)):?>
                                            <div class="manrope-regular font16 leading26 space-0_16 text-223E4F res-font14 res-leading22 pe-4">
                                                <?php echo esc_html($description); ?>
                                            </div>
                                        <?php endif;?>
                                    </div>
                                <?php endforeach; 
                            endif; ?>
                        </div>
                        <?php if(!empty($session_cards)):
                            foreach($session_cards as $card):
                                $heading = $card['heading'];
                                $description = wp_strip_all_tags($card['description']);
                                ?>
                            <div class="story-session-card radius10 dmt-35 dmb-35 tmt-40 tmb-35">
                                <?php if(!empty($heading)):?>
                                    <div class="archivo-regular font24 leading24 space-0_48 text-223E4F dmb-15 res-font20 tmb-10"><?php echo esc_html($heading); ?></div>
                                <?php endif;?>
                                <?php if(!empty($description)):?>
                                    <div class="manrope-regular font16 leading26 space-0_16 text-223E4F res-font14 res-leading22">
                                        <?php echo esc_html($description); ?>
                                    </div>
                                <?php endif;?>
                            </div>
                        <?php endforeach; 
                            endif; ?>
                        <?php if(!empty($requirements)):
                            $title = $requirements['title']; 
                            $description = $requirements['description']; 
                            $button = $requirements['button']; 
                            $contact = $requirements['contact']; 
                            ?>
                            <div class="booking-box radius10">
                                <?php if(!empty($title)):?>
                                    <div class="archivo-regular font24 leading24 space-0_48 text-223E4F dmb-5 res-font20 res-leading24"><?php echo $title; ?></div>
                                <?php endif;?>
                                <?php if(!empty($description)):?>
                                    <div class="manrope-regular font16 leading20 space-0_16 text-223E4F dmb-15 res-font14 res-leading22 tmb-5"><?php echo $description; ?></div>
                                <?php endif;?>
                                <?php if(!empty($button['url']) && !empty($button['title'])):?>
                                    <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? '_blank' : ''; ?>" class="btnA bg-223E4F-btn d-inline-flex align-items-center text-decoration-none archivo-medium font18 leading20 space-0_32 text-223E4F transition dmb-20">
                                        <?php echo $button['title']; ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/Subtract.svg" class="icon transition" alt="Subtract">
                                    </a>
                                <?php endif;?>
                                <?php if(!empty($contact)):?>
                                    <div class="book-contact manrope-regular font16 leading20 space-0_16 text-223E4F res-font14 res-leading22"><?php echo $contact; ?></div>
                                <?php endif;?>
                            </div>
                        <?php endif;?>
                </div>
            </div>
        <?php endwhile; 
            wp_reset_postdata();
        endif;?>


    <?php elseif (get_row_layout() == 'left_content_section'):
        $prefix = get_sub_field('prefix');
        $heading = get_sub_field('heading');
        $description = get_sub_field('description');
        ?>
        <!-- left-content-section -->
        <section class="left-content-section position-relative wow animated animate__fadeInUp" data-wow-duration="1.5s">
            <div class="container">
                <div class="col-lg-8 pe-lg-3">
                    <?php if(!empty($prefix)):?>
                        <div class="prefix archivo-regular font16 leading22 space-0_16 res-font12 res-leading20 res-space-0_32 text-EF9F00 tmb-5 dmb-15">
                            <?php echo $prefix;?>
                        </div>
                    <?php endif;?>
                    <?php if(!empty($heading)):?>
                        <div class="main-title archivo-thin font56 leading58 space-0_32 res-font36 res-leading38 res-space-0_48 text-223E4F tmb-10 dmb-20">
                            <?php echo $heading;?>
                        </div>
                    <?php endif;?>
                    <?php if(!empty($description)):?>
                        <div class="manrope-regular font20 leading28 space-0_16 res-font16 res-leading22 text-223E4F">
                            <?php echo $description;?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </section>


    <?php elseif (get_row_layout() == 'left_right_layout_section'):
        $background_selection = get_sub_field('background_selection');
        $prefix = get_sub_field('prefix');
        $main_heading = get_sub_field('main_heading');
        $left_right_cards = get_sub_field('left_right_cards');
        ?>
        <!-- left-right-layout-section -->
        <section class="left-right-layout-section <?php echo $background_selection == 'Yes' ? 'bg-F1F1F1 radius30 tpb-130 tpt-70 dpt-230 dpb-140' : ''; ?> position-relative">
            <div class="container">
                <div class="wow animated animate__fadeInUp" data-wow-duration="1.5s">

                    <?php if(!empty($prefix)):?>
                        <div class="prefix archivo-regular font16 leading22 space-0_16 res-font12 res-leading20 res-space-0_32 text-EF9F00 tmb-5 dmb-10">
                            <?php echo $prefix;?>
                        </div>
                        <?php endif;?>
                        <?php if(!empty($main_heading)):?>
                            <div class="main-title archivo-thin font56 leading58 space-0_32 res-font36 res-leading38 res-space-0_48 text-223E4F tmb-30 dmb-50">
                                <?php echo $main_heading;?>
                            </div>
                            <?php endif;?>
                        </div>
                <div class="left-right-cards">
                    <?php if(!empty($left_right_cards)):
                        foreach($left_right_cards as $card):
                            $left_or_right = $card['left_or_right'];
                            $image = $card['image'];
                            $heading = $card['heading'];
                            $description = $card['description'];
                            $button = $card['button'];
                        ?>
                        <div class="left-right-card tmt-55 dmt-115 wow animated animate__fadeInUp" data-wow-duration="1.5s">
                            <div class="row <?php echo $left_or_right == 'Left' ? 'a' : 'd-flex flex-lg-row     flex-column-reverse' ?> align-items-center">
                                <?php if($left_or_right == 'Left'):?>
                                    <div class="col-lg-7 pe-lg-5">
                                        <?php if(!empty($image)):?>
                                            <div class="col-lg-11 left-right-img radius15 overflow-hidden tmb-35">
                                                <img src="<?php echo $image['sizes']['medium'];?>" alt="<?php echo $image['title'];?>" class="w-100 h-100 object-cover">
                                            </div>
                                        <?php endif;?>
                                    </div>
                                <?php endif;?>
                                <div class="col-lg-5">
                                    <div class="col-lg-10">
                                        <?php if(!empty($heading)):?>
                                            <div class="archivo-regular font36 leading24 space-0_48 res-font26 res-leading24 text-223E4F dmb-20">
                                                <?php echo $heading;?>
                                            </div>
                                        <?php endif;?>
                                        <?php if(!empty($description)):?>
                                            <div class="manrope-regular font20 leading28 space-0_16 res-font18 res-leading26 text-223E4F dmb-20">
                                                <?php echo $description;?>
                                            </div>
                                        <?php endif;?>
                                        <?php if(!empty($button) && $button['url'] && $button['title']):?>
                                        <a href="<?php echo $button['url'];?>" target="<?php echo $button['target'] == '_blank' ? '_blank' : ''; ?>" class="btnA bg-223E4F-btn d-inline-flex align-items-center text-decoration-none archivo-medium font18 leading20 space-0_32 transition">
                                            <?php echo $button['title'];?> 
                                            <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/Subtract.svg" class="icon transition" alt="Subtract">
                                        </a>
                                        <?php endif;?>
                                    </div>
                                </div>
                                <?php if($left_or_right == 'Right'):?>
                                    <div class="col-lg-7 ps-lg-5">
                                        <?php if(!empty($image)):?>
                                            <div class="col-lg-11 ms-auto left-right-img radius15 overflow-hidden tmb-35">
                                                <img src="<?php echo $image['sizes']['medium'];?>" alt="<?php echo $image['title'];?>" class="w-100 h-100 object-cover">
                                            </div>
                                        <?php endif;?>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endforeach;endif; ?>
                </div>
            </div>
        </section>


    <?php elseif (get_row_layout() == 'full_media_section'):
        $prefix = get_sub_field('prefix');
        $heading = get_sub_field('heading');
        $image = get_sub_field('image');
        $background_images = get_sub_field('background_images');
        $video = get_sub_field('video');
        $youtube = get_sub_field('youtube');
        $vimeo = get_sub_field('vimeo');
        ?>
        <!-- full-media-section -->
        <section class="full-media-section position-relative">
            <div class="container">
                <div class="wow animated animate__fadeInUp" data-wow-duration="1.5s">
                    <?php if(!empty($prefix)):?>
                        <div class="prefix archivo-regular font16 leading22 space-0_16 res-font12 res-leading20 res-space-0_32 text-EF9F00 justify-content-center tmb-5 dmb-10">
                            <?php echo $prefix;?>
                        </div>
                        <?php endif;?>
                        <?php if(!empty($heading)):?>
                            <div class="main-title archivo-thin font56 leading58 space-0_32 res-font36 res-leading38 res-space-0_48 text-223E4F text-center tmb-30 dmb-35">
                                <?php echo $heading;?>
                            </div>
                            <?php endif;?>
                        </div>
                <div class="col-lg-10 mx-auto position-relative wow animated animate__fadeInUp" data-wow-duration="1.5s">
                    <div class="full-media">
                        <img src="<?php echo $image['sizes']['medium'];?>" alt="<?php echo $image['title'];?>" class="w-100 h-100 object-cover radius15 overflow-hidden">
                    </div>
                    <div class="position-absolute top-0 start-0 w-100 h-100">
                        <div class="full-media radius15 overflow-hidden d-flex align-items-center justify-content-center">
                          <?php if(!empty($background_images) && $background_images == 'Video' && !empty($video)):?>
                                <a class="play-video-btn d-flex align-items-center justify-content-center"
                                    data-fancybox
                                    href="<?php echo esc_url($video['url']); ?>">
                                    <img src="<?php echo get_template_directory_uri();?>/templates/icons/play-icon.svg" alt="play-icon">
                                </a>

                                <?php elseif(!empty($background_images) && $background_images == 'Youtube' && !empty($youtube)):?>
                                <a class="play-video-btn d-flex align-items-center justify-content-center"
                                    data-fancybox
                                    href="https://www.youtube.com/embed/<?php echo convert_youtube_to_embed($youtube); ?>?autoplay=1&mute=1&loop=1&playlist=<?php echo convert_youtube_to_embed($youtube); ?>&controls=0&rel=0&modestbranding=1&playsinline=1">
                                    <img src="<?php echo get_template_directory_uri();?>/templates/icons/play-icon.svg" alt="play-icon">
                                </a>

                                <?php elseif(!empty($background_images) && $background_images == 'Vimeo' && !empty($vimeo)):?>
                                <a class="play-video-btn d-flex align-items-center justify-content-center"
                                    data-fancybox
                                    href="https://player.vimeo.com/video/<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1">
                                    <img src="<?php echo get_template_directory_uri();?>/templates/icons/play-icon.svg" alt="play-icon">
                                </a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <?php elseif (get_row_layout() == 'full_media_slider_section'):
        $full_media_slider = get_sub_field('full_media_slider');
        ?>
        <?php if(!empty($full_media_slider)):?>
            <section class="full-media-slider-section wow animated animate__fadeInUp" data-wow-duration="1.5s">
                <div class="container h-100 px-p-0">
                    <div class="position-relative h-100">
                        <div class="full-media-slider h-100 position-relative tmb-20">
                            <?php foreach($full_media_slider as $slide):
                                $background_images = $slide['background_images'];
                                $image = $slide['image'];
                                $video = $slide['video'];
                                $youtube = $slide['youtube'];
                                $vimeo = $slide['vimeo'];
                            ?>
                            <div class="h-100 res-radius0 radius15 overflow-hidden">
                                <?php if(!empty($background_images) && $background_images == 'Image' && !empty($image)):?>
                                    <img src="<?php echo $image['sizes']['fullscreen'];?>" alt="<?php echo $image['title'];?>" class="w-100 h-100 object-cover">
                                <?php elseif(!empty($background_images) && $background_images == 'Video' && !empty($video)):?>
                                    <video id="hero-video" loop autoplay muted playsinline preload="auto"
                                        class="w-100 h-100 object-cover">
                                        <source src="<?php echo $video['url']; ?>" type="video/mp4">
                                    </video>
                                <?php elseif(!empty($background_images) && $background_images == 'Youtube' && !empty($youtube)):?>
                                    <iframe class="w-100 h-100 object-cover"
                                        src="https://www.youtube.com/embed/<?php echo convert_youtube_to_embed($youtube); ?>?autoplay=1&mute=1&loop=1&playlist=<?php echo convert_youtube_to_embed($youtube); ?>&controls=0&rel=0&modestbranding=1&playsinline=1"
                                        allow="autoplay; fullscreen"
                                        allowfullscreen>
                                    </iframe>
                                <?php elseif(!empty($background_images) && $background_images == 'Vimeo' && !empty($vimeo)):?>
                                    <iframe class="w-100 h-100 object-cover"
                                        src="https://player.vimeo.com/video/<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                        allow="autoplay" allowfullscreen>
                                    </iframe>       
                                <?php endif;?>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <div class="slick-arrows position-absolute p-initial top-0 start-0 w-100 h-100 px-3 z-3 d-flex align-items-center justify-content-between">
                            <div class="prev-arrow">
                                <img src="<?php echo get_template_directory_uri();?>/templates/icons/left-arrow.svg" alt="left-arrow" class="w-100 h-100">
                            </div>
                            <div class="next-arrow">
                                <img src="<?php echo get_template_directory_uri();?>/templates/icons/right-arrow.svg" alt="right-arrow" class="w-100 h-100">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif;?>
     

    <?php elseif (get_row_layout() == 'spacing'):
            $desktop = get_sub_field('desktop');
            $tablet = get_sub_field('tablet');
            $mobile = get_sub_field('mobile');
            $desktop_mb = $desktop["margin_bottom"];
            $desktop_mb_main = !empty($desktop["margin_bottom"]) ? " dpb-" : "";
            $tablet_mb = $tablet["margin_bottom"];
            $tablet_mb_main = !empty($tablet["margin_bottom"]) ? " tpb-" : "";
            $mobile_mb = $mobile["margin_bottom"];
            $mobile_mb_main = !empty($mobile["margin_bottom"]) ? " mpb-" : "";
        ?>
            <div class="spacing <?php echo $desktop_mb_main;
                                echo $desktop_mb;
                                echo $tablet_mb_main;
                                echo $tablet_mb;
                                echo $mobile_mb_main;
                                echo $mobile_mb;
                                ?> position-relative z-3"></div>

<?php
        endif;
    endwhile;
endif; ?>