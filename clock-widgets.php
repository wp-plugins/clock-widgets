<?php
ob_start();
/**
  Plugin Name: Clock Widget
  Plugin URI: http://www.headwaywebsolutions.com/
  Description: A widget that serves as an clock for developing more advanced widgets.
  Version: 0.1
  Author: Nitin Maurya
  License: GPL
 * Author URI: http://www.headwaywebsolutions.com/
 Copyright 2012  Nitin Maurya  (email : nitin.headwaywebsolutions@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	
	Contact Nitin Maurya at http://www.headwaywebsolutions.com/
*/



add_action( 'widgets_init', 'clock_load_widgets' );

function clock_load_widgets() {

	register_widget( 'Clock_Widgets' );

}
/**

 * Example Widget class.

 * This class handles everything that needs to be handled with the widget:

 * the settings, form, display, and update.  Nice!

 *

 * @since 0.1

 */
class Clock_Widgets extends WP_Widget {
	/**

	 * Widget setup.

	 */

	function Clock_Widgets() {

		/* Widget settings. */

		$widget_ops = array( 'classname' => 'clock', 'description' => __('An example widget that displays a clock.', 'clock') );



		/* Widget control settings. */

		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'clock-widgets' );



		/* Create the widget. */

		$this->WP_Widget( 'clock-widgets', __('Clock Widget', 'clock'), $widget_ops, $control_ops );

	}



	/**

	 * How to display the widget on the screen.

	 */

	function widget( $args, $instance ) {

		extract( $args );



		/* Our variables from the widget settings. */

		$title = apply_filters('widget_title', $instance['title'] );

		

		/* Before widget (defined by themes). */

		echo $before_widget;



		/* Display the widget title if one was input (before and after defined by themes). */

		if ( $title )

			echo $before_title . $title . $after_title;



		/* Display name from widget settings if one was input. */

		

			echo '<div class="clock">

		 

			  <ul class="clocks">

				  <li id="Date"></li>

				  <li id="hours"></li>

				  <li id="point">:</li>

				  <li id="min"></li>

				  <li id="point">:</li>

				  <li id="sec"></li>

				  <li id="am"></li>

			  </ul>

			</div>';

		/* After widget (defined by themes). */

		echo $after_widget;

	}



	/**

	 * Update the widget settings.

	 */

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
	function form( $instance ) {
		$defaults = array( 'title' => __('Clock', 'clock') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
<!-- Widget Title: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" /></p><?php } }?>
            <?php 
			function clock_addcss() { // include style sheet
  	  			wp_enqueue_style('clock_addcss', '/' . PLUGINDIR . '/clock-widgets/clock.css' );        
			} 
			function clock_scripts_method() {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
				wp_enqueue_script( 'jquery' );
				wp_register_script( 'clock_js', '/' . PLUGINDIR . '/clock-widgets/clock.js');
				wp_enqueue_script( 'clock_js' );
			}    
 
 			function clock_script(){
					clock_addcss();
					clock_scripts_method();
				}
			add_action('wp_enqueue_scripts', 'clock_scripts_method');
			add_action('init', 'clock_script');
			?>
			