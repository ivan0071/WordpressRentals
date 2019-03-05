<?php
/*
  @package verso-lite
 * Theme Customizer Sanization Functions
 */

/********************* VERSO LITE CUSTOMIZER SANITIZE FUNCTIONS *******************************/
function verso_checkbox_integer( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}
function verso_sanitize_select( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}
function verso_numeric_value( $input ) {
	if(is_numeric($input)){
	return $input;
	}
}
function verso_sanitize_custom_css( $input ) {
	if ( $input != '' ) {
		$input = str_replace( '<=', '&lt;=', $input );
		$input = wp_kses_split( $input, array(), array() );
		$input = str_replace( '&gt;', '>', $input );
		$input = strip_tags( $input );
		return $input;
	}
	else {
		return '';
	}
}
function verso_sanitize_page( $input ) {
	if(  get_post( $input ) ){
		return $input;
	}
	else {
		return '';
	}
}
function verso_reset_alls( $input ) {
	if ( $input == 1 ) {
		delete_option( 'verso_lite_theme_options');
		$input=0;
		return $input;
	}
	else {
		return '';
	}
}
