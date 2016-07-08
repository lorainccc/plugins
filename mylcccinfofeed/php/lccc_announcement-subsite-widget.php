<?php
/**
 * WordPress Widget Boilerplate
 *
 * The WordPress Widget Boilerplate is an organized, maintainable boilerplate for building widgets using WordPress best practices.
 *
 * @package   LCCC_Announcement_Sub_Site_Widget
 * @author    LCCC Web Developement Team
 * @license   GPL-2.0+
 * @link      http://www.lorainccc.edu
 * @copyright 2016 Lorain County Community College
 */
 
 // Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

// TODO: change 'LCCC_Announcement_Sub_Site_Widget' to the name of your plugin
class LCCC_Announcement_Sub_Site_Widget extends WP_Widget {

    protected $widget_slug = 'lccc-sub-site-announcement-widget';

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * Specifies the classname and description, instantiates the widget,
	 * loads localization files, and includes necessary stylesheets and JavaScript.
	 */
	public function __construct() {

		// load plugin text domain
		add_action( 'init', array( $this, 'widget_textdomain' ) );

		// Hooks fired when the Widget is activated and deactivated
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

		// TODO: update description
		parent::__construct(
			$this->get_widget_slug(),
			__( 'LCCC Announcement Sub Site Widget', $this->get_widget_slug() ),
			array(
				'classname'  => $this->get_widget_slug().'-class',
				'description' => __( 'LCCC Whats Going On Announcement Sub Site Widget fpr displaying LCCC Announcements on LCCC sub sites.', $this->get_widget_slug() )
			)
		);
		// Refreshing the widget's cached output with each new post
		add_action( 'save_post',    array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );

	} // end constructor


    /**
     * Return the widget slug.
     *
     * @since    1.0.0
     *
     * @return    Plugin slug variable.
     */
    public function get_widget_slug() {
        return $this->widget_slug;
    }

	/*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/

	/**
	 * Outputs the content of the widget.
	 *
	 * @param array args  The array of form elements
	 * @param array instance The current instance of the widget
	 */
	public function widget( $args, $instance ) {
			$numberofposts = $instance['numberofposts']; 
			$whattodisplay = 'lccc_announcement';
			$widgetcategory = $instance['category'];
		echo '<div class="small-12 medium-12 large-12 columns '.$whattodisplay.'-sub-site">';
   echo '<div class="small-12 medium-12 large-12 columns '.$whattodisplay.'_header-sub-site">';
							echo '<div class="small-5 medium-4 large-4 columns '.$whattodisplay.'-sub-site headerlogo-sub-site">';
											echo '<i class="lccc-font-lccc-reverse">'.'</i>';
							echo '</div>';
							echo '<div class="small-7 medium-8 large-8 columns announcement-header-text-container">';
										echo '<h2 class="headertext">'.'Announcements'.'</h2>';
							echo '</div>';
			echo '</div>';
				$subsiteannouncementargs=array(
					'post_type' => $whattodisplay,
					'post_status' => 'publish',
  			'posts_per_page' => $numberofposts,
					'category_name' => $widgetcategory,
					);
				echo '<div class="small-12 medium-12 large-12 columns sub-announcement-container">';
				$newevents = new WP_Query($subsiteannouncementargs);
					if ( $newevents->have_posts() ) :
									while ( $newevents->have_posts() ) : $newevents->the_post();
														echo '<div class="small-12 medium-12 large-12 columns sub-announcement">';
														?>
<a href="<?php esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>	
														<?php 
															the_excerpt();
														echo '</div>';
									endwhile;
					endif;
						echo '<div class="small-12 medium-12 large-12 columns view-all-link">';
							echo '<a href="'.get_post_type_archive_link( $whattodisplay ).'" class="button expand">View All Announcements </a>';
		echo '</div>';	
				echo '</div>';
	}
	public function flush_widget_cache() 
	{
    	wp_cache_delete( $this->get_widget_slug(), 'widget' );
	}
	/**
	 * Processes the widget's options to be saved.
	 *
	 * @param array new_instance The new instance of values to be generated via the update.
	 * @param array old_instance The previous instance of values before the update.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
      // Fields
     	$instance['numberofposts'] = strip_tags($new_instance['numberofposts']);
		 $instance['category'] = strip_tags($new_instance['category']);
						return $instance;

		return $instance;

	} // end widget

	/**
	 * Generates the administration form for the widget.
	 *
	 * @param array instance The array of keys and values for the widget.
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


	} // end form

	/*--------------------------------------------------*/
	/* Public Functions
	/*--------------------------------------------------*/

	/**
	 * Loads the Widget's text domain for localization and translation.
	 */
	public function widget_textdomain() {

		// TODO be sure to change 'lccc-sub-site-announcement-widget' to the name of *your* plugin
		load_plugin_textdomain( $this->get_widget_slug(), false, plugin_dir_path( __FILE__ ) . 'lang/' );

	} // end widget_textdomain

	/**
	 * Fired when the plugin is activated.
	 *
	 * @param  boolean $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog.
	 */
	public function activate( $network_wide ) {
		// TODO define activation functionality here
	} // end activate

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @param boolean $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
	 */
	public function deactivate( $network_wide ) {
		// TODO define deactivation functionality here
	} // end deactivate


} // end class

// TODO: Remember to change 'LCCC_Announcement_Sub_Site_Widget' to match the class name definition
add_action( 'widgets_init', create_function( '', 'register_widget("LCCC_Announcement_Sub_Site_Widget");' ) );
?>