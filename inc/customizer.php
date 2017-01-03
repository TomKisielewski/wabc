<?php
/**
 * wabc Theme Customizer.
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wabc_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
}
add_action('customize_register', 'wabc_customize_register');

///////////////////////////////////////////////////////////////////////////////
/**
 * Duplicate the sanitize_hex_color function, which is generally
 * only available to the theme customizer.
 */
if ( !function_exists( 'sanitize_hex_color' ) ) {
 function sanitize_hex_color( $color ) {
 if ( '' === $color )
 return '';
 // 3 or 6 hex digits, or the empty string.
 if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
 return $color;
 return null;
 }
}
////////////////////////////////////////////////////////////////////////////////

function wabc_theme_customize_register($wp_customize)
{


  //Custom control class

  //Categories dropdown control.
   class Wabc_Categories_Dropdown extends WP_Customize_Control {
       public function render_content() {
           $dropdown = wp_dropdown_categories(
               array(
                   'name'              => '_customize-dropdown-categories-' . $this->id,
                   'echo'              => 0,
                   'show_option_none'  => __( '&mdash; Select &mdash;', 'wabc' ),
                   'option_none_value' => '0',
                   'selected'          => $this->value(),
               )
           );

           $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

           printf(
               '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
               $this->label,
               $dropdown
           );
       }
   }
  // End custom Categories dropdown control

  $wp_customize->add_section('wabc_theme_script_options', array(
      'title' => __('Add scripts', 'wabc'),
    ));

    $wp_customize->add_setting('wabc_theme_script_code_setting', array(
      'default' => '',
      'sanitize_callback' => 'esc_textarea',
    ));

    $wp_customize->add_control('wabc_theme_script_code', array(
      'label' => __('Add custom JS code here', 'wabc'),
      'section' => 'wabc_theme_script_options',
      'type' => 'textarea',
      'settings' => 'wabc_theme_script_code_setting',
    ));
    $wp_customize->add_setting('wabc_nav_bkg_color_setting', array(
      'default' => '466675',
      'type' => 'theme_mod',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wabc_nav_bkg_color_control', array(
       'label' => __('Nav Bkg Color', 'wabc'),
       'section' => 'colors',
       'settings' => 'wabc_nav_bkg_color_setting',
     )));
    $wp_customize->add_setting('wabc_footer_bkg_color_setting', array(
      'default' => '6a8d9d',
      'type' => 'theme_mod',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wabc_footer_bkg_color_control', array(
      'label' => __('Footer Bkg Color', 'wabc'),
      'section' => 'colors',
      'settings' => 'wabc_footer_bkg_color_setting',
    )));
    //___Carousel___//thats carousel
    $wp_customize->add_section('wabc_carousel',array(
      'title' => __('Carousel', 'wabc'),

        )
    );
    // Custom Logo
    $wp_customize->add_section('wabc_logo_section',array(
      'title'=>__('Custom logo','wabc'),
      'description'=>__('Add logo to your site','wabc'),

    ));
    $wp_customize->add_setting('site_logo',array(
      'default'=>'',
      'transport'=>'postMessage',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize ,'site_logo' ,array(
      'label'=>__('Site logo','wabc'),
      'section'=>'wabc_logo_section',
    )));

    //Display: Front page
    $wp_customize->add_setting(
        'carousel_display_front',
        array(
            'sanitize_callback' => 'wabc_sanitize_checkbox',
            'default' => 0,
        )
    );
    $wp_customize->add_control(
        'carousel_display_front',
        array(
            'type' => 'checkbox',
            'label' => __('Show carousel on front page?', 'wabc'),
            'section' => 'wabc_carousel',
            'priority' => 8,
        )
    );
    //Display: Home and archives
   $wp_customize->add_setting(
       'carousel_display_archives',
       array(
           'sanitize_callback' => 'wabc_sanitize_checkbox',
           'default' => 1,
       )
   );
   $wp_customize->add_control(
       'carousel_display_archives',
       array(
           'type' => 'checkbox',
           'label' => __('Show carousel on blog index/archives/etc?', 'wabc'),
           'section' => 'wabc_carousel',
           'priority' => 9,
       )
   );
   //Display: Singular
    $wp_customize->add_setting(
        'carousel_display_singular',
        array(
            'sanitize_callback' => 'wabc_sanitize_checkbox',
            'default' => 0,
        )
    );
    $wp_customize->add_control(
        'carousel_display_singular',
        array(
            'type' => 'checkbox',
            'label' => __('Show carousel on single posts and pages?', 'wabc'),
            'section' => 'wabc_carousel',
            'priority' => 10,
        )
    );
    //Category
    $wp_customize->add_setting( 'carousel_cat', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( new wabc_Categories_Dropdown( $wp_customize, 'carousel_cat', array(
        'label'     => __('Select which category to show in the carousel', 'wabc'),
        'section'   => 'wabc_carousel',
        'settings'  => 'carousel_cat',
        'priority'  => 11
    ) ) );
    //Autoplay speed
    $wp_customize->add_setting(
        'carousel_speed',
        array(
            'default'           => '4000',
            'sanitize_callback' => 'wabc_sanitize_int',
        )
    );
    $wp_customize->add_control(
        'carousel_speed',
        array(
            'label'     => __('Enter the carousel speed in miliseconds [Default: 4000]', 'wabc'),
            'section'   => 'wabc_carousel',
            'type'      => 'text',
            'priority'  => 13
        )
    );
    //Number of posts
    $wp_customize->add_setting(
        'carousel_number',
        array(
            'default'           => '6',
            'sanitize_callback' => 'wabc_sanitize_int',
        )
    );
    $wp_customize->add_control(
        'carousel_number',
        array(
            'label'     => __('Enter the number of posts you want to show', 'wabc'),
            'section'   => 'wabc_carousel',
            'type'      => 'text',
            'priority'  => 12
        )
    );
    ////////


    $wp_customize->add_setting(
        'site_favicon',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon', 'wabc' ),
               'type'           => 'image',
               'section'        => 'wabc_carousel',
               'settings'       => 'site_favicon',
               'priority' => 10,
            )
        )
    );



    // End of carouse/
}
add_action('customize_register', 'wabc_theme_customize_register');
/**
* Sanitize
*/
//Text
function wabc_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//Checkboxes
function wabc_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
// Logo style
function wabc_sanitize_logo_style( $input ) {
    $valid = array(
                'hide-title'  => __( 'Only logo', 'wabc' ),
                'show-title'  => __( 'Logo plus site title&amp;description', 'wabc' ),
            );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Footer widget areas
function wabc_sanitize_fwidgets( $input ) {
    $valid = array(
        '1'     => __('One', 'wabc'),
        '2'     => __('Two', 'wabc'),
        '3'     => __('Three', 'wabc'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Integers
function wabc_sanitize_int( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}





/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wabc_customize_preview_js()
{
  wp_enqueue_script('wabc_customizer', get_template_directory_uri().'/js/customizer.js', array('customize-preview'), '20130508', true);
}
add_action('customize_preview_init', 'wabc_customize_preview_js');
