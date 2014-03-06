<?php
/*
Plugin Name: Fontpress Awesome
Plugin URI: http://patrickshampine.com
Description: Embed Font Awesome (http://fontawesome.io) from the Bootstrap CDN, maybe allow shortcode usage in WSYIAWESOME?
Version: 0.1
Author: Patrick Shampine
Author URI: http://patrickshampine.com
Author Email: patrick@patrickshampine.com

License: 

http://opensource.org/licenses/mit-license.html

See Font Awesome for more: http://fortawesome.github.io/Font-Awesome/get-started/
*/


function register_font_awesome() {
	wp_enqueue_style('font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', false, null, false);
}
add_action('get_header','register_font_awesome');

function awesome_codes($atts) {
  extract(shortcode_atts(array(
    'font'  => '',
  ), $atts));
  $awesome = '<i class="fa '.$font.'"></i>';
  return $awesome;
}
add_shortcode( 'fa', 'awesome_codes' );

?>