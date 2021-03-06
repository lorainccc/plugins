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
							echo '<div class="small-5 medium-5 large-5 columns '.$whattodisplay.' headerlogo">';
											echo '<i class="lccc-font-lccc-reverse">'.'</i>';
							echo '</div>';
							echo '<div class="small-7 medium-7 large-7 columns event-header-text-container">';
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
					
					$eventargs=array(
					'post_type' => 'lccc_event',
					'post_status' => 'publish',
  			'posts_per_page' => $numberofposts,
					'category_name' => $widgetcategory,
					'meta_query' => array(
													'relation' => 'AND', 
													'start_date' => array(
                  'key' => 'event_start_date',
                  'compare' => 'EXISTS',
																		'type' => 'DATE',
              ),									
						 
									'time_order' => array(
              'key' => 'event_start_time',
              'compare' => 'EXISTS',
         ), 			 
							),
						'orderby' => array(
                  'start_date' => 'ASC',
																		'time_order' => 'ASC',
          ),
					);
					$newevents = new WP_Query($eventargs);
					if ( $newevents->have_posts() ) :
							while ( $newevents->have_posts() ) : $newevents->the_post();
		$starteventdate = 
			event_meta_box_get_meta('event_start_date');
		$starteventtime = event_meta_box_get_meta('event_start_time');  
		$endeventdate = event_meta_box_get_meta('event_end_date');
		$endtime = event_meta_box_get_meta('event_end_time');
		

										$starttimevar=strtotime($starteventtime);
										$starttime=	date("h:i a",$starttimevar);
										$starteventtimehours = date("G",$starttimevar);
										$starteventtimeminutes = date("i",$starttimevar);
		
          $startdate=strtotime($starteventdate);
										$eventstartdate=date("Y-m-d",$startdate);
										$eventstartmonth=date("M",$startdate);
										$eventstartday =date("j",$startdate);								
										
										$endeventtimevar=strtotime($endtime);
										$endeventtime = date("h:i a",$endeventtimevar);
										$endeventtimehours = date("G",$endeventtimevar);
										$endeventtimeminutes = date("i",$endeventtimevar);
		
										$enddate=strtotime($endeventdate);
										$endeventdate = date("Y-m-d",$enddate);
		
										
		$duration = '';
		if($endeventtimehours == 0){
			$endeventtimehours =24;
		}
		$durationhours =	$endeventtimehours - $starteventtimehours;
		if($durationhours > 0){
				if($durationhours == 24){
				$duration .= '1 day';
				}else{
				$duration .= $durationhours.'hrs'; 
				}
		}
		$durationminutes = $endeventtimeminutes - $starteventtimeminutes;
		if($durationminutes > 0){
			$duration .= $durationminutes.'mins';
		}
										
										$date=strtotime($today);
										$today_event_month=date("M",$date);
          $today_event_day=date("j",$date);
          //echo 'Today:'.$today.'<br />';
										//echo 'Event Start Date and Time: '. $starteventdate.'<br />';
										//echo 'Event Start:'.$eventstartdate.'<br />';
										//echo 'Event Start Time:'.$starttime.'<br />';
										//echo 'Event Start Month:'.$eventstartmonth.'<br />';
										//echo 'Event Start Day:'.$eventstartday.'<br />';
										//echo 'Event End Date:'.$endeventdate.'<br />';
									
				if( $eventstartdate <= $today && $endeventdate >= $today){
							echo '<div class="small-12 medium-12 large-12 columns eventcontainer">';
							echo '<div class="small-12 medium-12 large-3 columns calender">';
							echo '<p class="month">'.$today_event_month.'</p>';
							echo '<p class="day">'.$today_event_day.'</p>';
							echo '</div>';
							echo '<div class="small-12 medium-12 large-9 columns">';
															?><a href="<?php the_permalink();?>"><?php the_title('<h3 class="eventtitle">','</h3>');?></a>
<<<<<<< HEAD
								<?php
							echo '<p style="font-weight: bold;margin-bottom: 0;">Start Time: '.$starttime.'</p>';	
							echo '<p>Duration: '.$duration.'</p>';
											the_excerpt('<p>','</p>');
							echo '</div>';

							echo '</div>';

					}
					if( $eventstartdate >= $today){
									echo '<div class="small-12 medium-12 large-12 columns eventcontainer">';
							echo '<div class="small-12 medium-12 large-3 columns calender">';
							echo '<p class="month">'.$eventstartmonth.'</p>';
							echo '<p class="day">'.$eventstartday.'</p>';
							echo '</div>';
							echo '<div class="small-12 medium-12 large-9 columns">';
													?><a href="<?php the_permalink();?>"><?php the_title('<h3 class="eventtitle">','</h3>');?></a>
								<?php
						echo '<p style="font-weight: bold;margin-bottom: 0;">Start Time: '.$starttime.'</p>';		
					echo '<p>Duration: '.$duration.'</p>';
											the_excerpt('<p>','</p>');
				echo '<div class="event-divider"></div>';				
							echo '</div>';
		
							echo '</div>';

						
=======
								<?php
							echo '<p style="font-weight: bold;margin-bottom: 0;">Start Time: '.$starttime.'</p>';	
							echo '<p>Duration: '.$duration.'</p>';
											the_excerpt('<p>','</p>');
							echo '</div>';
				
							echo '</div>';
					}
					if( $eventstartdate >= $today){
									echo '<div class="small-12 medium-12 large-12 columns eventcontainer">';
							echo '<div class="small-12 medium-12 large-3 columns calender">';
							echo '<p class="month">'.$eventstartmonth.'</p>';
							echo '<p class="day">'.$eventstartday.'</p>';
							echo '</div>';
							echo '<div class="small-12 medium-12 large-9 columns">';
													?><a href="<?php the_permalink();?>"><?php the_title('<h3 class="eventtitle">','</h3>');?></a>
								<?php
						echo '<p style="font-weight: bold;margin-bottom: 0;">Start Time: '.$starttime.'</p>';		
					echo '<p>Duration: '.$duration.'</p>';
											the_excerpt('<p>','</p>');

							echo '</div>';
				
							echo '</div>';
>>>>>>> master
					}
							endwhile;
					endif;
		}
		echo '<div class="small-12 medium-12 large-12 columns view-all-link">';
							echo '<a href="'.get_post_type_archive_link( $whattodisplay ).'" class="button expand">View All Events </a>';
		echo '</div>';	
		echo '</div>';
		
<<<<<<< HEAD

=======
		echo '<div class="small-12 medium-12 large-12 columns">';
							echo '<a href="'.get_post_type_archive_link( $whattodisplay ).'" class="button expand">View All Events </a>';
		echo '</div>';
>>>>>>> master
		

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