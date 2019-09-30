<?php
/**
 * Plugin Name: Jordan Fowler Videography: Homepage Post
 * Description: Add and update homepage sections
 * Version: 1.0
 * Author: Bethany Fowler
 * Author URI: http://bethanyfowler.me/
 */


function create_homepage_post() {
	register_post_type( 'homepage_post',
		array(
			'labels'       => array(
				'name'       => __( 'Homepage Section' ),
			),
			'public'       => true,
			'hierarchical' => true,
			'has_archive'  => true,
			'supports'     => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
			),
			'taxonomies'   => array(
				'post_tag',
				'category',
			),
			'menu_icon' => 'dashicons-schedule'
		)
	);
	register_taxonomy_for_object_type( 'category', 'homepage_post' );
	register_taxonomy_for_object_type( 'post_tag', 'homepage_post' );
}
add_action( 'init', 'create_homepage_post' );

function add_homepage_fields_meta_box() {
	add_meta_box(
		'homepage_fields_meta_box', // $id
		'homepage Fields', // $title
		'show_homepage_meta_box', // $callback
		'homepage_post', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_homepage_fields_meta_box' );

function show_homepage_meta_box() {
	global $post;
		$meta = get_post_meta( $post->ID, 'homepage_fields', true ); ?>

  <input type="hidden" name="homepage_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

  <form>
		<div class="form-group">
			<label>Section Image URL:</label>
			<input type="text" name="homepage_fields[section_img]" id="homepage_fields[section_img]" style="width: 50%;" value="<?php echo $meta['section_img']; ?>" />
		</div>
		<div class="form-group">
			<?php
			if (empty($meta['section_img']) ) {
		    ?>
		    <p style="margin-left: 110px;"><i>No image selected</i></p>
		    <?php
		  }
		  else {
		    ?>
		    <div style="margin-left: 110px;">
		      <img height="200px" style="padding: 10px;" src="<?php echo $meta['section_img']; ?>">
		    </div>
		    <?php
		  }
			?>
		</div>
  </form>

    <?php
	}

  function save_homepage_fields_meta( $post_id ) {
    // verify nonce
    if ( !wp_verify_nonce( $_POST['homepage_meta_box_nonce'], basename(__FILE__) ) ) {
      return $post_id;
    }
    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return $post_id;
    }
    // check permissions
    if ( 'page' === $_POST['post_type'] ) {
      if ( !current_user_can( 'edit_page', $post_id ) ) {
        return $post_id;
      } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
      }
    }

    $old = get_post_meta( $post_id, 'homepage_fields', true );
    $new = $_POST['homepage_fields'];
    if ( $new && $new !== $old ) {
      update_post_meta( $post_id, 'homepage_fields', $new );
    } elseif ( '' === $new && $old ) {
      delete_post_meta( $post_id, 'homepage_fields', $old );
    }
  }
  add_action( 'save_post', 'save_homepage_fields_meta' );
