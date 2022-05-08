<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Ravely_Reviews_Admin
 *
 * This class contains admin page.
 *
 * @package		RAVELY
 * @subpackage	Classes/Ravely_Reviews_Admin
 * @author		Ravely
 * @since		1.0.0
 */
class Ravely_Reviews_Admin{

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
	 * RAVELY()->admin->render_admin_page( 'my text' );
	 * 
	 */
	 
	function render_admin_page() {
    if (array_key_exists('submit_settings', $_POST)) {
      RAVELY()->helpers->set_business_id($_POST['business_id']);
      RAVELY()->helpers->set_floating_widget_enabled($_POST['enable_floating_widget']);

      ?>
      <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"><strong>Settings Saved</strong></div>
      <?php
    }

    $business_id = RAVELY()->helpers->get_business_id();
    $floating_widget_enabled = RAVELY()->helpers->get_floating_widget_enabled();

    ?>
    <div class="wrap">
      <h2>Ravely Settings</h2>
      <form method="POST" action="">
        <table class="form-table" role="presentation">
          <tr>
            <th scope="row">
              <label for="business_id">Business ID</label>
            </th>
            <td>
              <input type="text" name="business_id" class="regular-text" value="<?php print $business_id; ?>">
              <p><strong>Required</strong> (You can find your business ID in your <a href="https://dashboard.ravely.io/business" target="_blank">dashboard</a>)</p>
            </td>
          </tr>

          <tr>
            <th scope="row">
              Floating Widget
            </th>
            <td>
              <label for="enable_floating_widget">
                <input name="enable_floating_widget" id="enable_floating_widget" type="checkbox" value="true" <?php if ($floating_widget_enabled) print 'checked' ?> />
                Enable Floating Widget on all pages
              </label>
              <p>Enabling this will show your Floating Widget on all pages without manually embedding them one by one. This can be enabled or disabled at any time.</p>
            </td>
          </tr>
        </table>

        <p class="submit">
          <input type="submit" name="submit_settings" class="button button-primary" value="UPDATE SETTINGS" />
        </p>
      </form>

      <div>
          <h3 class="title">Embed Widgets Manually</h3>
          <p>
            You can embed widgets manually by copy and pasting one of these shortcodes in your post, page or template.<br/>
            For examples on how each widget looks like, please refer to the <a href="https://ravely.io/products" target="_blank">Products page.</a>
          </p>

          <h4>Floating Widget</h4>
          <input type="text" readonly class="large-text code" value="[ravely_widget]">
          <h4>Wall of Love</h4>
          <input type="text" readonly class="large-text code" value='[ravely_widget type="wall-of-love"]'>
          <h4>Marquee</h4>
          <input type="text" readonly class="large-text code" value='[ravely_widget type="marquee"]'>
        </div>
    </div>
    <?php
  }
}