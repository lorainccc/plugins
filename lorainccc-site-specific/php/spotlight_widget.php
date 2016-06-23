<?php
class LCCC_spotlight_Widget extends WP_Widget{
		/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
				'classname' => 'LCCC_spotlight_Widget',
			'description' => 'LCCC Spotlight Widget fpr displaying LCCC Spotligh Sections on LCCC sites',
		);
		parent::__construct( 'LCCC_spotlight_Widget', 'LCCC Spotlight Widget', $widget_ops );
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
			'post_type' => 'spotlights',
			'order' => 'ASC',
			'posts_per_page' => 2, 
		);	
		$query = new WP_Query( $dbi_args );
		?>
<div class="small-up-1 medium-up-2 large-up-2 spotlight-grid">
	<?php
			while ( $query->have_posts() ) {
					$query->the_post();
				?>
				<div class="column lccc-spotlight">
				<div data-equalizer="<?php the_title();?>" data-equalize-on="medium" data-resize="<?php the_title();?>">
        <div class="large-7 medium-4 columns service-box-image" data-equalizer-watch="business" style="height: 365px;"> <?php the_post_thumbnail(); ?>
								</div>
        <div class="large-5 medium-8 columns service-box-copy text-center" data-equalizer-watch="business" style="height: 365px;">
          <div class="service-box-container">
            <div class="service-box-header">
             <?php 	$sub_title = event_meta_box_get_meta('lorainccc_spotlight_box_sub_header');
													?>
													<h2><?php echo $sub_title; ?><span><?php the_title();?></span></h2>
            </div>
            <div class="service-box-body">
              <p><?php the_content();?></p>
            </div>
												<?php 	$asoc_link = event_meta_box_get_meta('lorainccc_spotlight_box_link');
														if($asoc_link == ''){
						$asoc_link = 'http://www.lorainccc.edu/';
					}
											?>
            <a href="<?php echo $asoc_link; ?>" class="button">Learn More</a> </div>
        </div>
					<div class="yellow-bottom-border"></div>
      </div>
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
	register_widget( 'LCCC_spotlight_Widget' );
});
?>