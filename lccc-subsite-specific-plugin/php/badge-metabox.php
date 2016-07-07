<?php
/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function badge_metabox_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function badge_metabox_add_meta_box() {
	add_meta_box(
		'badge_metabox-badge-metabox',
		__( 'Badge Metabox', 'badge_metabox' ),
		'badge_metabox_html',
		'badges',
		'advanced',
		'core'
	);
}
add_action( 'add_meta_boxes', 'badge_metabox_add_meta_box' );

function badge_metabox_html( $post) {
	wp_nonce_field( '_badge_metabox_nonce', 'badge_metabox_nonce' ); ?>

	<p>This meta-box is designed for the inputs to create the LCCC Badges for LCCC Sub-sites.</p>

	<p>

		<input type="radio" name="badge_metabox_color_scheme_select" id="badge_metabox_color_scheme_select_0" value="Green" <?php echo ( badge_metabox_get_meta( 'badge_metabox_color_scheme_select' ) === 'Green' ) ? 'checked' : ''; ?>>
<label for="badge_metabox_color_scheme_select_0">Green</label><br>

		<input type="radio" name="badge_metabox_color_scheme_select" id="badge_metabox_color_scheme_select_1" value="Purple" <?php echo ( badge_metabox_get_meta( 'badge_metabox_color_scheme_select' ) === 'Purple' ) ? 'checked' : ''; ?>>
<label for="badge_metabox_color_scheme_select_1">Purple</label><br>

		<input type="radio" name="badge_metabox_color_scheme_select" id="badge_metabox_color_scheme_select_2" value="Teal" <?php echo ( badge_metabox_get_meta( 'badge_metabox_color_scheme_select' ) === 'Teal' ) ? 'checked' : ''; ?>>
<label for="badge_metabox_color_scheme_select_2">Teal</label><br>

		<input type="radio" name="badge_metabox_color_scheme_select" id="badge_metabox_color_scheme_select_3" value="Orange" <?php echo ( badge_metabox_get_meta( 'badge_metabox_color_scheme_select' ) === 'Orange' ) ? 'checked' : ''; ?>>
<label for="badge_metabox_color_scheme_select_3">Orange</label><br>

		<input type="radio" name="badge_metabox_color_scheme_select" id="badge_metabox_color_scheme_select_4" value="Dark_Blue" <?php echo ( badge_metabox_get_meta( 'badge_metabox_color_scheme_select' ) === 'Dark_Blue' ) ? 'checked' : ''; ?>>
<label for="badge_metabox_color_scheme_select_4">Dark Blue</label><br>
	</p>	<p>
		<label for="badge_metabox_icon_selector"><?php _e( 'Icon Selector', 'badge_metabox' ); ?></label><br>
		<select name="badge_metabox_icon_selector" id="badge_metabox_icon_selector">
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === ' ' ) ? 'selected' : '' ?>>Select Icon</option>
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === 'trophy' ) ? 'selected' : '' ?>>trophy</option>
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === 'parking' ) ? 'selected' : '' ?>>parking</option>
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === 'beautiful-campus' ) ? 'selected' : '' ?>>beautiful-campus</option>
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === 'campus-map' ) ? 'selected' : '' ?>>campus-map</option>
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === 'catalog' ) ? 'selected' : '' ?>>catalog</option>
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === 'collegian' ) ? 'selected' : '' ?>>collegian</option>
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === 'lccc-block' ) ? 'selected' : '' ?>>lccc-block</option>
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === 'magnifying-glass' ) ? 'selected' : '' ?>>magnifying-glass</option>
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === 'radio' ) ? 'selected' : '' ?>>radio</option>
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === 'sustainability' ) ? 'selected' : '' ?>>sustainability</option>
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === 'video' ) ? 'selected' : '' ?>>video</option>
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === 'thumbs-up' ) ? 'selected' : '' ?>>thumbs-up</option>
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === 'transfer-students' ) ? 'selected' : '' ?>>transfer-students</option>
			<option <?php echo (badge_metabox_get_meta( 'badge_metabox_icon_selector' ) === 'undecided-student' ) ? 'selected' : '' ?>>undecided-student</option>
		</select>
	</p>	<p>
		<label for="badge_metabox_redirect_link"><?php _e( 'Redirect Link', 'badge_metabox' ); ?></label><br>
		<input type="text" name="badge_metabox_redirect_link" id="badge_metabox_redirect_link" value="<?php echo badge_metabox_get_meta( 'badge_metabox_redirect_link' ); ?>">
	</p><?php
}

function badge_metabox_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['badge_metabox_nonce'] ) || ! wp_verify_nonce( $_POST['badge_metabox_nonce'], '_badge_metabox_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['badge_metabox_color_scheme_select'] ) )
		update_post_meta( $post_id, 'badge_metabox_color_scheme_select', esc_attr( $_POST['badge_metabox_color_scheme_select'] ) );
	if ( isset( $_POST['badge_metabox_icon_selector'] ) )
		update_post_meta( $post_id, 'badge_metabox_icon_selector', esc_attr( $_POST['badge_metabox_icon_selector'] ) );
	if ( isset( $_POST['badge_metabox_redirect_link'] ) )
		update_post_meta( $post_id, 'badge_metabox_redirect_link', esc_attr( $_POST['badge_metabox_redirect_link'] ) );
}
add_action( 'save_post', 'badge_metabox_save' );

/*
	Usage: badge_metabox_get_meta( 'badge_metabox_color_scheme_select' )
	Usage: badge_metabox_get_meta( 'badge_metabox_icon_selector' )
	Usage: badge_metabox_get_meta( 'badge_metabox_redirect_link' )
*/

?>