<?php
class LCCC_highlight_Widget extends WP_Widget{
		/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
				'classname' => 'LCCC_highlight_Widget',
			'description' => 'LCCC Highlight Widget fpr displaying LCCC Higlights Sections on LCCC sites',
		);
		parent::__construct( 'LCCC_highlight_Widget', 'LCCC highlight Widget', $widget_ops );
	}
	
	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
	// outputs the content of the widget
  extract( $args );
		$dbi_args = array(
			'post_type' => 'highlight',
			'order' => 'ASC',
			'posts_per_page' => 4, 
		);	
		$query = new WP_Query( $dbi_args );
		?>
<div class="small-up-1 medium-up-2 large-up-4 highlight-grid">
	<?php
			while ( $query->have_posts() ) {
					$query->the_post();
					$asoc_link = event_meta_box_get_meta('lorainccc_lccc_highlight_box_link');
					if($asoc_link == ''){
						$asoc_link = 'http://www.lorainccc.edu/';
					}
											?>
				<div class="column link-box text-center">
							<a href="<?php echo $asoc_link; ?>" class="box-link">
								<?php
											if ( has_post_thumbnail() ) {
															the_post_thumbnail();
												}
											else {
   								?>
															<img src="<?php bloginfo('stylesheet_directory'); ?>/images/hp_smsquares_radiology.jpg" alt="" />
												<?php
										}
									?>
							 <?php 	$bgcolor = event_meta_box_get_meta('lorainccc_lccc_highlight_box_bg_color');
								if ($bgcolor == ''){
											$bgcolor= '#000000';
								}
													?>	
								<div style="background:<?php echo $bgcolor; ?>" class="link-box-label"><?php the_title();?></div>
								</a>
      </div>
	<?php
			}
		?>
</div>
<?php
	}
		/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		
	}
	
	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		
	}
	
}
add_action( 'widgets_init', function(){
	register_widget( 'LCCC_highlight_Widget' );
});
?>