<?php if($page_header['show_nav']) { ?>
    <div class="header-item header-item--nav nav uk-visible@m">
        <nav class="nav-list" role="navigation">
            <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => '')); ?>
        </nav>
    </div>
<?php } ?>
