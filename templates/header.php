<?php 
    $white_logo = get_field('white_logo', 'options');
    $black_logo = get_field('black_logo', 'options');
    $main_menu_items = get_field('main_menu_items', 'options');
    $button = get_field('button', 'options');

    $header_color = get_field('header_color');
    $main_header_color = '';

    if ($header_color == 'Default') {
        $main_header_color = '';
    } elseif ($header_color == 'Header Black')  {
        $main_header_color = 'header-black';
    }
?>


<div class="position-fixed h-vh w-100 top-0 start-0">
    <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/bg-img.png" class="w-100 h-100 object-cover" alt="bg-img">
</div>


<header class="header <?php echo $main_header_color; ?> position-fixed dpt-25 dpb-25 w-100 transition">
    <div class="container">
      <div class="header-main d-flex flex-column flex-lg-row align-items-lg-center justify-content-between">
        <div class="d-flex justify-content-between align-items-center">
          <a href="<?php echo get_home_url(); ?>" class="header-logo d-inline-block">
            <?php if(!empty($white_logo)):?>
                <img src="<?php echo $white_logo['url']; ?>" class="h-100 white-logo" alt="<?php echo $white_logo['title']; ?>">
            <?php endif; ?>
            <?php if(!empty($black_logo)):?>
                <img src="<?php echo $black_logo['url']; ?>" class="h-100 black-logo" alt="<?php echo $black_logo['title']; ?>">
            <?php endif; ?>
          </a>
          <div class="burger-menu d-lg-none">
            <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/burger-icon.svg" class="h-100 w-100 burger-icon" alt="burger-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/black-menu.svg" class="h-100 w-100 black-burger-icon" alt="black-menu">
            <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/close-icon.svg" class="h-100 w-100 close-icon" alt="close-icon">
          </div>
        </div>
        <?php if(!empty($main_menu_items)):?>
            <nav class="nav d-none d-lg-block tmt-210 tmb-190">
                <ul class="list-none d-flex flex-column flex-lg-row ps-0 mb-0 navigation">
                    <?php foreach($main_menu_items as $items):
                        $menu_link = $items['menu_link'];
                        ?>
                            <li class="me-4">
                                <?php if(!empty($menu_link['url']) && !empty($menu_link['title'])):?>
                                    <a href="<?php echo $menu_link['url']; ?>" target="<?php echo $menu_link['target'] == '_blank' ? '_blank' : ''; ?>"
                                     class="archivo-regular font18 leading20 space-0_32 text-decoration-none d-inline-block res-font46 res-leading78">
                                        <?php echo $menu_link['title']; ?>
                                    </a>
                                <?php endif; ?>
                            </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        <?php endif;?>
        <?php if(!empty($button['url']) && !empty($button['title'])):?>
            <div class="button d-none d-lg-block">
                <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? '_blank' : ''; ?>" class="btnA bg-white-btn d-inline-flex align-items-center text-decoration-none archivo-medium font18 leading20 space-0_32 text-223E4F transition">
                    <?php echo $button['title']; ?> 
                    <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/Subtract.svg" class="icon transition" alt="Subtract" />
                </a>
            </div>
        <?php endif;?>
      </div>
    </div>
  </header>