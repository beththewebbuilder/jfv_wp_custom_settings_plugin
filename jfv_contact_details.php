<?php
/**
 * Plugin Name: Jordan Fowler Videography: Contact Details
 * Description: Create admin input for custom contact details
 * Version: 1.0
 * Author: Bethany Fowler
 * Author URI: http://bethanyfowler.me/
 */

 // Custom settings
function custom_settings_add_contact_submenu() {
  add_submenu_page('custom-settings', 'Contact Details', 'Contact Details', 'manage-options', 'contact_custom_page' );
}
add_action( 'admin_menu', 'custom_settings_add_contact_submenu' );


 function custom_settings_contact_subpage() { ?>
  <div class="wrap">
    <form method="post" action="options.php" enctype="multipart/form-data">
       <?php
           settings_fields( 'section' );
           do_settings_sections( 'theme-options' );
           submit_button();
       ?>
    </form>
  </div>
<?php }

// Mobile Telephone
function setting_phone_mob() { ?>
  <input type="text" name="phone_mob" id="phone_mob" style="width: 50%;" value="<?php echo get_option( 'phone_mob' ); ?>" />
<?php }
// Telephone
function setting_phone_tel() { ?>
  <input type="text" name="phone_tel" id="phone_tel" style="width: 50%;" value="<?php echo get_option( 'phone_tel' ); ?>" />
<?php }
// Email
function setting_email() { ?>
  <input type="text" name="email" id="email" style="width: 50%;" value="<?php echo get_option( 'email' ); ?>" />
<?php }
// Facebook
function setting_facebook() { ?>
  <input type="text" name="facebook" id="facebook" style="width: 50%;" value="<?php echo get_option( 'facebook' ); ?>" />
<?php }
// Instagram
function setting_instagram() { ?>
  <input type="text" name="instagram" id="instagram" style="width: 50%;" value="<?php echo get_option( 'instagram' ); ?>" />
<?php }

// Web Author
function setting_webauthor() { ?>
  <input type="text" name="webauthor" id="webauthor" style="width: 50%;" value="<?php echo get_option( 'webauthor' ); ?>" />
<?php }
// Web Author Address
function setting_webauthor_address() { ?>
  <input type="text" name="webauthor_address" id="webauthor_address" style="width: 50%;" value="<?php echo get_option( 'webauthor_address' ); ?>" />
<?php }

// Google Analytics
function setting_google_analytics_src() { ?>
  <input type="text" name="google_analytics_src" id="google_analytics_src" style="width: 50%;" value="<?php echo get_option( 'google_analytics_src' ); ?>" />
<?php }
function setting_google_analytics_tag() { ?>
  <input type="text" name="google_analytics_tag" id="google_analytics_tag" style="width: 50%;" value="<?php echo get_option( 'google_analytics_tag' ); ?>" />
<?php }

function custom_settings_contact_subpage_setup() {
  add_settings_section( 'section', 'All Settings', null, 'theme-options' );

  add_settings_field( 'phone_tel', 'Contact Number', 'setting_phone_tel', 'theme-options', 'section' );
  add_settings_field( 'email', 'Email', 'setting_email', 'theme-options', 'section' );
  add_settings_field( 'facebook', 'Facebook', 'setting_facebook', 'theme-options', 'section' );
  add_settings_field( 'instagram', 'Instagram', 'setting_instagram', 'theme-options', 'section' );
  add_settings_field( 'webauthor', 'Web Author', 'setting_webauthor', 'theme-options', 'section' );
  add_settings_field( 'webauthor_address', 'Web Author Address', 'setting_webauthor_address', 'theme-options', 'section' );
  add_settings_field( 'google_analytics_src', 'Google Analytics src', 'setting_google_analytics_src', 'theme-options', 'section' );
  add_settings_field( 'google_analytics_tag', 'Google Analytics tag', 'setting_google_analytics_tag', 'theme-options', 'section' );

  register_setting('section', 'phone_tel');
  register_setting('section', 'email');
  register_setting('section', 'facebook');
  register_setting('section', 'instagram');
  register_setting('section', 'linkedin');
  register_setting('section', 'webauthor');
  register_setting('section', 'webauthor_address');
  register_setting('section', 'google_analytics_src');
  register_setting('section', 'google_analytics_tag');
}
add_action( 'admin_init', 'custom_settings_contact_subpage_setup' );
