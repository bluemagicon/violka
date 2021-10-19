<?php

if (function_exists('acf_add_options_page'))
{
    acf_add_options_page(array(
        'page_title'    => 'Meine Website',
        'menu_title'    => 'Meine Website',
        'menu_slug'     => 'bawoptions',
        'icon_url'      => 'dashicons-heart',
        'capability'    => 'edit_pages',
        'position'      => '2.3',
        'redirect'      => false
    ));
}

?>
