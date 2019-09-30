<?php
/**
 * Plugin Name: Jordan Fowler Videography: Video Post
 * Description: Add and update new videos and projects
 * Version: 1.0
 * Author: Bethany Fowler
 * Author URI: http://bethanyfowler.me/
 */


function create_video_post() {
	register_post_type( 'video_post',
		array(
			'labels'       => array(
				'name'       => __( 'Video Post' ),
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
			'menu_icon' => 'dashicons-format-video'
		)
	);
	register_taxonomy_for_object_type( 'category', 'video_post' );
	register_taxonomy_for_object_type( 'post_tag', 'video_post' );
}
add_action( 'init', 'create_video_post' );

function add_video_fields_meta_box() {
	add_meta_box(
		'video_fields_meta_box', // $id
		'Video Fields', // $title
		'show_video_meta_box', // $callback
		'video_post', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_video_fields_meta_box' );

function show_video_meta_box() {
	global $post;
		$meta = get_post_meta( $post->ID, 'video_fields', true ); ?>

  <input type="hidden" name="video_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

  <form>
		<div class="form-group">
			<label>Client Rating</label>
			<select name="video_fields[workType]" id="video_fields[workType]">
				<option value="videography" <?php selected( $meta['workType'], 'Videography' ); ?>>Videography</option>
				<option value="photography" <?php selected( $meta['workType'], 'Photography' ); ?>>Photography</option>
			</select>
		</div>
		<br />
		<b>Videography Fields</b>
    <div class="form-group">
      <label>Vimeo Video Source</label>
      <input type="text" name="video_fields[source]" id="video_fields[source]" class="regular-text" value="<?php echo $meta['source']; ?>">
    </div>

    <div class="form-group">
      <label>Video Type/Category</label>
      <input type="text" name="video_fields[category]" id="video_fields[category]" class="regular-text" value="<?php echo $meta['category']; ?>">
    </div>

		<div class="form-group">
			<label>Placeholder Image URL:</label>
			<input type="text" name="video_fields[placeholder_img]" id="video_fields[placeholder_img]" style="width: 50%;" value="<?php echo $meta['placeholder_img']; ?>" />
		</div>
		<div class="form-group">
			<?php
			if (empty($meta['placeholder_img']) ) {
				?>
				<p style="margin-left: 110px;"><i>No image selected</i></p>
				<?php
			}
			else {
				?>
				<div style="margin-left: 110px;">
					<img height="200px" style="padding: 10px;" src="<?php echo $meta['placeholder_img']; ?>">
				</div>
				<?php
			}
			?>
		</div>
  </form>

    <?php
	}

  function save_video_fields_meta( $post_id ) {
    // verify nonce
    if ( !wp_verify_nonce( $_POST['video_meta_box_nonce'], basename(__FILE__) ) ) {
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

    $old = get_post_meta( $post_id, 'video_fields', true );
    $new = $_POST['video_fields'];
    if ( $new && $new !== $old ) {
      update_post_meta( $post_id, 'video_fields', $new );
    } elseif ( '' === $new && $old ) {
      delete_post_meta( $post_id, 'video_fields', $old );
    }
  }
  add_action( 'save_post', 'save_video_fields_meta' );
