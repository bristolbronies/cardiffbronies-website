<?php

/**
 * Get the content of custom fields 
 * @param  string $field_name The name of the field to get.
 * @param  int    $id         The post ID to target (if not set will assume from context).
 * @return mixed              Will return the data stored in the field if the field was found, if not will return false.
 */
function bb_custom_field($field_name, $id = false) {
	if(strlen(get_field($field_name, $id)) > 0) {
		return get_field($field_name, $id);
	}
	else {
		return false;
	}
}

/**
 * Return the formatted page title.
 * @return string The title of the page. 
 */
function bb_page_title() {
	$title = "";
	if(is_front_page()) {
		$title .= get_bloginfo('name');
		$title .=  " | "; 
		$title .= get_bloginfo('description');
	}
	else {
		$title .= wp_title('', false, 'right');
		$title .= " | ";
		$title .= get_bloginfo('name');
	}
	return $title;
}