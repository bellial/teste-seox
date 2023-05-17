<?php

/**
 * Seox functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package seox
 */


if (!function_exists('seox_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function seox_setup() {

        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         * The .mo files must use language-only filenames, like languages/de_DE.mo in your theme directory.
         * Unlike plugin language files, a name like my_theme-de_DE.mo will NOT work. 
         * Although plugin language files allow you to specify the text-domain in the filename, this will NOT work with themes. 
         * Language files for themes should include the language shortcut ONLY.
         */

        load_theme_textdomain('seox', get_stylesheet_directory() . '/languages');

        /**
         * This feature enables Post Thumbnails (https://codex.wordpress.org/Post_Thumbnails) support for a theme. 
         * Note that you can optionally pass a second argument, $args, 
         * with an array of the Post Types (https://codex.wordpress.org/Post_Types) for which you want to enable this feature.
         */

        add_theme_support('post-thumbnails');
        //add_theme_support( 'post-thumbnails', array( 'post' ) );          // Posts only
        //add_theme_support( 'post-thumbnails', array( 'page' ) );          // Pages only
        //add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) ); // Posts and Movies

        /**
         * To display thumbnails in themes index.php or single.php or custom templates, use:
         * 
         * the_post_thumbnail();
         * 
         * To check if there is a post thumbnail assigned to the post before displaying it, use:
         * 
         * if ( has_post_thumbnail() ) {
         *  the_post_thumbnail();
         * }
         */


        /**
         * This feature enables Post Formats support for a theme. When using child themes, be aware that it
         * will override the formats as defined by the parent theme, not add to it.
         */

        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        ));
        
        /**
         * To enable the specific formats (see supported formats at Post Formats), use:
         * add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
         * To check if there is a ‘quote’ post format assigned to the post, use has_post_format():
         * // In your theme single.php, page.php or custom post type
         * if ( has_post_format( 'quote' ) ) {
         *  echo 'This is a quote.';
         * }
         */

         // This feature enables plugins and themes to manage the document title tag (https://codex.wordpress.org/Title_Tag). 

        add_theme_support('title-tag');

           // Enables Theme_Logo (https://codex.wordpress.org/Theme_Logo) support for a theme.

        add_theme_support('custom-logo');

        /**
            * Note that you can add default arguments using:
            * add_theme_support( 'custom-logo', array(
            *     'height'               => 100,
            *     'width'                => 400,
            *     'flex-height'          => true,
            *     'flex-width'           => true,
            *     'header-text'          => array( 'site-title', 'site-description' ),
            *     'unlink-homepage-logo' => true,
            * ) );
            */

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */

        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));

        //This feature enables Custom_Backgrounds (https://codex.wordpress.org/Custom_Backgrounds) support for a theme.

        add_theme_support('custom-background');

        /**
         * Note that you can add default arguments using:
         * $defaults = array(
         *   'default-image'          => '',
         *   'default-preset'         => 'default', // 'default', 'fill', 'fit', 'repeat', 'custom'
         *   'default-position-x'     => 'left',    // 'left', 'center', 'right'
         *   'default-position-y'     => 'top',     // 'top', 'center', 'bottom'
         *   'default-size'           => 'auto',    // 'auto', 'contain', 'cover'
         *   'default-repeat'         => 'repeat',  // 'repeat-x', 'repeat-y', 'repeat', 'no-repeat'
         *   'default-attachment'     => 'scroll',  // 'scroll', 'fixed'
         *   'default-color'          => '',
         *   'wp-head-callback'       => '_custom_background_cb',
         *   'admin-head-callback'    => '',
         *   'admin-preview-callback' => '',
         *  );
         *add_theme_support( 'custom-background', $defaults );
         */
        }



endif;

add_action('after_setup_theme', 'seox_setup');

/**
 * Enqueue scripts and styles.
 */

function seox_scripts() {

    wp_enqueue_style('bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', false, 'all');
    wp_enqueue_style('seox-stylesheet', get_stylesheet_uri(), array());
    wp_enqueue_style('slick-style', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', false, 'all');

    // scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', true, null);
    wp_enqueue_script('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', true, null);
    wp_enqueue_script('seox-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'seox_scripts', 99);