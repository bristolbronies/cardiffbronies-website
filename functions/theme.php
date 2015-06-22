<?php

/**
 * Register navigation menus
 */
register_nav_menus(array('primary' => 'Main navigation'));
register_nav_menus(array('secondary' => 'Secondary navigation'));
register_nav_menus(array('footer' => 'Footer navigation'));
register_nav_menus(array('social' => 'Social links'));

/**
 * Allow article images and image resizing
 */
add_theme_support('post-thumbnails');
