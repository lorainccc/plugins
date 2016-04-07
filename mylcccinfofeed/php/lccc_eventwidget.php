<?php
/** Widget Code */
class LCCC_Whats_Going_On_Event_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
				'classname' => 'LCCC_Whats_Going_On_Event_Widget',
			'description' => 'LCCC Whats Going On Event Widget fpr displaying LCCC Events on LCCC sites',
		);
		parent::__construct( 'LCCC_Whats_Going_On_Event_Widgett', 'LCCC Whats Going On Event Widget', $widget_ops );
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
   // these are the widget options
			$numberofposts = $instance['numberofposts']; 
			$whattodisplay = 'lccc_event';
			$widgetcategory = $instance['category'];
   echo $before_widget;
   // Display the widget
		 echo '<div class="small-12 medium-12 large-12 columns '.$whattodisplay.'">';
		 if ($whattodisplay == 'lccc_event'){
   echo '<div class="small-12 medium-12 large-12 columns '.$whattodisplay.'_header">';
							echo '<div class="small-4 medium-4 large-4 columns '.$whattodisplay.' headerlogo">';
											echo '<i class="lccc-font-lccc-reverse">'.'</i>';
							echo '</div>';
							echo '<div class="small-8 medium-8 large-8 columns ">';
										echo '<h2 class="headertext">'.'Events'.'</h2>';
							echo '</div>';
			echo '</div>';
			}
	  
 if ($whattodisplay == 'lccc_event'){
				$today = getdate();
				$currentDay = $today['mday'];
				$month = $today['mon'];
				$year = $today['year'];
				$firsteventdate ='';
    $nexteventdate ='';
				$todaysevents = '';
				$temp = strLen($currentDay);            
				$twoDay = '';
	   $nextTwoDay = '';
    if ($temp < 2){
							$twoDay = '0' . $currentDay;
				}else{
							$twoDay = $currentDay;
				}
				$twomonth = '';
    $tempmonth = strLen($month);
    if ($tempmonth < 2){
							$twomonth = '0' . $month;
				}else{
							$twomonth = $month;
				}
			 $nextDay = $currentDay + 1;
				if ($temp < 2){
							$nextTwoDay = '0' . $currentDay;
				}else{
							$nextTwoDay = $currentDay;
				}
     $today = "$year-$twomonth-$twoDay";
					echo $today;
					$eventargs=array(
					'post_type' => $whattodisplay,
					'post_status' => 'publish',
  			'posts_per_page' => $numberofposts,
					'category_name' => $widgetcategory,
					'meta_query' => array(
						 array(	
													'relation' => 'OR', 
													'start_date' => array(
                  'key' => 'event_start_date',
                  'value' => $today,
                  'compare' => '<=',
																		'type' => 'DATE',
              ),
																		'end_date' => array(
                  'key' => 'event_end_date',
                  'value' => $today,
                  'compare' => '>=',
																		'type' => 'DATE',
              ),

										),
						   'relation' => 'AND', 
									'time_order' => array(
              'key' => 'event_start_time',
              'compare' => 'EXISTS',
         ), 			 
							),
						'orderby' => array(
                  'start_date' => 'ASC',
																		'time_order' => 'DESC',
          ),
					);
					$newevents = new WP_Query($eventargs);
					if ( $newevents->have_posts() ) :
									while ( $newevents->have_posts() ) : $newevents->the_post();
			echo '<div class="small-12 medium-12 large-12 columns eventcontainer">';
								echo '<div class="small-12 medium-12 large-3 columns calender">';
												$eventdate = event_meta_box_get_meta(
'event_meta_box_event_start_date_and_time_');
												$date=strtotime($eventdate);
												$month=date("M",$date);
												$day=date("d",$date);
								echo '<p class="month">'.$month.'</p>';
								echo '<p class="day">'.$day.'</p>';
								echo '</div>';
								echo '<div class="small-12 medium-12 large-9 columns">';
  						?>
								<a href="<?php the_permalink();?>"><?php the_title('<h3 class="eventtitle">','</h3>');?></a>
								<?php
											the_excerpt('<p>','</p>');
								echo '</div>';
								echo '</div>';
							endwhile;
					endif;
		}
	
		echo '</div>';
		
		if ($whattodisplay == 'lccc_event'){
					$currentpostype = 'Events';
			echo '<div class="small-12 medium-12 large-12 columns">';
							echo '<a href="'.get_post_type_archive_link( $whattodisplay ).'" class="button expand">View All '.$currentpostype .'</a>';
		echo '</div>';
		}
		if ($whattodisplay == 'lccc_location'){
					$currentpostype = 'Locations';
			echo '<div class="small-12 medium-12 large-12 columns">';
							echo '<a href="'.get_post_type_archive_link( $whattodisplay ).'" class="button expand">View All '.$currentpostype .'</a>';
		echo '</div>';
		}
		
  echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		
// Check values
if( $instance) {
					$numberofposts = esc_attr($instance['numberofposts']);
					$widgetcategory = esc_attr($instance['category']);
} else {
					$numberofposts = '';
					$widgetcategory = '';
}
?>

<p>
<label for="<?php echo $this->get_field_id('numberofposts'); ?>"><?php _e('Number of posts', 'wp_widget_plugin'); ?></label>
<select name="<?php echo $this->get_field_name('numberofposts'); ?>" id="<?php echo $this->get_field_id('numberofposts'); ?>">
<?php
$options = array('select..',5, 10, 15);
foreach ($options as $option) {
echo '<option value="' . $option . '" id="' . $option . '"', $numberofposts == $option ? ' selected="selected"' : '', '>', $option, '</option>';
}
?>
</select>
</p>

		<p>
<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category:', 'wp_widget_plugin'); ?></label>

<select name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category'); ?>"class="widefat">
		<?php
  // Get categories as array
  $categories = get_categories( $args );
  foreach ( $categories as $category ) :
  		echo '<option value="' . $category->name . '" id="' . $category->term_id . '"', $widgetcategory == $category->name ? ' selected="selected"' : '', '>', $category->name, '</option>';
  endforeach;
?>
</select>		
		
</p>
<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		       $instance = $old_instance;
      // Fields
     	$instance['numberofposts'] = strip_tags($new_instance['numberofposts']);
							$instance['whattodisplay'] = strip_tags($new_instance['whattodisplay']);
		 $instance['category'] = strip_tags($new_instance['category']);
						return $instance;
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'LCCC_Whats_Going_On_Event_Widget' );
});
?>