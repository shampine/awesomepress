<?php
/*
Plugin Name: AwesomePress
Plugin URI: https://github.com/patrickshampine/awesomepress
Description: Embed Font Awesome (http://fontawesome.io) from the Bootstrap CDN, maybe allow shortcode usage in WSYIAWESOME?
Version: 0.1
Author: Patrick Shampine
Author URI: http://patrickshampine.com
Author Email: patrick@patrickshampine.com

License: 

http://opensource.org/licenses/mit-license.html

See Font Awesome for more: http://fortawesome.github.io/Font-Awesome/get-started/
*/


class superAwesome {

  public function __construct() {
    add_action( 'init', array( &$this, 'init' ) );
  }

  public function init() {
    add_action( 'wp_enqueue_scripts', array( $this, 'register_font_awesome' ) );
    add_shortcode( 'fa', array( $this, 'awesome_codes' ) );
  }

  public function register_font_awesome() {
    wp_enqueue_style('font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', false, null, false);
  }

  public function awesome_codes($atts) {
    extract(shortcode_atts(array(
      'font'  => '',
    ), $atts));
    $awesome = '<i class="fa '.$font.'"></i>';
    return $awesome;
  }

}

new superAwesome();
