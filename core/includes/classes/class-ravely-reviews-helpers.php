<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Ravely_Reviews_Helpers
 *
 * This class contains repetitive functions that
 * are used globally within the plugin.
 *
 * @package		RAVELY
 * @subpackage	Classes/Ravely_Reviews_Helpers
 * @author		Ravely
 * @since		1.0.0
 */
class Ravely_Reviews_Helpers{

	/**
	 * ######################
	 * ###
	 * #### CALLABLE FUNCTIONS
	 * ###
	 * ######################
	 */

	/**
	 * HELPER COMMENT START
	 *
	 * Within this class, you can define common functions that you are 
	 * going to use throughout the whole plugin. 
	 * 
	 * Down below you will find a demo function called output_text()
	 * To access this function from any other class, you can call it as followed:
	 * 
	 * RAVELY()->helpers->output_text( 'my text' );
	 * 
	 */
	 
	/**
	 * Output some text
	 *
	 * @param	string	$text	The text to output
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	 public function output_text( $text = '' ){
		 echo $text;
	 }
	 
	/**
	 * Outputs the embed code.
	 * Use the following config:
	 * <code>
	 * $array = array(
	 * 	'key' => 'demo'
	 * 	'type' => 'marquee' | 'wall-of-love'
	 * )
	 * </code>
	 * @param array[string]string
	 */
	public function output_embed_code($attrs) {
		$key = $attrs['key'];
		$type = (isset($attrs['type'])) ? " data-ravely-embed-type={$attrs['type']}" : '';

    return "
    <!-- Start of Ravely embed script -->
    <!-- Let Customer Voices be the Success to your Brand -->
    <script async src=\"https://widget.ravely.io/widget?{$key}\"{$type}></script>
    <!-- End of Ravely embed script -->
    ";
	}


	/**
	 * Return business ID.
	 *
	 * @access	public
	 * @since	1.0.0
	 * @return string business_id
	 */
	public function get_business_id(){
		return get_option('business_id', '');
	}

	/**
	 * Set business ID
	 *
	 * @access	public
	 * @since	1.0.0
	 * @param	string business_id
	 */
	public function set_business_id($business_id){
		return update_option('business_id', $business_id);
	}

	/**
	 * Return floating_widget_enabled setting.
	 *
	 * @access	public
	 * @since	1.0.0
	 * @return string floating_widget_enabled
	 */
	public function get_floating_widget_enabled(){
		return get_option('floating_widget_enabled', '');
	}

	/**
	 * Set floating_widget_enabled setting.
	 *
	 * @access	public
	 * @since	1.0.0
	 * @param	string floating_widget_enabled
	 */
	public function set_floating_widget_enabled($floating_widget_enabled){
		return update_option('floating_widget_enabled', $floating_widget_enabled);
	}

	 /**
	  * HELPER COMMENT END
	  */

}