<?php
// Silence is golden.

/*
Plugin Name: Book Reviews
Plugin URI: http://bookreviews.com/
Description: Add great book reviews to our site.
Author: Saheed Ibrahim
Version: 1.0.0
Author URI: http://bookreviews.com/
License: GPL2
*/


 // Register a custom post type called "book review".
 // @see get_post_type_labels() for label keys.
 

add_action( 'init', 'br_post_type');

function br_post_type () {
    $labels = array(
        'name'                  => _x( 'Book Reviews', 'Post type general name', 'book-reviews' ),
        'singular_name'         => _x( 'Book Reviews', 'Post type singular name', 'book-reviews' ),
        'menu_name'             => _x( 'Book Reviews', 'Admin Menu text', 'book-reviews' ),
        'name_admin_bar'        => _x( 'Book Reviews', 'Add New on Toolbar', 'book-reviews' ),
        'add_new'               => __( 'Add New', 'book', 'book-reviews' ),
        'add_new_item'          => __( 'Add New Review', 'book-reviews' ),
        'new_item'              => __( 'New Book Reviews', 'book-reviews' ),
        'edit_item'             => __( 'Edit Book Reviews', 'book-reviews' ),
        'view_item'             => __( 'View Book Reviews', 'book-reviews' ),
        'all_items'             => __( 'All Book Reviews', 'book-reviews' ),
        'search_items'          => __( 'Search Book Reviews', 'book-reviews' ),
        'parent_item_colon'     => __( 'Parent Book Reviews:', 'book-reviews' ),
        'not_found'             => __( 'No Reviews found.', 'book-reviews' ),
        'not_found_in_trash'    => __( 'No Reviews found in Trash.', 'book-reviews' )
    );
 
    $args = array(
        'labels'             => $labels,
        'description'         => __('Book Reviews for our site', 'book-reviews' ),
        'public'             => true,
        'rewrite'            => array( 'slug' => 'book_review' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
        'menu_icon'          => 'dashicons-book'
    );
 
    register_post_type( 'book_review', $args );
}

add_filter('the_content', 'prepend_book_data');
function prepend_book_data($content){
    if(is_singular('book_review')){
        $author = get_post_meta(get_the_ID(),'author', true);
        $score = get_post_meta(get_the_ID(), 'score', true);
        $html = '
        <div class = "book-meta">
        <strong>Author: </strong> '.$author.' <br>
        <strong>Score: </strong> '.$score.' <br>
        </div>' ;      
        return $content. $html;

    }
    return $content;
}

add_action('pre_get_posts', 'add_book_review_to_query');
function add_book_review_to_query( $query ){
    if(!is_admin()){
    $query->set('post_type', array('post', 'book_review') );
    }
}

add_filter('the_title', 'prepend_post_type', 10, 2);
function prepend_post_type($title, $id){
    if( is_home() ){
        $post_type = get_post_type($id);
        $types = array(
            'post' => 'Blog',
            'book_review' => 'Review',
        );

    }
    return '<small>' .$types[$post_type]. ': </small><br>' .$title;
}
 
