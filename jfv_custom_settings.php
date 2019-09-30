<?php
/**
 * Plugin Name: Jordan Fowler Videography: Custom website settings
 * Description: Edit and save website settings
 * Version: 1.0
 * Author: Bethany Fowler
 * Author URI: http://bethanyfowler.me/
 */

//create new settings area
function jfv_settings_init() {
  //register new setting for the jfv page
  register_setting( 'jfv_settings', 'jfv_settings_options' );
  register_setting( 'jfv_about_settings', 'jfv_about_settings_options' );
  register_setting( 'jfv_contact_settings', 'jfv_contact_settings_options' );
  register_setting( 'jfv_additional_settings', 'jfv_additional_settings_options' );

  // register a new section in the "jfv_settings" page
  add_settings_section(
    'jfv_settings_section_developers', //id
    __( 'Jordan Fowler Videography Homepage Settings', 'jfv_settings' ), //title
    'jfv_settings_section_developers_cb', //callback
    'jfv_settings' //page
  );
  add_settings_section(
    'jfv_about_settings_section_developers', //id
    __( 'Jordan Fowler Videography About Settings', 'jfv_about_settings' ), //title
    'jfv_about_settings_section_developers_cb', //callback
    'jfv_about_settings' //page
  );
  add_settings_section(
    'jfv_contact_settings_section_developers', //id
    __( 'Jordan Fowler Videography Contact Settings', 'jfv_contact_settings' ), //title
    'jfv_contact_settings_section_developers_cb', //callback
    'jfv_contact_settings' //page
  );
  add_settings_section(
    'jfv_additional_settings_section_developers', //id
    __( 'Jordan Fowler Videography Additional Settings', 'jfv_additional_settings' ), //title
    'jfv_additional_settings_section_developers_cb', //callback
    'jfv_additional_settings' //page
  );

  //** Homepage fields **//

  // register a new field in the "jfv_settings_section_developers" section, inside the "jfv_settings" page
  add_settings_field('jfv_settings_banner_img', __('Banner img', 'jfv_settings'), 'jfv_settings_banner_img', 'jfv_settings', 'jfv_settings_section_developers',
  [
    'label_for' => 'jfv_settings_banner_img',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_settings_banner_vid', __('Banner video ID', 'jfv_settings'), 'jfv_settings_banner_vid', 'jfv_settings', 'jfv_settings_section_developers',
  [
    'label_for' => 'jfv_settings_banner_vid',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_settings_homepage_title', __('Homepage header text', 'jfv_settings'), 'jfv_settings_homepage_title', 'jfv_settings', 'jfv_settings_section_developers',
  [
    'label_for' => 'jfv_settings_homepage_title',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_settings_homepage_subtitle', __('Homepage subheader text', 'jfv_settings'), 'jfv_settings_homepage_subtitle', 'jfv_settings', 'jfv_settings_section_developers',
  [
    'label_for' => 'jfv_settings_homepage_subtitle',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);

  //** About fields **//
  add_settings_field('jfv_about_settings_text', __('About me', 'jfv_about_settings'), 'jfv_about_settings_text', 'jfv_about_settings', 'jfv_about_settings_section_developers',
  [
    'label_for' => 'jfv_about_settings_text',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_about_settings_img', __('Profile image', 'jfv_about_settings'), 'jfv_about_settings_img', 'jfv_about_settings', 'jfv_about_settings_section_developers',
  [
    'label_for' => 'jfv_about_settings_img',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);

  //** Contact fields **//
  add_settings_field('jfv_contact_settings_phone_mob', __('Mobile no.', 'jfv_contact_settings'), 'jfv_contact_settings_phone_mob', 'jfv_contact_settings', 'jfv_contact_settings_section_developers',
  [
    'label_for' => 'jfv_contact_settings_phone_mob',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_contact_settings_phone_tel', __('Home no.', 'jfv_contact_settings'), 'jfv_contact_settings_phone_tel', 'jfv_contact_settings', 'jfv_contact_settings_section_developers',
  [
    'label_for' => 'jfv_contact_settings_phone_tel',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_contact_settings_email', __('Email', 'jfv_contact_settings'), 'jfv_contact_settings_email', 'jfv_contact_settings', 'jfv_contact_settings_section_developers',
  [
    'label_for' => 'jfv_contact_settings_email',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_contact_settings_facebook', __('Facebook', 'jfv_contact_settings'), 'jfv_contact_settings_facebook', 'jfv_contact_settings', 'jfv_contact_settings_section_developers',
  [
    'label_for' => 'jfv_contact_settings_facebook',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_contact_settings_instagram', __('Instagram', 'jfv_contact_settings'), 'jfv_contact_settings_instagram', 'jfv_contact_settings', 'jfv_contact_settings_section_developers',
  [
    'label_for' => 'jfv_contact_settings_instagram',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);

  //** Additional fields **//
  add_settings_field('jfv_additional_settings_webauthor', __('Web author', 'jfv_additional_settings'), 'jfv_additional_settings_webauthor', 'jfv_additional_settings', 'jfv_additional_settings_section_developers',
  [
    'label_for' => 'jfv_additional_settings_webauthor',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_additional_settings_webauthor_address', __('Web author URL', 'jfv_additional_settings'), 'jfv_additional_settings_webauthor_address', 'jfv_additional_settings', 'jfv_additional_settings_section_developers',
  [
    'label_for' => 'jfv_additional_settings_webauthor_address',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_additional_settings_google_analytics_src', __('Google analytics URL', 'jfv_additional_settings'), 'jfv_additional_settings_google_analytics_src', 'jfv_additional_settings', 'jfv_additional_settings_section_developers',
  [
    'label_for' => 'jfv_additional_settings_google_analytics_src',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_additional_settings_google_analytics_tag', __('Google analytics tag', 'jfv_additional_settings'), 'jfv_additional_settings_google_analytics_tag', 'jfv_additional_settings', 'jfv_additional_settings_section_developers',
  [
    'label_for' => 'jfv_additional_settings_google_analytics_tag',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
}

add_action( 'admin_init', 'jfv_settings_init' );

//homepage section settings
function jfv_settings_section_developers_cb( $args ) {
 ?>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Set custom settings for the website homepage.', 'jfv_settings' ); ?></p>
 <?php
}

//about section settings
function jfv_about_settings_section_developers_cb( $args ) {
 ?>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Set custom settings for the website about section.', 'jfv_about_settings' ); ?></p>
 <?php
}

//contact section settings
function jfv_contact_settings_section_developers_cb( $args ) {
 ?>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Set custom settings for the website contact section.', 'jfv_contact_settings' ); ?></p>
 <?php
}

//additional section settings
function jfv_additional_settings_section_developers_cb( $args ) {
 ?>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Set additional custom settings for the website contact section.', 'jfv_additional_settings' ); ?></p>
 <?php
}

//** Homepage fields **//
//banner image
function jfv_settings_banner_img( $args ) {
  $options = get_option( 'jfv_settings_options' );
  ?>

  <input
  id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
   type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>" />
  <?php
  if (empty($options[ $args['label_for']]) ) {
    ?>
    <p><i>No image selected</i></p>
    <?php
  }
  else {
    ?>
    <div>
      <img height="200px" style="padding: 10px;" src="<?php echo $options[ $args['label_for'] ]; ?>">
    </div>
    <?php
  }
}

//banner video
function jfv_settings_banner_vid( $args ) {
  $options = get_option( 'jfv_settings_options' ); ?>

  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>" />

  <p class="description">
  <?php esc_html_e( 'Enter the Vimeo ID for the banner video.', 'jfv_settings' ); ?>
  </p>
  <?php
}

//Homepage title
function jfv_settings_homepage_title( $args ) {
  $options = get_option( 'jfv_settings_options' ); ?>

  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>" />

  <?php
}

//Homepage subtitle
function jfv_settings_homepage_subtitle( $args ) {
  $options = get_option( 'jfv_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>" />
  <?
}

//** About fields **//
//about text
function jfv_about_settings_text( $args ) {
  $options = get_option( 'jfv_about_settings_options' ); ?>
  <textarea id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_about_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%; height: 200px;">
    <?php echo $options[ $args['label_for'] ]; ?>
  </textarea>
  <?
}

//about image
function jfv_about_settings_img( $args ) {
  $options = get_option( 'jfv_about_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_about_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>"/>
  <?php
  if (empty($options[ $args['label_for'] ]) ) {
    ?>
    <p><i>No image selected</i></p>
    <?php
  }
  else {
    ?>
    <div>
      <img height="200px" style="padding: 10px;" src="<?php echo $options[ $args['label_for'] ]; ?>">
    </div>
    <?php
  }
}


//** Contact fields **//
// Mobile Telephone
function jfv_contact_settings_phone_mob( $args ) {
  $options = get_option( 'jfv_contact_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_contact_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>"/>
<?php }

// Telephone
function jfv_contact_settings_phone_tel( $args ) {
  $options = get_option( 'jfv_contact_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_contact_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>"/>
<?php }

// Email
function jfv_contact_settings_email( $args ) {
  $options = get_option( 'jfv_contact_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_contact_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>"/>
<?php }

// Facebook
function jfv_contact_settings_facebook( $args ) {
  $options = get_option( 'jfv_contact_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_contact_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>"/>
<?php }

// Instagram
function jfv_contact_settings_instagram( $args ) {
  $options = get_option( 'jfv_contact_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_contact_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>"/>
<?php }

//** Additional Fields **//
// Web Author
function jfv_additional_settings_webauthor( $args ) {
  $options = get_option( 'jfv_additional_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_additional_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>"/>
<?php }
// Web Author Address
function jfv_additional_settings_webauthor_address( $args ) {
  $options = get_option( 'jfv_additional_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_additional_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>"/>
<?php }

// Google Analytics
function jfv_additional_settings_google_analytics_src( $args ) {
  $options = get_option( 'jfv_additional_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_additional_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>"/>
<?php }

function jfv_additional_settings_google_analytics_tag( $args ) {
  $options = get_option( 'jfv_additional_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_additional_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>"/>
<?php }

/**

 * top level menu
 */
 function jfv_settings_options_page(){
   add_menu_page('JFV Settings', 'JFV Settings', 'manage_options', 'jfv_settings', 'jfv_settings_options_page_html', 'dashicons-edit');
   add_submenu_page( 'jfv_settings', 'About', 'About', 'manage_options', 'jfv_about_settings', 'jfv_settings_about_page_html');
   add_submenu_page( 'jfv_settings', 'Contact', 'Contact', 'manage_options', 'jfv_contact_settings', 'jfv_settings_contact_page_html');
   add_submenu_page( 'jfv_settings', 'Additional', 'Additional', 'manage_options', 'jfv_additional_settings', 'jfv_settings_additional_page_html');
 }
 add_action('admin_menu', 'jfv_settings_options_page');


//Homepage callback function
function jfv_settings_options_page_html() {
 // check user capabilities
 if ( ! current_user_can( 'manage_options' ) ) {
 return;
 }

 // add error/update messages

 // check if the user have submitted the settings
 // wordpress will add the "settings-updated" $_GET parameter to the url
 if ( isset( $_GET['settings-updated'] ) ) {
 // add settings saved message with the class of "updated"
 add_settings_error( 'jfv_settings_messages', 'jfv_settings_message', __( 'Settings Saved', 'jfv_settings' ), 'updated' );
 }

 // show error/update messages
 settings_errors( 'jfv_settings_messages' );
 ?>
 <div class="wrap">
 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
 <form action="options.php" method="post">
 <?php
 // output security fields for the registered setting "jfv_settings"
 settings_fields( 'jfv_settings' );
 // output setting sections and their fields
 // (sections are registered for "jfv_settings", each field is registered to a specific section)
 do_settings_sections( 'jfv_settings' );
 // output save settings button
 submit_button( 'Save Settings' );
 ?>
 </form>
 </div>
 <?php
}

//About callback function
function jfv_settings_about_page_html() {
 // check user capabilities
 if ( ! current_user_can( 'manage_options' ) ) {
 return;
 }

 // add error/update messages

 // check if the user have submitted the settings
 // wordpress will add the "settings-updated" $_GET parameter to the url
 if ( isset( $_GET['settings-updated'] ) ) {
 // add settings saved message with the class of "updated"
 add_settings_error( 'jfv_settings_messages', 'jfv_settings_message', __( 'Settings Saved', 'jfv_about_settings' ), 'updated' );
 }

 // show error/update messages
 settings_errors( 'jfv_settings_messages' );
 ?>
 <div class="wrap">
 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
 <form action="options.php" method="post">
 <?php
 // output security fields for the registered setting "jfv_settings"
 settings_fields( 'jfv_about_settings' );
 // output setting sections and their fields
 // (sections are registered for "jfv_settings", each field is registered to a specific section)
 do_settings_sections( 'jfv_about_settings' );
 // output save settings button
 submit_button( 'Save Settings' );
 ?>
 </form>
 </div>
 <?php
}

function jfv_settings_contact_page_html() {
  // check user capabilities
  if ( ! current_user_can( 'manage_options' ) ) {
  return;
  }

  // add error/update messages

  // check if the user have submitted the settings
  // wordpress will add the "settings-updated" $_GET parameter to the url
  if ( isset( $_GET['settings-updated'] ) ) {
  // add settings saved message with the class of "updated"
  add_settings_error( 'jfv_settings_messages', 'jfv_settings_message', __( 'Settings Saved', 'jfv_contact_settings' ), 'updated' );
  }

  // show error/update messages
  settings_errors( 'jfv_settings_messages' );
  ?>
  <div class="wrap">
  <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
  <form action="options.php" method="post">
  <?php
  // output security fields for the registered setting "jfv_settings"
  settings_fields( 'jfv_contact_settings' );
  // output setting sections and their fields
  // (sections are registered for "jfv_settings", each field is registered to a specific section)
  do_settings_sections( 'jfv_contact_settings' );
  // output save settings button
  submit_button( 'Save Settings' );
  ?>
  </form>
  </div>
  <?php
}


function jfv_settings_additional_page_html() {
  // check user capabilities
  if ( ! current_user_can( 'manage_options' ) ) {
  return;
  }

  // add error/update messages

  // check if the user have submitted the settings
  // wordpress will add the "settings-updated" $_GET parameter to the url
  if ( isset( $_GET['settings-updated'] ) ) {
  // add settings saved message with the class of "updated"
  add_settings_error( 'jfv_settings_messages', 'jfv_settings_message', __( 'Settings Saved', 'jfv_additional_settings' ), 'updated' );
  }

  // show error/update messages
  settings_errors( 'jfv_settings_messages' );
  ?>
  <div class="wrap">
  <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
  <form action="options.php" method="post">
  <?php
  // output security fields for the registered setting "jfv_settings"
  settings_fields( 'jfv_additional_settings' );
  // output setting sections and their fields
  // (sections are registered for "jfv_settings", each field is registered to a specific section)
  do_settings_sections( 'jfv_additional_settings' );
  // output save settings button
  submit_button( 'Save Settings' );
  ?>
  </form>
  </div>
  <?php
}
