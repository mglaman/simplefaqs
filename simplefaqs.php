<?php
/*
Plugin Name: Simple FAQs 
Version: 1.0.1
Plugin URI: http://glamanate.com/wordpress/simplefaqs
Description: Create a simple FAQ page using WordPress shortcodes.
Author: Matt Glaman
Author URI: http://glamanate.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

//Registers the short code to be placed within posts or pages.
add_shortcode( 'faq', array('SimpleFAQs', 'shortcode_callback') );

class SimpleFAQs {
	
	protected static $scripts_loaded = FALSE;
	
	public static function shortcode_callback( $atts, $content='') {
		if(!self::$scripts_loaded)
			self::enqueue_files();
		
		extract( shortcode_atts(array('title' => ''), $atts) );
		
		$html;
		$html = '<div class="simplefaq-item">';
		$html   .= '<a class="question">' . $title . '</a>';
		$html	.= '<div class="answer">'. $content . '</div>';
		$html .='</div>';
		
		return $html;
		
	}
	
	/**
	 * Enqueques CSS and JSS.
	 */
	protected static function enqueue_files() {
		//Gotta have jQuery to make the magic happen.
		wp_enqueue_script('jquery');
		wp_enqueue_script('simplefaqs-js', plugins_url( '/simplefaqs.js', __FILE__ ));	
		wp_enqueue_style('simplefaqs-style', plugins_url( '/simplefaqs.css', __FILE__ ));
			
		
	}
}

?>
