<?php
    /**
     * 
     * @ THEME_URL = get_stylesheet_directory() // đường dẫn tới thư mục theme
     * @ INC = folder/inc - important source
     * 
     */
    define( 'THEME_URL', get_stylesheet_directory() );
    define( 'INC', THEME_URL . '/inc' );
    /**
     * Assign the Storefront version to a var
     */
    $theme              = wp_get_theme( 'storetheme' );
    $storetheme_version = $theme['Version'];
    /**
     * Set the theme width
     */
    if ( ! isset( $content_width ) ) {
        $content_width = 980; /* pixels */
    }

    /**
     * 
     * Load theme functions
     */
    require INC . '/storetheme-functions.php';

    /**
     * 
     * Load header funtions
     */
    require INC . '/storetheme-header-functions.php';

    /**
     * Load main funcrions
     */
    require INC . '/storetheme-main-functions.php';
?>