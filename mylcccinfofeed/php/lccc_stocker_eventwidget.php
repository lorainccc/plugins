<?php
/** Widget Code */
class LCCC_Whats_Going_On_Stocker_Event_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
				'classname' => 'LCCC_Stocker_Event_Widget',
			'description' => 'LCCC Stocker Event Widget fpr displaying LCCC Stocker Events on LCCC Stocker web site',
		);
		parent::__construct( 'LCCC_Stocker_Event_Widget', 'LCCC Stocker Event Widget', $widget_ops );
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
                  'start_date' => 'DESC',
																		'time_order' => 'ASC',
          ),
					);
		?>
<div class="row small-up-1 medium-up-2 large-up-4">
  <?php 
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
				?>
	<div class="column">
	<?php
										$starteventdate = 
			event_meta_box_get_meta('event_start_date');
		$starteventtime = event_meta_box_get_meta('event_start_time');  
		$endeventdate = event_meta_box_get_meta('event_end_date');
		$endtime = event_meta_box_get_meta('event_end_time');
		$bgcolor = event_meta_box_get_meta('event_meta_box_stoccker_bg_color');

										$starttimevar=strtotime($starteventtime);
										$starttime=	date("h:i a",$starttimevar);
										$starteventtimehours = date("G",$starttimevar);
										$starteventtimeminutes = date("i",$starttimevar);
		
          $startdate=strtotime($starteventdate);
										$eventstartdate=date("Y-m-d",$startdate);
										$stockereventstartdate=date("M d, Y",$startdate);
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

									
				if( $eventstartdate <= $today && $endeventdate >= $today){
							echo '<div class="small-12 medium-12 large-12 columns stocker-eventcontainer">';
											echo '<div style="background:'.$bgcolor.';" class="small-12 medium-12 large-12 columns stocker_event_header">';
											echo '<a href="'.get_the_permalink().'">';
													the_title('<h2 class="stocker-event-title">','</h2>');
										echo '</a>';			
											echo '<h3 class="stocker-event-date">'.$stockereventstartdate.'</h3>';
											echo '</div>';	
											echo '<div class="small-12 medium-12 large-12 columns stocker_event_image">';
														the_post_thumbnail();
											echo '</div>';						
											echo '<div style="background:'.$bgcolor.';" class="small-12 medium-12 large-12 columns stocker_event_footer">';
											echo '<a href="https://tickets.lorainccc.edu"><h5 class="stocker-footer-header">Buy Tickets</h5></a>';
											echo '</div>';	
							echo '</div>';

					}
					if( $eventstartdate >= $today){
									echo '<div class="small-12 medium-12 large-12 columns stocker-eventcontainer">';
											echo '<div style="background:'.$bgcolor.';" class="small-12 medium-12 large-12 columns event_header">';
												echo '<a href="'.get_the_permalink().'">';
													the_title('<h2 class="stocker-event-title">','</h2>');
										echo '</a>';
													echo '<h3 class="stocker-event-date">'.$stockereventstartdate.'</h3>';
											echo '</div>';
											echo '<div class="small-12 medium-12 large-12 columns stocker_event_image">';
														the_post_thumbnail();
											echo '</div>';
											echo '<div style="background:'.$bgcolor.';" class="small-12 medium-12 large-12 columns stocker_event_footer">';
											echo '<a href="https://tickets.lorainccc.edu">';
											echo '<h5 class="stocker-footer-header">Buy Tickets</h5>';
											echo '</a>';
											echo '</div>';							
							echo '</div>';
					}
		?>
	</div>
		<?php
							endwhile;
					endif;
		?>
</div>
<?php

		echo '<div class="small-12 medium-12 large-12 columns stocker-view-all-link">';
							echo '<a href="'.get_post_type_archive_link( $whattodisplay ).'" class="button expand">View All Events </a>';
		echo '</div>';	
		echo '</div>';
		

		

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
	register_widget( 'LCCC_Whats_Going_On_Stocker_Event_Widget' );
});
?>