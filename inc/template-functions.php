<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package portfolia
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function portfolia_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'portfolia_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function portfolia_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'portfolia_pingback_header' );

/*--------------------------------------------------------------
 # Custom post types
 --------------------------------------------------------------*/
/*-------------------
 ## Remove Uneccessary post types
 ------------------*/
function custom_menu_page_removing() {
    remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'edit-comments.php' );          //Comments
}
add_action( 'admin_menu', 'custom_menu_page_removing' );


function create_custom_post_types() {
    /*-------------------
     ## Experience
     ------------------*/
    register_post_type( 'experience',
        array(
            'labels'       => array(
                'name'       => __( 'Experience' ),
                'set_featured_image'    => __( 'Set Logo / Image'),
                'featured_image'    => __( 'Logo / Image'),
                'remove_image'    => __( 'Remove Logo / Image'),
                'use_featured_image'    => __( 'Use Logo / Image'),
                'add_new_item'       => __( 'Add New Experience' ),
                'new_item'       => __( 'New Experience' ),
                'edit_item'       => __( 'Edit Experience' ),
                'view_item'       => __( 'View Experience' ),
                'search_items'       => __( 'Search Experience' ),
                'not_found'       => __( 'No Experience Found' ),
                'archives'       => __( 'Experience Archives' ),
                'attributes'       => __( 'Experience Attributes' ),
                'insert_into_item'       => __( 'Insert into Experience' ),
                'upload_to_this_item'       => __( 'Upload to Experience' ),
            ),
            'public'       => true,
            'hierarchical' => true,
            'has_archive'  => true,
            'menu_position' => 2.1,
            'supports'     => array(
                'title',
                'editor',
                'thumbnail',
            ), 
            'taxonomies'   => array(
                'post_tag',
                'category',
            )
        )
    );
    register_taxonomy_for_object_type( 'category', 'experience' );
    register_taxonomy_for_object_type( 'post_tag', 'experience' );
    
    /*-------------------
     ## Education
     ------------------*/
    register_post_type( 'education',
        array(
            'labels'       => array(
                'name'       => __( 'Education' ),
                'set_featured_image'    => __( 'Set Logo / Image'),
                'featured_image'    => __( 'Logo / Image'),
                'remove_image'    => __( 'Remove Logo / Image'),
                'use_featured_image'    => __( 'Use Logo / Image'),
                'add_new_item'       => __( 'Add New Education' ),
                'new_item'       => __( 'New Education' ),
                'edit_item'       => __( 'Edit Education' ),
                'view_item'       => __( 'View Education' ),
                'search_items'       => __( 'Search Education' ),
                'not_found'       => __( 'No Education Found' ),
                'archives'       => __( 'Education Archives' ),
                'attributes'       => __( 'Education Attributes' ),
                'insert_into_item'       => __( 'Insert into Education' ),
                'upload_to_this_item'       => __( 'Upload to Education' ),
            ),
            'public'       => true,
            'hierarchical' => true,
            'has_archive'  => true,
            'menu_position' => 2.2,
            'supports'     => array(
                'title',
                'editor',
                'thumbnail',
            ), 
            'taxonomies'   => array(
                'post_tag',
                'category',
            )
        )
    );
    register_taxonomy_for_object_type( 'category', 'education' );
    register_taxonomy_for_object_type( 'post_tag', 'education' );
    
    /*-------------------
     ## Project
     ------------------*/
    register_post_type( 'projects',
        array(
            'labels'       => array(
                'name'       => __( 'Projects' ),
                'singular_name' => __( 'Project' ),
                'add_new_item'       => __( 'Add New Project' ),
                'new_item'       => __( 'New Project' ),
                'edit_item'       => __( 'Edit Project' ),
                'view_item'       => __( 'View Project' ),
                'search_items'       => __( 'Search Project' ),
                'not_found'       => __( 'No Project Found' ),
                'archives'       => __( 'Project Archives' ),
                'attributes'       => __( 'Project Attributes' ),
                'insert_into_item'       => __( 'Insert into Project' ),
                'upload_to_this_item'       => __( 'Upload to Project' ),
            ),
            'public'       => true,
            'hierarchical' => true,
            'has_archive'  => true,
            'menu_position' => 2.3,
            'supports'     => array(
                'title',
                'editor',
            ), 
            'taxonomies'   => array(
                'post_tag',
                'category',
            )
        )
    );
    register_taxonomy_for_object_type( 'category', 'projects' );
    register_taxonomy_for_object_type( 'post_tag', 'projects' );
        /*-------------------
     ## Certification
     ------------------*/
    register_post_type( 'certifications',
        array(
            'labels'       => array(
                'name'       => __( 'Certifications' ),
                'singular_name' => __( 'Certification' ),
                'add_new_item'       => __( 'Add New Certification' ),
                'new_item'       => __( 'New Certification' ),
                'edit_item'       => __( 'Edit Certification' ),
                'view_item'       => __( 'View Certification' ),
                'search_items'       => __( 'Search Certification' ),
                'not_found'       => __( 'No Certification Found' ),
                'archives'       => __( 'Certification Archives' ),
                'attributes'       => __( 'Certification Attributes' ),
                'insert_into_item'       => __( 'Insert into Certification' ),
                'upload_to_this_item'       => __( 'Upload to Certification' ),
            ),
            'public'       => true,
            'hierarchical' => true,
            'has_archive'  => true,
            'menu_position' => 2.4,
            'supports'     => array(
                'title',
                'editor',
            ), 
            'taxonomies'   => array(
                'post_tag',
                'category',
            )
        )
    );
    register_taxonomy_for_object_type( 'category', 'certifications' );
    register_taxonomy_for_object_type( 'post_tag', 'certifications' );
    /*-------------------
     ## Award / Recognition
     ------------------*/
    register_post_type( 'awards',
        array(
            'labels'       => array(
                'name'       => __( 'Awards and Recognition' ),
                'singular_name' => __( 'Award' ),
                'add_new_item'       => __( 'Add New Award' ),
                'new_item'       => __( 'New Award' ),
                'edit_item'       => __( 'Edit Award' ),
                'view_item'       => __( 'View Award' ),
                'search_items'       => __( 'Search Award' ),
                'not_found'       => __( 'No Award Found' ),
                'archives'       => __( 'Award Archives' ),
                'attributes'       => __( 'Award Attributes' ),
                'insert_into_item'       => __( 'Insert into Award' ),
                'upload_to_this_item'       => __( 'Upload to Award' ),
            ),
            'public'       => true,
            'hierarchical' => true,
            'has_archive'  => true,
            'menu_position' => 2.5,
            'supports'     => array(
                'title',
                'editor',
            ), 
            'taxonomies'   => array(
                'post_tag',
                'category',
            )
        )
    );
    register_taxonomy_for_object_type( 'category', 'awards' );
    register_taxonomy_for_object_type( 'post_tag', 'awards' );
    /*-------------------
     ## Publication
     ------------------*/
    register_post_type( 'publications',
        array(
            'labels'       => array(
                'name'       => __( 'Publications' ),
                'singular_name' => __( 'Publication' ),
                'add_new_item'       => __( 'Add New Publication' ),
                'new_item'       => __( 'New Publication' ),
                'edit_item'       => __( 'Edit Publication' ),
                'view_item'       => __( 'View Publication' ),
                'search_items'       => __( 'Search Publication' ),
                'not_found'       => __( 'No Publication Found' ),
                'archives'       => __( 'Publication Archives' ),
                'attributes'       => __( 'Publication Attributes' ),
                'insert_into_item'       => __( 'Insert into Publication' ),
                'upload_to_this_item'       => __( 'Upload to Publication' ),
            ),
            'public'       => true,
            'hierarchical' => true,
            'has_archive'  => true,
            'menu_position' => 2.6,
            'supports'     => array(
                'title',
                'editor',
            ), 
            'taxonomies'   => array(
                'post_tag',
                'category',
            )
        )
    );
    register_taxonomy_for_object_type( 'category', 'publications' );
    register_taxonomy_for_object_type( 'post_tag', 'publications' );
    
}
add_action( 'init', 'create_custom_post_types' );

