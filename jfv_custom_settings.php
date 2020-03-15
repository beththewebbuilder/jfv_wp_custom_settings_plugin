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
  add_settings_field('jfv_settings_banner_img', __('Homepage banner img', 'jfv_settings'), 'jfv_settings_banner_img', 'jfv_settings', 'jfv_settings_section_developers',
  [
    'label_for' => 'jfv_settings_banner_img',
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
  add_settings_field('jfv_settings_homepage_testimonial1', __('Review 1', 'jfv_settings'), 'jfv_settings_homepage_testimonial1', 'jfv_settings', 'jfv_settings_section_developers',
  [
    'label_for' => 'jfv_settings_homepage_testimonial1',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_settings_homepage_testimonial2', __('Review 2', 'jfv_settings'), 'jfv_settings_homepage_testimonial2', 'jfv_settings', 'jfv_settings_section_developers',
  [
    'label_for' => 'jfv_settings_homepage_testimonial2',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_settings_homepage_testimonial3', __('Review 3', 'jfv_settings'), 'jfv_settings_homepage_testimonial3', 'jfv_settings', 'jfv_settings_section_developers',
  [
    'label_for' => 'jfv_settings_homepage_testimonial3',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_settings_video1_placeholder', __('Highlight video 1 placeholder image', 'jfv_settings'), 'jfv_settings_video1_placeholder', 'jfv_settings', 'jfv_settings_section_developers',
  [
    'label_for' => 'jfv_settings_video1_placeholder',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_settings_video1_alttext', __('Highlight video 1 alt text', 'jfv_settings'), 'jfv_settings_video1_alttext', 'jfv_settings', 'jfv_settings_section_developers',
  [
    'label_for' => 'jfv_settings_video1_alttext',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_settings_video1_vimeoid', __('Highlight video 1 vimeo ID', 'jfv_settings'), 'jfv_settings_video1_vimeoid', 'jfv_settings', 'jfv_settings_section_developers',
  [
    'label_for' => 'jfv_settings_video1_vimeoid',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_settings_video2_placeholder', __('Highlight video 2 placeholder image', 'jfv_settings'), 'jfv_settings_video2_placeholder', 'jfv_settings', 'jfv_settings_section_developers',
  [
    'label_for' => 'jfv_settings_video2_placeholder',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_settings_video2_alttext', __('Highlight video 2 alt text', 'jfv_settings'), 'jfv_settings_video2_alttext', 'jfv_settings', 'jfv_settings_section_developers',
  [
    'label_for' => 'jfv_settings_video2_alttext',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_settings_video2_vimeoid', __('Highlight video 2 vimeo ID', 'jfv_settings'), 'jfv_settings_video2_vimeoid', 'jfv_settings', 'jfv_settings_section_developers',
  [
    'label_for' => 'jfv_settings_video2_vimeoid',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);

  //** About fields **//
  add_settings_field('jfv_about_settings_header', __('About header', 'jfv_about_settings'), 'jfv_about_settings_header', 'jfv_about_settings', 'jfv_about_settings_section_developers',
  [
    'label_for' => 'jfv_about_settings_header',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_about_settings_short_text', __('About me (short text)', 'jfv_about_settings'), 'jfv_about_settings_short_text', 'jfv_about_settings', 'jfv_about_settings_section_developers',
  [
    'label_for' => 'jfv_about_settings_short_text',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_about_settings_detailed_text', __('About me (detailed text)', 'jfv_about_settings'), 'jfv_about_settings_detailed_text', 'jfv_about_settings', 'jfv_about_settings_section_developers',
  [
    'label_for' => 'jfv_about_settings_detailed_text',
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
  add_settings_field('jfv_contact_settings_vimeo', __('Vimeo', 'jfv_contact_settings'), 'jfv_contact_settings_vimeo', 'jfv_contact_settings', 'jfv_contact_settings_section_developers',
  [
    'label_for' => 'jfv_contact_settings_vimeo',
    'class' => 'jfv_settings_row',
    'jfv_settings_custom_data' => 'custom',
  ]);
  add_settings_field('jfv_contact_settings_pinterest', __('Pinterest', 'jfv_contact_settings'), 'jfv_contact_settings_pinterest', 'jfv_contact_settings', 'jfv_contact_settings_section_developers',
  [
    'label_for' => 'jfv_contact_settings_pinterest',
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
 <p id="<?php echo esc_attr( $args['id'] ); ?>">
   <?php esc_html_e( 'Set custom settings for the website homepage.', 'jfv_settings' ); ?>
 </p>
 <div style="border: 1px solid grey; padding: 10px;">
   <strong>Getting photos from Pinterest:</strong>
   <ul>
     <li>* Find image on Pinterest</li>
     <li>* Right click and select <b>Open Image in New Tab</b></li>
     <li>* The URL will look something like this: 'https://i.pinimg.com/564x/4d/8a/f8/4d8af81bde025fc978fb16ef4f1c0ad9.jpg'</li>
     <li>* You need to replace <b>564x</b> with <b>originals</b>: it will look like this: 'https://i.pinimg.com/<b>originals</b>/4d/8a/f8/4d8af81bde025fc978fb16ef4f1c0ad9.jpg'</li>
   </ul>
 </div>
 <div style="border: 1px solid grey; padding: 10px; margin-top: 20px;">
   <strong>Getting Vimeo video ID:</strong>
   <ul>
     <li>* Find video on Vimeo</li>
     <li>* The URL will look something like this: 'https://vimeo.com/<b>373896117</b>'</li>
     <li>* The Id you need is at the end of the URL, in this example: <b>373896117</b></li>
   </ul>
 </div>
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

//Testimonial 1
function jfv_settings_homepage_testimonial1( $args ) {
  $options = get_option( 'jfv_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>" />
  <?
}

//Testimonial 2
function jfv_settings_homepage_testimonial2( $args ) {
  $options = get_option( 'jfv_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>" />
  <?
}

//Testimonial 3
function jfv_settings_homepage_testimonial3( $args ) {
  $options = get_option( 'jfv_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>" />
  <?
}

//Video 1 placeholder
function jfv_settings_video1_placeholder( $args ) {
  $options = get_option( 'jfv_settings_options' );
  ?>
  <p class="description">
    Remember it's important to replace the <b>'564x'</b> in the Pinterest URL with <b>'originals'</b>
  </p>

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

//Video 1 alt text
function jfv_settings_video1_alttext( $args ) {
  $options = get_option( 'jfv_settings_options' ); ?>
  <p class="description">
    This is important for your SEO.  It's used to describe the appearance and function of an image on a page. Keep it relatively short but descriptive. For more information or example alt text click <a href="https://moz.com/learn/seo/alt-text">here</a>
  </p>

  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>" />
  <?
}

//Video 1 vimeo ID
function jfv_settings_video1_vimeoid( $args ) {
  $options = get_option( 'jfv_settings_options' ); ?>
  <p class="description">
    <?php esc_html_e( 'Enter the Vimeo ID for the banner video.', 'jfv_settings' ); ?>
  </p>

  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>" />
  <?
}

//Video 2 placeholder
function jfv_settings_video2_placeholder( $args ) {
  $options = get_option( 'jfv_settings_options' );
  ?>
  <p class="description">
    Remember it's important to replace the <b>'564x'</b> in the Pinterest URL with <b>'originals'</b>
  </p>

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

//Video 2 alt text
function jfv_settings_video2_alttext( $args ) {
  $options = get_option( 'jfv_settings_options' ); ?>
  <p class="description">
    This is important for your SEO.  It's used to describe the appearance and function of an image on a page. Keep it relatively short but descriptive. For more information or example alt text click <a href="https://moz.com/learn/seo/alt-text">here</a>
  </p>

  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>" />
  <?
}

//Video 2 vimeo ID
function jfv_settings_video2_vimeoid( $args ) {
  $options = get_option( 'jfv_settings_options' ); ?>
  <p class="description">
    <?php esc_html_e( 'Enter the Vimeo ID for the banner video.', 'jfv_settings' ); ?>
  </p>

  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>" />
  <?
}

//** About fields **//
//about header
function jfv_about_settings_header( $args ) {
  $options = get_option( 'jfv_about_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_about_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>" />
  <?
}

//about short text
function jfv_about_settings_short_text( $args ) {
  $options = get_option( 'jfv_about_settings_options' ); ?>
  <p class="description">
    Short about description for homepage
  </p>

  <textarea id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_about_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%; height: 200px;"><?php echo $options[ $args['label_for'] ]; ?></textarea>
  <?
}

//about detailed text
function jfv_about_settings_detailed_text( $args ) {
  $options = get_option( 'jfv_about_settings_options' ); ?>
  <p class="description">
    Detailed about description for 'About Me' page
  </p>

  <textarea id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_about_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%; height: 200px;"><?php echo $options[ $args['label_for'] ]; ?></textarea>
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

// Vimeo
function jfv_contact_settings_vimeo( $args ) {
  $options = get_option( 'jfv_contact_settings_options' ); ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['jfv_settings_custom_data'] ); ?>"
  name="jfv_contact_settings_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
  type="text" style="width: 50%;" value="<?php echo $options[ $args['label_for'] ]; ?>"/>
<?php }

// Pinterest
function jfv_contact_settings_pinterest( $args ) {
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
