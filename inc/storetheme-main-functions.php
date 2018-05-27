<?php
    /**
     * Title
     */
    if( ! function_exists( storetheme_title ) ) {
        function storetheme_title() {
            if ( is_single() ) : ?>

                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"></a>

            <?php else : ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                <h2 class="title my-3" title="<?php the_title(); ?>"></h2>
            </a><?php

            endif;
        }
    }

    /**
     * main theme content
     */
    function storetheme_content() {
        the_content();

        /*
        * Code hiển thị phân trang trong post type
        */
        $link_pages = array(
        'before' => __('<p>Page:', 'storetheme'),
        'after' => '</p>',
        'nextpagelink'     => __( 'Next page', 'storetheme' ),
        'previouspagelink' => __( 'Previous page', 'storetheme' )
        );
        wp_link_pages( $link_pages );
    }

    /**
     * Product thumbnail URL
     */
    if ( ! function_exists( storetheme_product_thumbnail_url ) ) {
        function storetheme_product_thumbnail_url($size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0) {
            global $post; 
            $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
            
            if ( has_post_thumbnail() ) {
                $thumbnail_url = get_the_post_thumbnail_url( $post->ID, $image_size);
            } elseif ( wc_placeholder_img_src() ) {
                $thumbnail_url = wc_placeholder_img_src();
            }

            $html = '<div class="item-image mb-2 position-relative"><div class="background"><div class="image" style="background-image: url(' . $thumbnail_url . ');"></div></div></div>';
            
            echo $html;
        }
    }
    /**
     * product content start body detail
     */
    function storetheme_content_product_detail_start() {
        echo '<div class="card-body">';
    }
    /**
     * product content end body detail
     */
    function storetheme_content_product_detail_end() {
        echo '</div>';
    }
    /**
     * product title
     */
    function storetheme_product_title() {
        echo '<div class="card-title"><h3 class="h5 text-muted font-weight-normal text-truncate" title="' . get_the_title() . '">' . get_the_title() . '</h3></div>';
    }
    /**
     * product content start reasonset
     */
    function storetheme_content_product_reason_start() {
        echo '<div class="reason-set clearfix">';
    }
    /**
     * product content end reasonset
     */
    function storetheme_content_product_reason_end() {
        echo '</div>';
    }
    /**
     * product Price in loop
     */
    function storetheme_product_price() {
        global $woocommerce;
        $currency = get_woocommerce_currency_symbol();
        $price = get_post_meta( get_the_ID(), '_regular_price', true);
        $sale = get_post_meta( get_the_ID(), '_sale_price', true);
        if ( $sale ) { ?>
            <div class="product-price">
                <span class="full-price text-muted"><?php echo number_format($price) . ' ' . $currency; ?></span>
                <span class="display-price text-primary"><?php echo number_format($sale) . ' ' . $currency; ?></span>
            </div>
        <?php
        
         } elseif ( $price ) { ?>
            <div class="product-price">
                <span class="display-price text-primary"><?php echo number_format($price) . ' ' . $currency; ?></span>
            </div>
        <?php    
        }
    }
    /**
     * product rating
     */
    function storetheme_product_rating() {
        global $product;
        if ( $average = $product->get_average_rating() ) {
            echo '<div class="star-container" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'">
                    <div class="tiny-star">
                        <div class="current-rating" style="width: '.( ( $average / 5 ) * 100 ) . '%;"></div>
                    </div>
                  </div>';
        } else {
            echo '<div class="star-container" title="'.sprintf(__( 'Chưa có đánh giá', 'woocommerce' ), $average).'">
                    <div class="tiny-star">
                    </div>
                  </div>';
        }
    }
    /**
     * category title
     */
    function storetheme_category_title() {
        global $category;
        echo '<div class="card-title"><h3 class="h5 text-dark">' . $category->name . '</h3></div>';
    }
    /**
     * Single title
     */
    function storetheme_single_title() {
        if ( is_single() ) {
            echo '<h1 class="title product-title">' . get_the_title() . '</h1>';
        }
    }
    /**
     * single price
     */
    function storetheme_single_price() {
        global $woocommerce;
        $currency = get_woocommerce_currency_symbol();
        $price = get_post_meta( get_the_ID(), '_regular_price', true);
        $sale = get_post_meta( get_the_ID(), '_sale_price', true);
        

        if ( $sale ) {
            $saved = $price - $sale;
            $average = ( $sale / $price ) * 100;
            $average = round($average);

            $html = '<div class="display-price mt-3">
                        <span class="h4 text-danger">' . number_format($sale) . ' ' . $currency . '</span>
                    </div>
                    <div class="price-money-info">
                        <span class="text-muted">Tiết kiệm: </span>
                        <span class="text-danger">' . number_format($average) . '%</span>
                        <span class="text-muted"> ( - ' . number_format($saved) . ' ' . $currency . ' )</span>
                    </div>
                    <div class="full-price mb-3">
                        <span class="text-muted">
                            Giá gốc:
                            <del>' . number_format($price) . ' ' . $currency . '</del>
                        </span>
                    </div>';
        } elseif ( $price ) {
            $html = '<div class="display-price my-3">
                        <span class="h4 text-danger">' . number_format($price) . ' ' . $currency . '</span>
                    </div>';
        }
        
        echo $html;
    }

    /**
     * Product thumbnail URL
     */
    function storetheme_get_product_thumbnail_url($size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0, $width = 100, $height = 100) {
        global $post; 
        $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
        
        if ( has_post_thumbnail() ) {
            $thumbnail_url = get_the_post_thumbnail_url( $post->ID, $image_size);
        } elseif ( wc_placeholder_img_src() ) {
            $thumbnail_url = wc_placeholder_img_src();
        }

        $html = '<figure class="figure"><img src="' . $thumbnail_url . '" width="' . $width . '" height="' . $height . '" class="figure-img img-fluid rounded" alt=""></figure>';
            
        return $html;
    }

    /**
     * * Get HTML for a gallery image.
     *
     * Woocommerce_gallery_thumbnail_size, woocommerce_gallery_image_size and woocommerce_gallery_full_size accept name based image sizes, or an array of width/height values.
     *
     * @since 3.3.2
     * @param int  $attachment_id Attachment ID.
     * @param bool $main_image Is this the main image or a thumbnail?.
     * @return string
     */
    function storetheme_get_gallery_image_html( $attachment_id, $main_image = false, $active = 1 ) {
        $flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
        $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
        $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
        $image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
        $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
        $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
        $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
        $image             = wp_get_attachment_image( $attachment_id, $image_size, false, array(
            'title'                   => get_post_field( 'post_title', $attachment_id ),
            'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
            'data-src'                => $full_src[0],
            'data-large_image'        => $full_src[0],
            'data-large_image_width'  => $full_src[1],
            'data-large_image_height' => $full_src[2],
            'class'                   => $main_image ? 'd-block w-100 rounded' : 'd-block w-100 rounded',
        ) );

        if ( $active == 1 ) {
            $result .= '<div class="carousel-item" data-thumb="' . esc_url( $thumbnail_src[0] ) . '">';
        } else {
            $result .= '<div class="carousel-item active" data-thumb="' . esc_url( $thumbnail_src[0] ) . '">';
        }
            
        $result .= '<a href="' . esc_url( $full_src[0] ) . '">' . $image . '</a>';
        $result .= '</div>';

           return $result;
    }
    if ( ! function_exists( 'storetheme_display_comments' ) ) {
        /**
         * Storefront display comments
         *
         * @since  1.0.0
         */
        function storetheme_display_comments() {
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || '0' != get_comments_number() ) :
                comments_template();
            endif;
        }
    }
    function storetheme_form_field( $key, $args, $value = null ) { 
        $defaults = array( 
            'type' => 'text',  
            'label' => '',  
            'description' => '',  
            'placeholder' => '',  
            'maxlength' => false,  
            'required' => false,  
            'autocomplete' => false,  
            'id' => $key,  
            'class' => array(),  
            'label_class' => array(),  
            'input_class' => array(),  
            'return' => false,  
            'options' => array(),  
            'custom_attributes' => array(),  
            'validate' => array(),  
            'default' => '',  
            'autofocus' => '',  
            'priority' => '',  
        ); 
    
        $args = wp_parse_args( $args, $defaults ); 
        $args = apply_filters( 'woocommerce_form_field_args', $args, $key, $value ); 
    
        if ( $args['required'] ) { 
            $args['class'][] = 'validate-required'; 
            $required = ' <small title="' . esc_attr__( 'required', woocommerce ) . '">(' . esc_attr__( 'required', woocommerce ) . ')</small>'; 
        } else { 
            $required = ''; 
        } 
    
        if ( is_string( $args['label_class'] ) ) { 
            $args['label_class'] = array( $args['label_class'] ); 
        } 
    
        if ( is_null( $value ) ) { 
            $value = $args['default']; 
        } 
    
        // Custom attribute handling 
        $custom_attributes = array(); 
        $args['custom_attributes'] = array_filter( (array) $args['custom_attributes'] ); 
    
        if ( $args['maxlength'] ) { 
            $args['custom_attributes']['maxlength'] = absint( $args['maxlength'] ); 
        } 
    
        if ( ! empty( $args['autocomplete'] ) ) { 
            $args['custom_attributes']['autocomplete'] = $args['autocomplete']; 
        } 
    
        if ( true === $args['autofocus'] ) { 
            $args['custom_attributes']['autofocus'] = 'autofocus'; 
        } 
    
        if ( ! empty( $args['custom_attributes'] ) && is_array( $args['custom_attributes'] ) ) { 
            foreach ( $args['custom_attributes'] as $attribute => $attribute_value ) { 
                $custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"'; 
            } 
        } 
    
        if ( ! empty( $args['validate'] ) ) { 
            foreach ( $args['validate'] as $validate ) { 
                $args['class'][] = 'validate-' . $validate; 
            } 
        } 
    
        $field = ''; 
        $label_id = $args['id']; 
        $sort = $args['priority'] ? $args['priority'] : ''; 
        $field_container = '<div class="form-group form-row %1$s" id="%2$s" data-priority="' . esc_attr( $sort ) . '">%3$s</div>'; 
    
        switch ( $args['type'] ) { 
            case 'country' : 
    
                $countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries(); 
    
                if ( 1 === sizeof( $countries ) ) { 
    
                    $field .= '<p class="ml-3 mt-1"><strong>' . current( array_values( $countries ) ) . '</strong></p>'; 
    
                    $field .= '<input type="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="' . current( array_keys( $countries ) ) . '" ' . implode( ' ', $custom_attributes ) . ' class="country_to_state" />'; 
    
                } else { 
    
                    $field = '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="country_to_state country_select custom-select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . '>' . '<option value="">' . esc_html__( 'Select a country…', woocommerce ) . '</option>'; 
    
                    foreach ( $countries as $ckey => $cvalue ) { 
                        $field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>'; 
                    } 
    
                    $field .= '</select>'; 
    
                    $field .= '<noscript><input type="submit" class="btn" name="woocommerce_checkout_update_totals" value="' . esc_attr__( 'Update country', woocommerce ) . '" /></noscript>'; 
    
                } 
    
                break; 
            case 'state' : 
    
                /** Get Country */ 
                $country_key = 'billing_state' === $key ? 'billing_country' : 'shipping_country'; 
                $current_cc = WC()->checkout->get_value( $country_key ); 
                $states = WC()->countries->get_states( $current_cc ); 
    
                if ( is_array( $states ) && empty( $states ) ) { 
    
                    $field_container = '<p class="form-row %1$s" id="%2$s" style="display: none">%3$s</p>'; 
    
                    $field .= '<input type="hidden" class="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="" ' . implode( ' ', $custom_attributes ) . ' placeholder="' . esc_attr( $args['placeholder'] ) . '" />'; 
    
                } elseif ( ! is_null( $current_cc ) && is_array( $states ) ) { 
    
                    $field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="state_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ) . '"> 
                        <option value="">' . esc_html__( 'Select a state…', woocommerce ) . '</option>'; 
    
                    foreach ( $states as $ckey => $cvalue ) { 
                        $field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>'; 
                    } 
    
                    $field .= '</select>'; 
    
                } else { 
    
                    $field .= '<input type="text" class="input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $value ) . '"  placeholder="' . esc_attr( $args['placeholder'] ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" ' . implode( ' ', $custom_attributes ) . ' />'; 
    
                } 
    
                break; 
            case 'textarea' : 
    
                $field .= '<textarea name="' . esc_attr( $key ) . '" class="form-control ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . ( empty( $args['custom_attributes']['rows'] ) ? ' rows="3"' : '' ) . ( empty( $args['custom_attributes']['cols'] ) ? ' cols="5"' : '' ) . implode( ' ', $custom_attributes ) . '>' . esc_textarea( $value ) . '</textarea>'; 
    
                break; 
            case 'checkbox' : 
    
                $field = '<label class="checkbox ' . implode( ' ', $args['label_class'] ) . '" ' . implode( ' ', $custom_attributes ) . '> 
                        <input type="' . esc_attr( $args['type'] ) . '" class="input-checkbox ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="1" ' . checked( $value, 1, false ) . ' /> ' 
                        . $args['label'] . $required . '</label>'; 
    
                break; 
            case 'password' : 
            case 'text' : 
            case 'email' : 
            case 'tel' : 
            case 'number' : 
    
                $field .= '<input type="' . esc_attr( $args['type'] ) . '" class="form-control ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '"  value="' . esc_attr( $value ) . '" ' . implode( ' ', $custom_attributes ) . ' />'; 
    
                break; 
            case 'select' : 
    
                $options = $field = ''; 
    
                if ( ! empty( $args['options'] ) ) { 
                    foreach ( $args['options'] as $option_key => $option_text ) { 
                        if ( '' === $option_key ) { 
                            // If we have a blank option, select2 needs a placeholder 
                            if ( empty( $args['placeholder'] ) ) { 
                                $args['placeholder'] = $option_text ? $option_text : __( 'Choose an option', woocommerce ); 
                            } 
                            $custom_attributes[] = 'data-allow_clear="true"'; 
                        } 
                        $options .= '<option value="' . esc_attr( $option_key ) . '" ' . selected( $value, $option_key, false ) . '>' . esc_attr( $option_text ) . '</option>'; 
                    } 
    
                    $field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ) . '"> 
                            ' . $options . ' 
                        </select>'; 
                } 
    
                break; 
            case 'radio' : 
    
                $label_id = current( array_keys( $args['options'] ) ); 
    
                if ( ! empty( $args['options'] ) ) { 
                    foreach ( $args['options'] as $option_key => $option_text ) { 
                        $field .= '<input type="radio" class="input-radio ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $option_key ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '"' . checked( $value, $option_key, false ) . ' />'; 
                        $field .= '<label for="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '" class="radio ' . implode( ' ', $args['label_class'] ) . '">' . $option_text . '</label>'; 
                    } 
                } 
    
                break; 
        } 
    
        if ( ! empty( $field ) ) { 
            $field_html = ''; 
    
            if ( $args['label'] && 'checkbox' != $args['type'] ) { 
                $field_html .= '<label for="' . esc_attr( $label_id ) . '" class="' . esc_attr( implode( ' ', $args['label_class'] ) ) . '">' . $args['label'] . $required . '</label>'; 
            } 
    
            $field_html .= $field; 
    
            if ( $args['description'] ) { 
                $field_html .= '<span class="description">' . esc_html( $args['description'] ) . '</span>'; 
            } 
    
            $container_class = esc_attr( implode( ' ', $args['class'] ) ); 
            $container_id = esc_attr( $args['id'] ) . '_field'; 
            $field = sprintf( $field_container, $container_class, $container_id, $field_html ); 
        } 
    
        $field = apply_filters( 'woocommerce_form_field_' . $args['type'], $field, $key, $args, $value ); 
    
        if ( $args['return'] ) { 
            return $field; 
        } else { 
            echo $field; 
        } 
    } 

?>