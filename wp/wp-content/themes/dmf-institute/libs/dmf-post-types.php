<?php



// Register Custom Post Type
function register_custom_post_types() {

    /*========== Resources Post Type  ==========*/
    
    $labels = array(
        'name'                => _x( 'Resources', 'Post Type General Name' ),
        'singular_name'       => _x( 'Resource', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Resources' ),
        'parent_item_colon'   => __( 'Parent Resource' ),
        'all_items'           => __( 'All Resources' ),
        'view_item'           => __( 'View Resource' ),
        'add_new_item'        => __( 'Add New Resource' ),
        'add_new'             => __( 'Add Resource' ),
        'edit_item'           => __( 'Edit Resource' ),
        'update_item'         => __( 'Update Resource' ),
        'search_items'        => __( 'Search Resources' ),
        'not_found'           => __( 'Resource Not Found' ),
        'not_found_in_trash'  => __( 'Resource Not Found in Trash' ),
    );
    $args = array(
        'label'               => __( 'resources'),
        'description'         => __( 'Resource Information'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'author', 'post-thumbnails', 'excerpt'),
        'taxonomies'          => array( ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-vault',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'rewrite'             => array('slug' => 'resources'),
    );
    register_post_type( 'resource', $args );

    /*==========  Resource Taxonomy  ==========*/
    $labels = array(
        'name'                       => _x( 'Resource Category', 'Taxonomy General Name' ),
        'singular_name'              => _x( 'Resource Category', 'Taxonomy Singular Name' ),
        'menu_name'                  => __( 'Categories' ),
        'all_items'                  => __( 'All Categories' ),
        'parent_item'                => __( 'Parent Category' ),
        'parent_item_colon'          => __( 'Parent Categories:' ),
        'new_item_name'              => __( 'New Category' ),
        'add_new_item'               => __( 'Add New Category' ),
        'edit_item'                  => __( 'Edit Category' ),
        'update_item'                => __( 'Update Category' ),
        'separate_items_with_commas' => __( 'Separate Categories with commas' ),
        'search_items'               => __( 'Search Categories' ),
        'add_or_remove_items'        => __( 'Add or remove Categorues' ),
        'choose_from_most_used'      => __( 'Choose from the most used Categories' ),
        'not_found'                  => __( 'Not Found' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'resource-category', array('resource'), $args );

    /*========== Staff Post Type  ==========*/
    
    $labels = array(
        'name'                => _x( 'Staff', 'Post Type General Name' ),
        'singular_name'       => _x( 'Staff', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Staff' ),
        'parent_item_colon'   => __( 'Parent Staff' ),
        'all_items'           => __( 'All Staff' ),
        'view_item'           => __( 'View Staff' ),
        'add_new_item'        => __( 'Add New Staff' ),
        'add_new'             => __( 'Add Staff' ),
        'edit_item'           => __( 'Edit Staff' ),
        'update_item'         => __( 'Update Staff' ),
        'search_items'        => __( 'Search Staff' ),
        'not_found'           => __( 'Staff Not Found' ),
        'not_found_in_trash'  => __( 'Staff Not Found in Trash' ),
    );
    $args = array(
        'label'               => __( 'staff'),
        'description'         => __( 'Staff Information'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'author', 'post-thumbnails'),
        'taxonomies'          => array( ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-groups',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'rewrite'             => array('slug' => 'staff'),
    );
    register_post_type( 'staff', $args );

    /*========== Events Post Type  ==========*/
    
    $labels = array(
        'name'                => _x( 'Events', 'Post Type General Name' ),
        'singular_name'       => _x( 'Event', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Events' ),
        'parent_item_colon'   => __( 'Parent Event' ),
        'all_items'           => __( 'All Event' ),
        'view_item'           => __( 'View Event' ),
        'add_new_item'        => __( 'Add New Event' ),
        'add_new'             => __( 'Add Event' ),
        'edit_item'           => __( 'Edit Event' ),
        'update_item'         => __( 'Update Event' ),
        'search_items'        => __( 'Search Events' ),
        'not_found'           => __( 'Event Not Found' ),
        'not_found_in_trash'  => __( 'Event Not Found in Trash' ),
    );
    $args = array(
        'label'               => __( 'event'),
        'description'         => __( 'Event Information'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'author', 'post-thumbnails'),
        'taxonomies'          => array( ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-calendar-alt',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'rewrite'             => array('slug' => 'events'),
    );
    register_post_type( 'event', $args );

    /*========== Testimonials Post Type  ==========*/
    
    $labels = array(
        'name'                => _x( 'Testimonials', 'Post Type General Name' ),
        'singular_name'       => _x( 'Testimonials', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Testimonials' ),
        'parent_item_colon'   => __( 'Parent Testimonial' ),
        'all_items'           => __( 'All Testimonials' ),
        'view_item'           => __( 'View Testimonial' ),
        'add_new_item'        => __( 'Add New Testimonial' ),
        'add_new'             => __( 'Add Testimonial' ),
        'edit_item'           => __( 'Edit Testimonial' ),
        'update_item'         => __( 'Update Testimonial' ),
        'search_items'        => __( 'Search Testimonials' ),
        'not_found'           => __( 'Testimonial Not Found' ),
        'not_found_in_trash'  => __( 'Testimonial Not Found in Trash' ),
    );
    $args = array(
        'label'               => __( 'testimonial'),
        'description'         => __( 'Testimonial Information'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'author', 'post-thumbnails'),
        'taxonomies'          => array( ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-chat',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'rewrite'             => array('slug' => 'testimonials'),
    );
    register_post_type( 'testimonial', $args );

    

  


}

// Hook into the 'init' action
add_action( 'init', 'register_custom_post_types', 0 );