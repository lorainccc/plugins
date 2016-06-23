<?php
class LCCC_Dashboard_Icons_Widget extends WP_Widget{
		/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
				'classname' => 'LCCC_Dashboard_Icons_Widget',
			'description' => 'LCCC Dashboard Icon Widget fpr displaying LCCC Dashboard Icons on LCCC sites',
		);
		parent::__construct( 'LCCC_Dashboard_Icons_Widget', 'LCCC Dashboard Icons Widget', $widget_ops );
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
			'post_type' => 'dashboard_icons',
			'order' => 'ASC',
		);	
		$query = new WP_Query( $dbi_args );
		?>
<div class="small-up-1 medium-up-2 large-up-4 dash-icons-grid">
	<?php
			while ( $query->have_posts() ) {
					$query->the_post();
				?>
				<div class="column">
					<?php 	$asoc_link = event_meta_box_get_meta('lorainccc_db_icons_box_link');
						if($asoc_link == ''){
						$asoc_link = 'http://www.lorainccc.edu/';
					}
					?>
					<a href="<?php echo $asoc_link; ?>" class="yellow-icon float-center"><?php the_post_thumbnail('thumbnail'); ?> </a>
					<div class="icon-label"><a href="<?php echo $asoc_link; ?>"><?php  the_title(); ?></a>	</div>
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
	register_widget( 'LCCC_Dashboard_Icons_Widget' );
});
?>