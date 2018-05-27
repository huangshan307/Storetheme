<?php
    /**
     * Set the function that the theme supports
     */
    if ( ! function_exists(storetheme_setup) ) {
        function storetheme_setup() {
            /**
             * Auto insert RSS Link
             */
            add_theme_support( 'automatic-feed-links' );

            /**
             * Add function thumbnail in post
             */
            add_theme_support( 'post-thumbnails' );

            /**
             * Add function title-tag
             */
            add_theme_support( 'title-tag' );

            /**
             * Add post format
             */
            add_theme_support( 'post-formats',
                array(
                'image',
                'video',
                'gallery',
                'quote',
                'link'
                )
            );

            add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );

            /**
             * Create menu
             */
            register_nav_menu ( 'primary-menu', __('Primary Menu', 'storetheme') );

            /**
             * Create sidebar
             */
            $sidebar = array(
                'name' => __('Main Sidebar', 'storetheme'),
                'id' => 'main-sidebar',
                'description' => 'Main sidebar',
                'class' => 'main-sidebar',
                'before_title' => '<h2 class="widgettitle">',
                'after_title' => '</h2>'
            );
            register_sidebar( $sidebar );

        }
        add_action( 'init', 'storetheme_setup' );
    }

    /**
     * Enqueue scripts and styles.
     */
    if ( ! function_exists( scripts ) ) {
        function scripts() {
            /**
             * Styles
             */
            wp_enqueue_style( 'storetheme-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', '', $storetheme_version );
            wp_style_add_data( 'storetheme-bootstrap-css', 'rtl', 'replace' );

            wp_enqueue_style( 'storetheme-main-style', get_template_directory_uri() . '/css/main.css', '', $storetheme_version );
            wp_style_add_data( 'storetheme-main-style', 'rtl', 'replace' );

            wp_enqueue_style( 'storetheme-style', get_template_directory_uri() . '/style.css', '', $storetheme_version );
            wp_style_add_data( 'storetheme-style', 'rtl', 'replace' );

            /**
             * Font
             */
            wp_enqueue_style( 'storetheme-font-awsome', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css', '', $storetheme_version );
            wp_style_add_data( 'storetheme-font-awsome', 'rtl', 'replace' );

            /**
             * Js
             */
            wp_enqueue_script( 'storetheme-jquery', get_template_directory_uri() . '/js/jquery.js', array(), $storetheme_version, false );
            wp_enqueue_script( 'storetheme-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), $storetheme_version, false );
            wp_enqueue_script( 'storetheme-bootstrap-bundle-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), $storetheme_version, false );
            wp_enqueue_script( 'storetheme-main', get_template_directory_uri() . '/js/main.js', array(), $storetheme_version, false );
        }
        add_action( 'wp_enqueue_scripts', 'scripts' );
    }
?>