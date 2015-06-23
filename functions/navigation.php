<?php

/**
 * Register navigation menus
 */
register_nav_menus(array('primary' => 'Main navigation'));
register_nav_menus(array('secondary' => 'Secondary navigation'));
register_nav_menus(array('footer' => 'Footer navigation'));
register_nav_menus(array('social' => 'Social links'));

/**
 * Custom navigation walker
 */
class bb_navigation_walker extends Walker_Nav_Menu {
	public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		// print_r($item);
		$attributes = '';
		$classes = "navigation__item";
		if(!empty($item->attr_title) && $item->attr_title !== $item->title) {
			$attributes .= ' title="' . esc_attr($item->attr_title) . '"';
		}
		if(!empty($item->url)) {
			$attributes .= ' href="' . esc_attr($item->url) . '"';
		}
		if($item->classes[0] != "") {
			$classes .= " " . $item->classes[0];
		}
		if($item->current) {
			$classes .= " navigation__item--current";
		}
		switch(strtolower($item->title)) {
			case "search": $icon = 'search'; break;
			case "donate": $icon = 'donate'; break;
			default: $icon = 'arrow-right'; break;
		}
		$output .= "<li class=\"$classes\">";
		$attributes = trim( $attributes );
		$title = apply_filters("the_title", $item->title, $item->ID);
		$item_output = "$args->before<a $attributes>$args->link_before$title$args->link_after <span class=\"icon icon--$icon navigation__icon\"></span></a>$args->after";
		// Since $output is called by reference we don't need to return anything.
		$output .= apply_filters(
			'walker_nav_menu_start_el',
			$item_output,
			$item,
			$depth,
			$args
		);
	}
	public function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= '</li>';
	}
	public function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '<ul>';
	}
	public function end_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '</ul>';
	}
}