/*--------------------------------------------------------------
 # Custom meta boxes and fields
 --------------------------------------------------------------*/
/*-------------------
 ## Date Fields
 ------------------*/

//Generate meta boxes based on the post type
add_action( 'add_meta_boxes', 'add_custom_meta_box' );
function add_custom_meta_box($postType) {
    //recursive search function to find $postType in multidimensional arrays
    function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                return true;
            }
        }

        return false;
        //Function copied from user jwueller: https://stackoverflow.com/a/4128377
    }
    //arrays to define which post types get which meta boxes
    //all_dates get both a start and end date
    $all_dates = array('experience', 'education');
    //end_date gets only the completion date
    $end_date = array(
        array('projects', 'Completion Date'),
        array('publications', 'Publication Date')
    );
	
    if(in_array($postType, $all_dates)){
		add_meta_box(
				'date_meta_box', // $id
                'Dates', // $title
                'show_all_date_fields_meta_box', // $callback
                $postType, // $screen
                'normal', // $context
                'high' // $priority
		);
	}
    
    if (in_array_r($postType, $end_date)) {        
        add_meta_box(
                'date_meta_box', // $id
                'Date', // $title
                'show_end_date_fields_meta_box', // $callback
                $postType, // $screen
                'normal', // $context
                'high' // $priority
        );
    }
}

function show_all_date_fields_meta_box() {
	global $post;  
		$meta = get_post_meta( $post->ID, 'custom_fields', true ); ?>

	<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
    <!-- Start Date -->
    <p>
        <label for="custom_fields[start_date]">Start Date</label>
        <br>
        <input type="date" name="custom_fields[start_date]" id="custom_fields[start_date]]" class="regular-text" value="<?php if ( isset ( $meta['start_date'] ) ) echo $meta['start_date']; ?>">
    </p>
    <!-- End Date -->
    <p>
        <label for="custom_fields[end_date]">End Date</label>
        <br>
        <input type="date" name="custom_fields[end_date]" id="custom_fields[end_date]]" class="regular-text" value="<?php if ( isset ( $meta['end_date'] ) ) echo $meta['end_date']; ?>">
    </p>

	<?php }

function show_end_date_fields_meta_box() {
	global $post;  
    $meta = get_post_meta( $post->ID, 'custom_fields', true ); ?>

	<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
    <!-- End Date -->
    <p>
        <label for="custom_fields[end_date]">End Date</label>
        <br>
        <input type="date" name="custom_fields[end_date]" id="custom_fields[end_date]]" class="regular-text" value="<?php if ( isset ( $meta['end_date'] ) ) echo $meta['end_date']; ?>">
    </p>

	<?php }

//Function to save all custom fields content
function save_custom_fields_meta( $post_id ) {   
	// verify nonce
	if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
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
	
	$old = get_post_meta( $post_id, 'custom_fields', true );
	$new = $_POST['custom_fields'];

	if ( $new && $new !== $old ) {
		update_post_meta( $post_id, 'custom_fields', $new );
	} elseif ( '' === $new && $old ) {
		delete_post_meta( $post_id, 'custom_fields', $old );
	}
}
add_action( 'save_post', 'save_custom_fields_meta' );
