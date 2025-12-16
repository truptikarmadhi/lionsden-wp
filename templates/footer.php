<?php 
    $footer_title = get_field('footer_title', 'options');
    $footer_description = get_field('footer_description', 'options');
    $button = get_field('button', 'options');
    $footer_contact = get_field('footer_contact', 'options');
    $footer_mail = get_field('footer_mail', 'options');
    $social_media = get_field('social_media', 'options');
    $copyright = get_field('copyright', 'options');
    $website_name = get_field('website_name', 'options');
?>

<!-- footer -->
<footer class="footer bg-223E4F position-relative z-3 dpt-80 dpb-65 tpb-50">
    <div class="container">
      <div class="row dmb-140 tmb-120">
        <div class="col-lg-6 col-12 tmb-110">
            <?php if(!empty($footer_title)):?>
                <div class="col-lg-9 col-10 main-title archivo-thin font46 leading48 space-0_48 text-F1F1F1 dmb-10 res-font36 res-leading38"><?php echo $footer_title; ?></div>
            <?php endif; ?>
            <?php if(!empty($footer_description)):?>
                <div class="manrope-regular font20 leading24 text-F1F1F1 dmb-30 res-font16 res-leading20 tmb-20"><?php echo $footer_description; ?></div>
            <?php endif; ?>
            <?php if(!empty($button['url']) && !empty($button['title'])):?>
                <a href="<?php echo $button['url'];?>" target="<?php echo $button['target'] == '_blank' ? '_blank' : ''; ?>" class="btnA bg-white-btn d-inline-flex align-items-center text-decoration-none archivo-medium font18 leading20 space-0_32 text-223E4F transition">
                   <?php echo $button['title'];?> 
                    <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/Subtract.svg" class="icon transition" alt="Subtract" />
                </a>
            <?php endif; ?>
        </div>
        <div class="col-lg-6 col-12">
            <div class="col-lg-8 ms-lg-auto">
                <?php if(!empty($footer_contact)):?>
                    <a href="tel:<?php echo $footer_contact; ?>" class="archivo-regular font46 leading48 space-0_48 text-F1F1F1 d-inline-block text-decoration-none res-font36 res-leading38">
                        <?php echo $footer_contact; ?>
                    </a>
                <?php endif; ?>
                <?php if(!empty($footer_mail)):?>
                    <a href="mailto:<?php echo $footer_mail; ?>" class="archivo-regular font46 leading48 space-0_48 text-F1F1F1 d-inline-block text-decoration-none res-font36 res-leading38">
                        <?php echo $footer_mail; ?>
                    </a>
                <?php endif; ?>
                <div class="social-icon-group dmt-30">
                    <?php if(!empty($social_media)):
                        foreach($social_media as $media):
                            $icon = $media['icon'];
                            $url = $media['url'];
                        ?>
                            <?php if(!empty($icon['url']) && !empty($url)):?>
                                <a href="<?php echo $url; ?>" target="_blank" class="social-icon d-inline-block me-3"><img src="<?php echo $icon['url']; ?>" class="h-100 w-100" alt="<?php echo $icon['title']; ?>"></a>
                            <?php endif; ?>
                        <?php endforeach;
                    endif; ?>
                </div>
          </div>
        </div>
      </div>
      <div class="d-flex flex-column flex-lg-row justify-content-between align-lg-items-center dpt-30 footer-line">
        <?php if(!empty($copyright)):?>
            <div class="manrope-regular font14 leading20 space-0_48 text-F1F1F1 tmb-50"><?php echo $copyright; ?></div>
        <?php endif; ?>
        <?php if(!empty($website_name)):?>
            <div class="manrope-regular font14 leading20 space-0_48 text-F1F1F1"><?php echo $website_name; ?></div>
        <?php endif; ?>
      </div>
    </div>
</footer>