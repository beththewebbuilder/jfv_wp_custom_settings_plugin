<?php
/**
 * Plugin Name: Jordan Fowler Videography: Test Post
 * Description: Add and update new videos and projects
 * Version: 1.0
 * Author: Bethany Fowler
 * Author URI: http://bethanyfowler.me/
 */


function jfv_settings(){ ?>
 <div class="wrap">
   <div id="icon-options-general" class="icon32"></div>
   <h2><span class="dashicons dashicons-admin-home"></span>Homepage Details</h2>
   <form method="post" action="options.php" enctype="multipart/form-data">
      <?php
          settings_fields( 'section' );
          do_settings_sections( 'homepage-section' );
          submit_button();
      ?>
   </form>
 </div>
<?php }

function jfv_about_settings(){ ?>
 <div class="wrap">
   <div id="icon-options-general" class="icon32"></div>
   <h2><span class="dashicons dashicons-admin-home"></span>About Details</h2>
   <form method="post" action="options.php" enctype="multipart/form-data">
      <?php
          settings_fields( 'about-section' );
          do_settings_sections( 'theme-options' );
          submit_button();
      ?>
   </form>
 </div>
<?php }

function jfv_contact_settings(){ ?>
 <div class="wrap">
   <div id="icon-options-general" class="icon32"></div>
   <h2><span class="dashicons dashicons-admin-home"></span>Contact Details</h2>
   <form method="post" action="options.php" enctype="multipart/form-data">
      <?php
          settings_fields( 'contact-section' );
          do_settings_sections( 'theme-options' );
          submit_button();
      ?>
   </form>
 </div>
<?php }


 // Custom settings
function custom_settings_add_menu() {
  add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', 'dashicons-admin-generic', 99 );
}
add_action( 'admin_menu', 'custom_settings_add_menu' );

 function custom_settings_page() { ?>
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

//banner image
function setting_banner_img() { ?>
  <input type="text" name="banner_img" id="banner_img" style="width: 50%;" value="<?php echo get_option( 'banner_img' ); ?>" />
  <?php
  if (empty(get_option('banner_img')) ) {
    ?>
    <p><i>No image selected</i></p>
    <?php
  }
  else {
    ?>
    <div>
      <img height="200px" style="padding: 10px;" src="<?php echo get_option('banner_img'); ?>">
    </div>
    <?php
  }
}

//banner video
function setting_banner_vid() { ?>
  <input type="text" name="banner_vid" id="banner_vid" style="width: 50%;" value="<?php echo get_option( 'banner_vid' ); ?>" />
  <?
}

//Homepage title
function setting_homepage_title() { ?>
  <input type="text" name="homepage_title" id="homepage_title" style="width: 50%;" value="<?php echo get_option( 'homepage_title' ); ?>" />
  <?
}

//Homepage subtitle
function setting_homepage_subtitle() { ?>
  <input type="text" name="homepage_subtitle" id="homepage_subtitle" style="width: 50%;" value="<?php echo get_option( 'homepage_subtitle' ); ?>" />
  <?
}

function validate_setting($plugin_options) { $keys = array_keys($_FILES); $i = 0; foreach ( $_FILES as $image ) {
  // if a files was upload
  if ($image['size']) {
    // if it is an image
    if ( preg_match('/(jpg|jpeg|png|gif)$/', $image['type']) ) {
      $override = array('test_form' => false);
      // save the file, and store an array, containing its location in $file
      $file = wp_handle_upload( $image, $override );
      $plugin_options[$keys[$i]] = $file['url'];
    }
    else {
      // Not an image.
      $options = get_option('banner_img');
      $plugin_options[$keys[$i]] = $options[$logo];
      // Die and let the user know that they made a mistake.
      wp_die('No image was uploaded.');
    }
  }   // Else, the user didn't upload a file.   // Retain the image that's already on file.
  else {
    $options = get_option('banner_img');
    $plugin_options[$keys[$i]] = $options[$keys[$i]];
  }
  $i++;
} return $plugin_options;}


//homepage text
function setting_text() { ?>
  <textarea type="text" name="about_us" id="about_us" style="width: 50%; height: 200px;"><?php echo get_option('about_us');?></textarea>
  <?
}
//about image
function setting_about_img() { ?>
  <input type="text" name="about_img" id="about_img" style="width: 50%;" value="<?php echo get_option( 'about_img' ); ?>" />
  <?php
  if (empty(get_option('about_img')) ) {
    ?>
    <p><i>No image selected</i></p>
    <?php
  }
  else {
    ?>
    <div>
      <img height="200px" style="padding: 10px;" src="<?php echo get_option('about_img'); ?>">
    </div>
    <?php
  }
}

// create menu bar and sub menu items
function custom_settings_options_panel(){
  add_menu_page('JFV Settings', 'JFV Settings', 'manage_options', 'jfv_settings', 'jfv_settings_options_page_html', 'dashicons-edit');
  add_submenu_page( 'jfv_settings', 'Contact', 'Contact', 'manage_options', 'custom-op-contact', 'jfv_contact_settings');
  add_submenu_page( 'jfv_settings', 'About', 'About', 'manage_options', 'custom-op-about', 'jfv_about_settings');
  add_settings_section( 'homepage_section', 'section_title', 'section_callback', 'section_page_type' );
}
add_action('admin_menu', 'custom_settings_options_panel');
