<?php
/**
 * Plugin Name: Jordan Fowler Videography: Review Posts
 * Description: Add and update reviews
 * Version: 1.0
 * Author: Bethany Fowler
 * Author URI: http://bethanyfowler.me/
 */

function create_jfv_review_post() {
	register_post_type( 'jfv_review_post',
		array(
			'labels'       => array(
				'name'       => __( 'Client Reviews' ),
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
			'menu_icon' => 'dashicons-testimonial'
		)
	);
	register_taxonomy_for_object_type( 'category', 'jfv_review_post' );
	register_taxonomy_for_object_type( 'post_tag', 'jfv_review_post' );
}
add_action( 'init', 'create_jfv_review_post' );

function add_jfv_review_fields_meta_box() {
	add_meta_box(
		'review_fields_meta_box', // $id
		'Review Fields', // $title
		'show_jfv_review_meta_box', // $callback
		'jfv_review_post', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_jfv_review_fields_meta_box' );

function show_jfv_review_meta_box() {
  global $post;
    $meta = get_post_meta( $post->ID, 'review_fields', true ); ?>

  <input type="hidden" name="review_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

  <form>
    <div class="form-group">
      <label>Client Name</label>
      <input type="text" name="review_fields[name]" id="review_fields[name]" class="regular-text" value="<?php echo $meta['name']; ?>">
    </div>

    <div class="form-group">
      <label>Client Rating</label>
      <select name="review_fields[rating]" id="review_fields[rating]">
        <option value="5" <?php selected( $meta['rating'], '5' ); ?>>Five</option>
        <option value="4" <?php selected( $meta['rating'], '4' ); ?>>Four</option>
        <option value="3" <?php selected( $meta['rating'], '3' ); ?>>Three</option>
        <option value="2" <?php selected( $meta['rating'], '2' ); ?>>Two</option>
        <option value="1" <?php selected( $meta['rating'], '1' ); ?>>One</option>
    </select>
    </div>
  </form>

    <?php
  }

  function save_jfv_review_fields_meta( $post_id ) {
    // verify nonce
    if ( !wp_verify_nonce( $_POST['review_meta_box_nonce'], basename(__FILE__) ) ) {
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

    $old = get_post_meta( $post_id, 'review_fields', true );
    $new = $_POST['review_fields'];
    if ( $new && $new !== $old ) {
      update_post_meta( $post_id, 'review_fields', $new );
    } elseif ( '' === $new && $old ) {
      delete_post_meta( $post_id, 'review_fields', $old );
    }
  }
  add_action( 'save_post', 'save_jfv_review_fields_meta' );
