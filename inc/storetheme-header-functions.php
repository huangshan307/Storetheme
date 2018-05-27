<?php
    /**
     * Logo
     */
    if ( ! function_exists( storetheme_logo ) ) {
        function storetheme_logo($var = 'main') {
            switch ($var) {
                case 'top':
                    printf(
                        '<a class="navbar-brand d-inline-block d-md-none mr-auto" href="%1$s"><img src="%2$s" height="30" alt="%3$s"></a>',
                        get_bloginfo( 'url' ),
                        get_template_directory_uri() . '/images/logo.png',
                        get_bloginfo( 'sitename' )
                    );
                    break;
                
                default:
                    printf(
                        '<a class="header-logo" href="%1$s"><img src="%2$s" alt="%3$s"></a>',
                        get_bloginfo( 'url' ),
                        get_template_directory_uri() . '/images/logo.png',
                        get_bloginfo( 'sitename' )
                    );
                    break;
            }
        }
    }

    /**
     * Searchform Custom
     */
    if ( ! function_exists( storetheme_search ) ) {
        function storetheme_search() {
            do_action( 'pre_get_search_form' );
 
            $format = current_theme_supports( 'html5', 'search-form' ) ? 'html5' : 'xhtml';

            /**
             * Filters the HTML format of the search form.
             *
             * @since 3.6.0
             *
             * @param string $format The type of markup to use in the search form.
             *                       Accepts 'html5', 'xhtml'.
             */
            $format = apply_filters( 'search_form_format', $format );

            $search_form_template = locate_template( 'searchform.php' );
            if ( '' != $search_form_template ) {
                ob_start();
                require( $search_form_template );
                $form = ob_get_clean();
            } else {
                if ( 'html5' == $format ) {
                    $form = '<form role="search" method="get" class="search w-100 search-form" action="' . esc_url( home_url( '/' ) ) . '">
                        <div class="input-group w-100">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="searchFillter">' . _x( 'Search for:', 'label' ) . '</span>
                            </div>
                            <input class="form-control search-field" aria-label="Large" aria-describedby="inputGroup-sizing-sm" type="search" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder' ) . '"
                                        aria-label="Search" value="' . get_search_query() . '" name="s">
                        </div>
                        <div class="input-group-append">
                            <button class="search-submit btn bg-strong-primary text-light" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>';
                } else {
                    $form = '<form role="search" method="get" class="search w-100 search-form" action="' . esc_url( home_url( '/' ) ) . '">
                        <div class="input-group w-100">
                            <input class="form-control search-field" aria-label="Large" aria-describedby="inputGroup-sizing-sm" type="search" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder' ) . '"
                                        aria-label="Search" value="' . get_search_query() . '" name="s">
                            <div class="input-group-append">
                                <button class="btn bg-strong-primary text-light" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>';
                }

                $result = apply_filters( 'get_search_form', $form );
 
                if ( null === $result )
                    $result = $form;

                echo $result;
            }
        }
    }
    /**
     * Display cart link
     */
    if ( ! function_exists( storetheme_cart_link ) ) {
        function storetheme_cart_link() {
            ?>
                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="btn bg-transparent btn-cart cart-contents" data-toggle="tooltip" data-placement="bottom" title="Click xem giỏ hàng">
                    <i class="fas fa-shopping-cart text-light"></i>
                    <span class="badge badge-strong-primary"><?php echo wp_kses_data( sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) );?></span>
                </a>
            <?php
        }
    }
?>