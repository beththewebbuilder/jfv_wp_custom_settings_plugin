<<<<<<< HEAD
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
		$meta = get_post_meta( $post->ID, 'video_fields', true );

		//get posts with header image selected
		$args_vh = array(
			'post_type'  => 'video_post',
			'meta_key'   => 'video_fields',
			'meta_query' => array(
					array(
							'key'     => 'video_fields',
							'value'   => '"headerimg";s:1:"1"',
							'compare' => 'LIKE',
					),
			),
	);
	$video_highlight = new WP_Query( $args_vh );

		?>



  <input type="hidden" name="video_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

  <form>
		<div class="form-group">
		<table>
			<tr>
				<td>
          <h3>Vimeo Video Source</h3>
          <input type="text" name="video_fields[source]" id="video_fields[source]" class="regular-text" value="<?php echo $meta['source']; ?>">
        </td>
			</tr>
			<tr>
				<td>
          <h3>Placeholder Image URL</h3>
          <i>Remember it's important to replace the <b>'564x'</b> in the Pinterest URL with <b>'originals'</b></i> <br/>
          <input type="text" style="width: 25rem;" name="video_fields[placeholder_img]" id="video_fields[placeholder_img]" value="<?php echo $meta['placeholder_img']; ?>" />
        </td>
			</tr>
			<tr>
				<td>
					<?php
					if (empty($meta['placeholder_img']) ) {
						?>
						<p><i>No image selected</i></p>
						<?php
					}
					else {
						?>
						<div>
							<img height="200px" style="padding: 10px;" src="<?php echo $meta['placeholder_img']; ?>">
						</div>
						<?php
					}
					?>
				</td>
			</tr>
      <tr>
				<td>
          <h3>Alt img text</h3>
          <i>This is important for your SEO.  It's used to describe the appearance and function of an image on a page. Keep it relatively short but descriptive. For more information or example alt text click <a href="https://moz.com/learn/seo/alt-text">here</a></i>
          <br/>
          <input type="text" style="width: 25rem;" name="video_fields[placeholder_img_alt]" id="video_fields[placeholder_img_alt]" value="<?php echo $meta['placeholder_img_alt']; ?>" />
        </td>
			</tr>
      <tr>
				<td>
          <h3>Customer review</h3>
          <textarea rows="6" cols="60" type="text" name="video_fields[customer_review]" id="video_fields[customer_review]"><?php echo $meta['customer_review']; ?></textarea>
        </td>
			</tr>
		</table>
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
=======
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
		$meta = get_post_meta( $post->ID, 'video_fields', true );

		//get posts with header image selected
		$args_vh = array(
			'post_type'  => 'video_post',
			'meta_key'   => 'video_fields',
			'meta_query' => array(
					array(
							'key'     => 'video_fields',
							'value'   => '"headerimg";s:1:"1"',
							'compare' => 'LIKE',
					),
			),
	);
	$video_highlight = new WP_Query( $args_vh );

		?>



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
		<table>
			<tr>
				<td>Vimeo Video Source</td>
				<td><input type="text" name="video_fields[source]" id="video_fields[source]" class="regular-text" value="<?php echo $meta['source']; ?>"></td>
			</tr>
			<tr>
				<td>Video Type/Category</td>
				<td><input type="text" name="video_fields[category]" id="video_fields[category]" class="regular-text" value="<?php echo $meta['category']; ?>"></td>
			</tr>
			<tr>
				<td>Placeholder Image URL</td>
				<td><input type="text" name="video_fields[placeholder_img]" id="video_fields[placeholder_img]" style="width: 50%;" value="<?php echo $meta['placeholder_img']; ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<?php
					if (empty($meta['placeholder_img']) ) {
						?>
						<p><i>No image selected</i></p>
						<?php
					}
					else {
						?>
						<div>
							<img height="200px" style="padding: 10px;" src="<?php echo $meta['placeholder_img']; ?>">
						</div>
						<?php
					}
					?>
				</td>

			</tr>
			<tr>
				<td>
					Header Highlight Video
					<br><small>If selected this video will be displayed at the top of the profile page</small>
				</td>
				<td>
					<input type="checkbox" name="video_fields[headerimg]" id="video_fields[headerimg]" value="1" <?php checked( $meta['headerimg'], 1 ); ?> />

					<?php
					//if highlight video already selected show messages
					if(count($video_highlight) >= 1){ ?>
						<i>Highlight video(s) are already selected:
							( <?php
							if($video_highlight->have_posts()) :
								while ($video_highlight->have_posts()) : $video_highlight->the_post ();
								the_title(); ?>; <?php
								endwhile;
								wp_reset_postdata();
							endif;
							 ?>) </i>
						<?php
					}
					else {
						?> <i>No highlight video is selected</i> <?php
					}
					?>

				</td>
			</tr>
		</table>
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
>>>>>>> 427765ed35b2863f68f68e75f21443b76d68492f
