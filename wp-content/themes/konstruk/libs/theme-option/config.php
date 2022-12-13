<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "konstruk_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'konstruk/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        'page_priority'        => 8,
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Konstruk Options', 'konstruk' ),
        'page_title'           => esc_html__( 'Konstruk Options', 'konstruk' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'forced_dev_mode_off' => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        'compiler' => true,

        // OPTIONAL -> Give you extra features
        'page_priority'        => 20,        
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        'force_output' => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( 'konstruk Theme', 'konstruk' ), $v );
    } else {
        $args['intro_text'] = esc_html__( 'konstruk Theme', 'konstruk' );
    }

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTSkonstruk
      
     */     
   // -> START General Settings
   Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General Sections', 'konstruk' ),
        'id'               => 'basic-checkbox',
        'customizer_width' => '450px',
        'fields'           => array(
        	array(
        	    'id'       => 'enable_global',
        	    'type'     => 'switch', 
        	    'title'    => esc_html__('Enable Global Settings', 'konstruk'),
        	    'subtitle' => esc_html__('If you enable global settings all option will be work only theme option', 'konstruk'),
        	    'default'  => false,
        	),
            array(
                'id'       => 'container_size',
                'title'    => esc_html__( 'Container Size', 'konstruk' ),
                'subtitle' => esc_html__( 'Container Size example(1440px)', 'konstruk' ),
                'type'     => 'text',
                'default'  => '1200px'                
            ),
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Default Logo', 'konstruk' ),
                'subtitle' => esc_html__( 'Upload your logo', 'konstruk' ),
                'url'=> true                
            ),

            array(
                'id'       => 'logo_light',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Your Light', 'konstruk' ),
                'subtitle' => esc_html__( 'Upload your light logo', 'konstruk' ),
                'url'=> true                
            ),
            array(
                    'id'       => 'logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'konstruk' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'konstruk' ),
                    'type'     => 'text',
                    'default'  => '30px'                    
            ), 


            array(
                'id'       => 'logo-mobile',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Mobile Logo', 'konstruk' ),
                'subtitle' => esc_html__( 'Upload your mobile logo', 'konstruk' ),
                'url'=> true                
            ),

            array(
                    'id'       => 'logo-height-mobile',                               
                    'title'    => esc_html__( 'Mobile Logo Height', 'konstruk' ),
                    'subtitle' => esc_html__( 'Mobile Logo max height example(50px)', 'konstruk' ),
                    'type'     => 'text',
                    'default'  => '25px'                    
            ),

            array(
                'id'       => 'rswplogo_sticky',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Your Sticky Logo', 'konstruk' ),
                'subtitle' => esc_html__( 'Upload your sticky logo', 'konstruk' ),
                'url'=> true                
            ),

            array(
                'id'       => 'sticky_logo_height',                               
                'title'    => esc_html__( 'Sticky Logo Height', 'konstruk' ),
                'subtitle' => esc_html__( 'Sticky Logo max height example(20px)', 'konstruk' ),
                'type'     => 'text',
                'default'  => '30px'
                    
            ),            
            array(
            'id'       => 'rs_favicon',
            'type'     => 'media',
            'title'    => esc_html__( 'Upload Favicon', 'konstruk' ),
            'subtitle' => esc_html__( 'Upload your faviocn here', 'konstruk' ),
            'url'=> true            
            ),

            array(
                'id'       => 'footer_icon_animation', 
                'url'      => true,     
                'title'    => esc_html__( 'Animation Icon', 'konstruk' ),                 
                'type'     => 'media',                                  
            ),
            
            array(
                'id'       => 'off_sticky',
                'type'     => 'switch', 
                'title'    => esc_html__('Sticky Menu', 'konstruk'),
                'subtitle' => esc_html__('You can show or hide sticky menu here', 'konstruk'),
                'default'  => false,
            ),
               
             array(
                'id'       => 'off_search',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Search', 'konstruk'),
                'subtitle' => esc_html__('You can show or hide search icon at menu area', 'konstruk'),
                'default'  => false,
            ),
            
            array(
                'id'       => 'off_canvas',
                'type'     => 'switch', 
                'title'    => esc_html__('Show off Canvas', 'konstruk'),
                'subtitle' => esc_html__('You can show or hide off canvas here', 'konstruk'),
                'default'  => false,
            ),  
     
            array(
                'id'       => 'show_top_bottom',
                'type'     => 'switch', 
                'title'    => esc_html__('Go to Top', 'konstruk'),
                'subtitle' => esc_html__('You can show or hide here', 'konstruk'),
                'default'  => false,
            ), 
           
        )
    ) );
    
    
    // -> START Header Section
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'konstruk' ),
        'id'               => 'header',
        'customizer_width' => '450px',
        'icon' => 'el el-certificate',       
         
        'fields'           => array(
        array(
            'id'     => 'notice_critical',
            'type'   => 'info',
            'notice' => true,
            'style'  => 'success',
            'title'  => esc_html__('Header Top Area', 'konstruk')            
        ),
        
        array(
                'id'       => 'show-top',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Top Bar', 'konstruk'),
                'subtitle' => esc_html__('You can select top bar show or hide', 'konstruk'),
                'default'  => false,
        ),   
       
      
        array(
                'id'       => 'show-social',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Social Icons at Header', 'konstruk'),
                'subtitle' => esc_html__('You can select Social Icons show or hide', 'konstruk'),
                'default'  => true,
            ),  
                    
          array(
            'id'     => 'notice_critical2',
            'type'   => 'info',
            'notice' => true,
            'style'  => 'success',
            'title'  => esc_html__('Header Area', 'konstruk')            
        ),

        array(
                'id'               => 'header-grid',
                'type'             => 'select',
                'title'            => esc_html__('Header Area Width', 'konstruk'),                  
               
                //Must provide key => value pairs for select options
                'options'          => array(                                     
                
                    'container' => esc_html__('Container', 'konstruk'),
                    'full'      => esc_html__('Container Fluid', 'konstruk'),
                ),

                'default'          => 'container',            
        ),

        array(
            'id'       => 'gap_header',                               
            'title'    => esc_html__( 'Top Bottom Header Gap', 'konstruk' ),                  
            'type'     => 'text',
            'subtitle' => esc_html__('You can add gap here ex(10px)', 'konstruk'),          
                
        ),  
        array(
            'id'       => 'header_separator',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Header Bottom Seperator', 'konstruk'),
            'subtitle' => esc_html__('You can show or hide header bottom seperator', 'konstruk'),
            'default'  => false,
        ),

        array(
            'id'       => 'border_width_header',                               
            'title'    => esc_html__( 'Border Width', 'konstruk' ),                  
            'type'     => 'text',
            'subtitle' => esc_html__('You can border width ex(2px)', 'konstruk'),
            'required' => array(
                array(
                    'header_separator',
                    'equals',
                    1,
                ),
            ), 
                
        ),  

        array(
            'id'       => 'border_header_color',                               
            'title'    => esc_html__( 'Border Color', 'konstruk' ),                  
            'type'     => 'color_rgba',
            'subtitle' => esc_html__( 'Pick Border Color', 'konstruk' ),  
            'required' => array(
                array(
                    'header_separator',
                    'equals',
                    1,
                ),
            ),
            'output' => array(                 
                'border-color' => '.show-header-border #rs-header .menu-sticky .menu-area'
            )                
        ), 

        array(
            'id'       => 'tool_dark_color',          
            'title'    => esc_html__( 'Toolbar Dark Color', 'konstruk' ),
            'subtitle' => esc_html__( 'Pick color', 'konstruk' ),      
            'default'  => array(
                'color'     => '#0a0a0a',                   
            ),
            'output' => array(                 
                'color'  => '#rs-header.header-style8 .rs-address-area .info-title, #rs-header.header-style8 .rs-address-area .info-des, #rs-header.header-style8 .rs-address-area .info-des a'
            )           
        ),

        array(
                'id'       => 'phone_line',                               
                'title'    => esc_html__( ' Phone Number Pre Text', 'konstruk' ),
                'subtitle' => esc_html__( 'Enter Phone Text', 'konstruk' ),
                'type'     => 'text',     
        ),

        array(
                'id'       => 'phone',                               
                'title'    => esc_html__( ' Phone Number', 'konstruk' ),
                'subtitle' => esc_html__( 'Enter Phone Number', 'konstruk' ),
                'type'     => 'text',     
        ),

        array(
            'id'       => 'email__text',                               
            'title'    => esc_html__( 'Email Pre Text', 'konstruk' ),
            'subtitle' => esc_html__( 'Enter Email Text', 'konstruk' ),
            'type'     => 'text',     
        ),

               
        array(
            'id'       => 'top-email',                               
            'title'    => esc_html__( 'Email Address', 'konstruk' ),
            'subtitle' => esc_html__( 'Enter Email Address', 'konstruk' ),
            'type'     => 'text',
            'validate' => 'email',
            'msg'      => esc_html__('Email Address Not Valid', 'konstruk')  
        ),  

        array(
           'id'       => 'address__text',                               
           'title'    => esc_html__( ' Address Pre Text', 'konstruk' ),
           'subtitle' => esc_html__( 'Address Email Text', 'konstruk' ),
           'type'     => 'text',     
        ),

        array(
            'id'       => 'top_address',                               
            'title'    => esc_html__( 'Address Address', 'konstruk' ),
            'subtitle' => esc_html__( 'Enter Address Text', 'konstruk' ),
            'type'     => 'text', 
        ),         

        array(
            'id'       => 'open_text',                               
            'title'    => esc_html__( 'Opening Pre Text', 'konstruk' ),
            'subtitle' => esc_html__( 'Opening Hours', 'konstruk' ),
            'type'     => 'text',
            
        ),         

        array(
            'id'       => 'open_hours',                               
            'title'    => esc_html__( 'Opening Hours', 'konstruk' ),
            'subtitle' => esc_html__( 'Enter Opening Hours', 'konstruk' ),
            'type'     => 'text',
            
        ),  

        array(
            'id'       => 'quote_btns',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Quote Button', 'konstruk'),
            'subtitle' => esc_html__('You can show or hide Quote Button', 'konstruk'),
            'default'  => false,
        ),
            
        array(
                'id'       => 'quote',                               
                'title'    => esc_html__( 'Quote Button Text', 'konstruk' ),                  
                'type'     => 'text',
                
        ),  
        
        array(
                'id'       => 'quote_link',                               
                'title'    => esc_html__( 'Quote Button Link', 'konstruk' ),
                'subtitle' => esc_html__( 'Enter Quote Button Link Here', 'konstruk' ),
                'type'     => 'text',
                
            ),      
        )
    ) 

);  
   

Redux::setSection( $opt_name, array(
'title'            => esc_html__( 'Header Layout', 'konstruk' ),
'id'               => 'header-style',
'customizer_width' => '450px',
'subsection' =>true,      
'fields'    => array( 
                    
    array(
        'id'       => 'header_layout',
        'type'     => 'image_select',
        'title'    => esc_html__('Header Layout', 'konstruk'), 
        'subtitle' => esc_html__('Select header layout. Choose between 1 to 5 layout.', 'konstruk'),
        'options'  => array(
            'style1'   => array(
                'alt'      => 'Header Style 1', 
                'img'      => get_template_directory_uri().'/libs/img/style_1.png'
            ),                        
            'style5' => array(
                'alt'    => 'Header Style 2', 
                'img'    => get_template_directory_uri().'/libs/img/style_2.png'
            ),
            'style3' => array(
                'alt'    => 'Header Style 3', 
                'img'    => get_template_directory_uri().'/libs/img/style_3.png'
            ), 
            'style8' => array(
                'alt'    => 'Header Style 4', 
                'img'    => get_template_directory_uri().'/libs/img/style_5.png'
            ), 
            'style9' => array(
                'alt'    => 'Header Style 5', 
                'img'    => get_template_directory_uri().'/libs/img/style_4.png'
            ),
            'style4' => array(
                'alt'    => 'Header Style 6', 
                'img'    => get_template_directory_uri().'/libs/img/style_6.png'
            ), 
            'style7' => array(
                'alt'    => 'Header Style 7', 
                'img'    => get_template_directory_uri().'/libs/img/style_7.png'
            ), 
            'style10' => array(
                'alt'    => 'Header Style 8', 
                'img'    => get_template_directory_uri().'/libs/img/style_8.png'
            ),
        ),
        'default' => 'style1'
            ),      
        )
    ) 
);

                                   
//Topbar settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Toolbar area', 'konstruk' ),
        'desc'   => esc_html__( 'Toolbar area Style Here', 'konstruk' ),        
        'subsection' =>true,  
        'fields' => array( 
                        
                array(
                    'id'        => 'toolbar_bg_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar background Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '#010D14',                        
                    'validate'  => 'color',                        
                ),
                array(
                    'id'        => 'toolbar_bg_skew_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Skew background Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),    

                array(
                    'id'        => 'toolbar_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Text Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '#ffffff',                        
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'toolbar_icon_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Icon Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'       => 'tool_dark_color',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Toolbar Dark Color', 'konstruk' ),
                    'subtitle' => esc_html__( 'Pick color', 'konstruk' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'color'            => '#rs-header.header-style8 .rs-address-area .info-title, #rs-header.header-style8 .rs-address-area .info-des, #rs-header.header-style8 .rs-address-area .info-des a'
                    )           
                ),

                array(
                    'id'       => 'tool_dark_hover_color',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Toolbar Dark Hover Color', 'konstruk' ),
                    'subtitle' => esc_html__( 'Pick color', 'konstruk' ),      
                    'default'  => array(
                        'color'     => '#ffb703',                   
                    ),
                    'output' => array(                 
                        'color'            => '#rs-header.header-style8 .rs-address-area .info-des a:hover'
                    )           
                ),

                array(
                    'id'        => 'transparent_toolbar_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Transparent Toolbar Text Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '#ffffff',                        
                    'validate'  => 'color',                        
                ),  

                array(
                    'id'       => 'tool_border',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Toolbar Border Color', 'konstruk' ),
                    'subtitle' => esc_html__( 'Pick color', 'konstruk' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'border-color'            => '#rs-header .toolbar-area .toolbar-contact ul li a, #rs-header .toolbar-area .opening em'
                    )           
                ),


                array(
                    'id'       => 'tool_border2_color',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Toolbar Border Color (Transparent)', 'konstruk' ),
                    'subtitle' => esc_html__( 'Pick color', 'konstruk' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'border-color'            => '#rs-header.header-style5 .toolbar-area, #rs-header.header-style5 .toolbar-area .toolbar-contact ul li, #rs-header.header-style5 .toolbar-area .opening'
                    )           
                ),

                array(
                    'id'        => 'toolbar_link_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '#ffffff',                        
                    'validate'  => 'color',                        
                ), 

               

                array(
                    'id'        => 'toolbar_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Hover Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '#ffb703',                        
                    'validate'  => 'color',                        
                ),  

                 array(
                    'id'        => 'transparent_toolbar_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Transparent Toolbar Link Hover Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '#ffb703',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'toolbar_text_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Toolbar Font Size','konstruk'),
                    'subtitle'  => esc_html__('Font Size', 'konstruk'),    
                    'default'   => '15px',                                            
                ), 

                array(
                   'id'       => 'welcome-text',                               
                   'title'    => esc_html__( 'Toolbar Welcome Text', 'konstruk' ),
                   'subtitle' => esc_html__( 'Welcome text here', 'konstruk' ),
                   'type'     => 'text',     
                ),
                
        )
    )
); 



//Preloader settings
    Redux::setSection( $opt_name, array(
      'title'  => esc_html__( 'Preloader Style', 'konstruk' ),
      'desc'   => esc_html__( 'Preloader Style Here', 'konstruk' ),               
      'fields' => array( 
              array(
                  'id'       => 'show_preloader',
                  'type'     => 'switch', 
                  'title'    => esc_html__('Show Preloader', 'konstruk'),
                  'subtitle' => esc_html__('You can show or hide preloader', 'konstruk'),
                  'default'  => false,
              ), 

              array(
                  'id'        => 'preloader_bg_color',
                  'type'      => 'color',                       
                  'title'     => esc_html__('Preloader Background Color','konstruk'),
                  'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                  'default'   => '#ffffff',                        
                  'validate'  => 'color',                        
              ), 
              
              array(
                  'id'        => 'preloader_text_color',
                  'type'      => 'color',                       
                  'title'     => esc_html__('Preloader Border Color','konstruk'),
                  'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                  'default'   => '#ffb703',                        
                  'validate'  => 'color',                        
              ),  

              array(
                  'id'        => 'preloader_animate_color',
                  'type'      => 'color',                       
                  'title'     => esc_html__('Preloader Animate Circle Color','konstruk'),
                  'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                  'default'   => '',                        
                  'validate'  => 'color',                        
              ), 

              array(
                  'id'    => 'preloader_img', 
                  'url'   => true,     
                  'title' => esc_html__( 'Preloader Image', 'konstruk' ),                 
                  'type'  => 'media',                                  
              ),       
        )
    )
); 


//End Preloader settings  
    // -> START Style Section
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Style', 'konstruk' ),
        'id'               => 'stle',
        'customizer_width' => '450px',
        'icon' => 'el el-brush',
        ));
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Global Style', 'konstruk' ),
        'desc'   => esc_html__( 'Style your theme', 'konstruk' ),        
        'subsection' =>true,  
        'fields' => array( 
                        
                        array(
                            'id'        => 'body_bg_color',
                            'type'      => 'color',                           
                            'title'     => esc_html__('Body Backgroud Color','konstruk'),
                            'subtitle'  => esc_html__('Pick body background color', 'konstruk'),
                            'default'   => '#ffffff',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'body_text_color',
                            'type'      => 'color',            
                            'title'     => esc_html__('Text Color','konstruk'),
                            'subtitle'  => esc_html__('Pick text color', 'konstruk'),
                            'default'   => '#333333',
                            'validate'  => 'color',                        
                        ),     
        
                        array(
                            'id'        => 'primary_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Primary Color','konstruk'),
                            'subtitle'  => esc_html__('Select Primary Color.', 'konstruk'),
                            'default'   => '#010D14',
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'secondary_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Secondary Color','konstruk'),
                            'subtitle'  => esc_html__('Select Secondary Color.', 'konstruk'),
                            'default'   => '#ffb703',
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'third_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Third Color','konstruk'),
                            'subtitle'  => esc_html__('Select Third Color.', 'konstruk'),
                            'default'   => '#ffb703',
                            'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'link_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Link Color','konstruk'),
                            'subtitle'  => esc_html__('Pick Link color', 'konstruk'),
                            'default'   => '#ffb703',
                            'validate'  => 'color',                        
                        ),
                        
                        array(
                            'id'        => 'link_hover_text_color',
                            'type'      => 'color',                 
                            'title'     => esc_html__('Link Hover Color','konstruk'),
                            'subtitle'  => esc_html__('Pick link hover color', 'konstruk'),
                            'default'   => '#ffb703',
                            'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'gradient_first_color',
                            'type'      => 'color',                 
                            'title'     => esc_html__('First Gradient Color','konstruk'),
                            'subtitle'  => esc_html__('Pick Gradient color', 'konstruk'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),  
                        array(
                            'id'        => 'gradient_snd_color',
                            'type'      => 'color',                 
                            'title'     => esc_html__('Second Gradient Color','konstruk'),
                            'subtitle'  => esc_html__('Pick Gradient color', 'konstruk'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),    
                       
                 ) 
            ) 
    ); 

       
    
    //Menu settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Main Menu', 'konstruk' ),
        'desc'   => esc_html__( 'Main Menu Style Here', 'konstruk' ),        
        'subsection' =>true,  
        'fields' => array( 

                        array(
                            'id'     => 'notice_critical_menu',
                            'type'   => 'info',
                            'notice' => true,
                            'style'  => 'success',
                            'title'  => esc_html__('Main Menu Settings', 'konstruk'),                                           
                        ),

                        array(
                            'id'       => 'main_menu_center',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Main Menu Center', 'konstruk' ),
                            'on'       => esc_html__( 'Enabled', 'konstruk' ),
                            'off'      => esc_html__( 'Disabled', 'konstruk' ),
                            'default'  => false,
                        ),

                        array(
                            'id'       => 'main_menu_icon',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Main Menu Icon Hide', 'konstruk' ),
                            'on'       => esc_html__( 'Enabled', 'konstruk' ),
                            'off'      => esc_html__( 'Disabled', 'konstruk' ),
                            'default'  => false,
                        ),

                        array(
                            'id'        => 'menu_area_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Background Color','konstruk'),
                            'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Color','konstruk'),
                            'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                            'default'   => '#3B4052',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'transparent_menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Trasparent Menu Text Color','konstruk'),
                            'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                            'default'   => '#ffffff',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'transparent_menu_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Trasparent Menu Hover Color','konstruk'),
                            'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                            'default'   => '#ffb703',                        
                            'validate'  => 'color',                        
                        ),  

                        array(
                            'id'        => 'transparent_menu_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Trasparent Menu Active Color','konstruk'),
                            'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                            'default'   => '#ffb703',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'menu_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Hover Color','konstruk'),
                            'subtitle'  => esc_html__('Pick color', 'konstruk'),           
                            'default'   => '#ffb703',                 
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'menu_text_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Active Color','konstruk'),
                            'subtitle'  => esc_html__('Pick color', 'konstruk'),
                            'default'   => '#ffb703',
                            'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'menu_item_gap',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Left Right Gap','konstruk'),   
                            'default'   => '',                             
                        ), 
                        array(
                            'id'        => 'menu_item_gap2',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Top Gap','konstruk'),   
                            'default'   => '42px',                             
                        ),                        

                        array(
                            'id'        => 'menu_item_gap3',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Bottom Gap','konstruk'),   
                            'default'   => '42px',                             
                        ),

                        array(
                            'id'       => 'menu_text_trasform',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Menu Text Uppercase', 'konstruk' ),
                            'on'       => esc_html__( 'Enabled', 'konstruk' ),
                            'off'      => esc_html__( 'Disabled', 'konstruk' ),
                            'default'  => false,
                        ),

                        array(
                            'id'     => 'notice_critical_dropmenu',
                            'type'   => 'info',
                            'notice' => true,
                            'style'  => 'success',
                            'title'  => esc_html__('Dropdown Menu Settings', 'konstruk'),                                           
                        ),
                                               
                        array(
                            'id'        => 'drop_down_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Background Color','konstruk'),
                            'subtitle'  => esc_html__('Pick bg color', 'konstruk'),
                            'default'   => '#ffffff',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'drop_text_color',
                            'type'      => 'color',
                            'title'     => esc_html__('Dropdown Menu Text Color','konstruk'),
                            'subtitle'  => esc_html__('Pick text color', 'konstruk'),
                            'default'   => '#101010',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'drop_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Hover Text Color','konstruk'),
                            'subtitle'  => esc_html__('Pick text color', 'konstruk'),
                            'default'   => '#ffb703',
                            'validate'  => 'color',                        
                        ),  

                         array(
                            'id'        => 'drop_text_hover_color-bg',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Hover BG Color','konstruk'),
                            'subtitle'  => esc_html__('Pick text color', 'konstruk'),
                            'default'   => '',
                            'validate'  => 'color',  
                            'output' => array(                 
                                'background'  => '.menu-area .navbar ul li .sub-menu li a:hover'
                            )                       
                        ),                               
                     

                        array(
                            'id'       => 'menu_text_trasform2',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Dropdown Menu Text Uppercase', 'konstruk' ),
                            'on'       => esc_html__( 'Enabled', 'konstruk' ),
                            'off'      => esc_html__( 'Disabled', 'konstruk' ),
                            'default'  => false,
                        ),

                        array(
                             'id'        => 'dropdown_menu_item_gap',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Item Left Right Gap','konstruk'),   
                             'default'   => '20px',                             
                         ), 

                        array(
                             'id'        => 'dropdown_menu_item_separate',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Item Middle Gap','konstruk'),   
                             'default'   => '10px',                             
                         ), 
                         array(
                             'id'        => 'dropdown_menu_item_gap2',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Boxes Top Bottom Gap','konstruk'),   
                             'default'   => '21px',                             
                         ),
                         array(
                             'id'     => 'notice_critical3',
                             'type'   => 'info',
                             'notice' => true,
                             'style'  => 'success',
                             'title'  => esc_html__('Mega Menu Settings', 'konstruk'),                                           
                         ),

                          array(
                            'id'        => 'meaga_menu_item_gap',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Item Left Right Gap','konstruk'),   
                            'default'   => '40px',                             
                        ), 

                         array(
                            'id'        => 'mega_menu_item_separate',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Item Middle Gap','konstruk'),   
                            'default'   => '10px',                             
                        ),  
                        array(
                            'id'        => 'mega_menu_item_gap2',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Boxes Top Bottom Gap','konstruk'),   
                            'default'   => '21px',                             
                        ),                       
                        
                        
                )
            )
        ); 

     //Sticky Menu settings
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sticky Menu', 'konstruk' ),
        'desc'       => esc_html__( 'Sticky Menu Style Here', 'konstruk' ),        
        'subsection' =>true,  
        'fields' => array(                       

                        array(
                            'id'        => 'stiky_menu_area_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Sticky Menu Area Background Color','konstruk'),
                            'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                            'default'   => '#ffffff',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'stikcy_menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Menu Text Color','konstruk'),
                            'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                            'default'   => '#333333',                        
                            'validate'  => 'color',                        
                        ), 
                       

                        array(
                            'id'        => 'sticky_menu_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Menu Text Hover Color','konstruk'),
                            'subtitle'  => esc_html__('Pick color', 'konstruk'),           
                            'default'   => '#ffb703',                 
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'stikcy_menu_text_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Active Color','konstruk'),
                            'subtitle'  => esc_html__('Pick color', 'konstruk'),
                            'default'   => '#ffb703',
                            'validate'  => 'color',                        
                        ),
                                               
                        array(
                            'id'        => 'sticky_drop_down_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Background Color','konstruk'),
                            'subtitle'  => esc_html__('Pick bg color', 'konstruk'),
                            'default'   => '#ffffff',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'stikcy_drop_text_color',
                            'type'      => 'color',                     
                            'title'     => esc_html__('Dropdown Menu Text Color','konstruk'),
                            'subtitle'  => esc_html__('Pick text color', 'konstruk'),
                            'default'   => '#101010',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'sticky_drop_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Hover Text Color','konstruk'),
                            'subtitle'  => esc_html__('Pick text color', 'konstruk'),
                            'default'   => '#ffb703',
                            'validate'  => 'color',                        
                        ),                        
                )
            )
        ); 

    //Breadcrumb settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Breadcrumb Style', 'konstruk' ),      
        'subsection' =>true,  
        'fields' => array(
                    array(
                        'id'       => 'off_breadcrumb',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show off Breadcrumb', 'konstruk'),
                        'subtitle' => esc_html__('You can show or hide off breadcrumb here', 'konstruk'),
                        'default'  => false,
                    ),

                    array(
                        'id'        => 'breadcrumb_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Background Color','konstruk'),
                        'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                        'default'   => '#000d13',                        
                        'validate'  => 'color',                        
                    ),                     

                     array(
                        'id'       => 'page_banner_main',
                        'type'     => 'media',
                        'title'    => esc_html__( 'Background Banner', 'konstruk' ),
                        'subtitle' => esc_html__( 'Upload your banner', 'konstruk' ),                  
                    ), 
                    
                    array(
                        'id'        => 'breadcrumb_text_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Text Color','konstruk'),
                        'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                        'default'   => '#ffffff',                        
                        'validate'  => 'color',                        
                    ),

                    array(
                        'id'        => 'breadcrumb_seperator_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Breadcrumb Seperator Color','konstruk'),
                        'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                        'default'   => '#ffffff',                        
                        'validate'  => 'color',                        
                    ),  
                    
                    array(
                        'id'        => 'breadcrumb_top_gap',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Top Gap','konstruk'),                          
                        'default'   => '160px',                      
                    ), 
                    
                    array(
                        'id'        => 'breadcrumb_bottom_gap',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Bottom Gap','konstruk'),                          
                        'default'   => '160px',                   
                    ),

                    array(
                        'id'        => 'breadcrumb_top_gap_mobile',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Mobile Top Gap','konstruk'),                          
                        'default'   => '120px',                      
                    ), 
                    array(
                        'id'        => 'breadcrumb_bottom_gap_mobile',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Mobile Bottom Gap','konstruk'),                          
                        'default'   => '120px',                   
                    ), 

                    array(
                        'id'               => 'text_alignment',
                        'type'             => 'select',
                        'title'            => esc_html__('Meta Text Alignment', 'konstruk'), 
                        'options'          => array(  
                            'text-left'    => esc_html__('Left', 'konstruk'),
                            'text-center'  => esc_html__('Center', 'konstruk'),
                            'text-right'   => esc_html__('Right', 'konstruk')
                        ),
                        'default'          => 'text-left',            
                    ),   
                      
                    array(
                        'id'        => 'breadcrumb_max_width',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Max Width','konstruk'),                          
                        'default'   => '1200px',                   
                    ),   
                )
            )
        );

    //Button settings
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Button Style', 'konstruk' ),
        'desc'       => esc_html__( 'Button Style Here', 'konstruk' ),        
        'subsection' =>true,  
        'fields' => array( 

                    array(
                        'id'        => 'btn_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Background Color','konstruk'),
                        'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                        'default'   => '',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'btn_bg_border',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Border Color','konstruk'),
                        'subtitle'  => esc_html__('Pick color', 'konstruk'),                       
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'btn_icon_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Icon Background Color','konstruk'),
                        'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                        'default'   => '#ffb703',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'btn_bg_hover',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Hover Background','konstruk'),
                        'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                        'default'   => '#010D14',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'btn_bg_hover_border',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Hover Border Color','konstruk'),
                        'subtitle'  => esc_html__('Pick color', 'konstruk'),                      
                        'validate'  => 'color',                        
                    ), 
                    array(
                        'id'        => 'btn_text_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Text Color','konstruk'),
                        'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                        'default'   => '#010D14',                        
                        'validate'  => 'color',                        
                    ), 
                    array(
                        'id'        => 'btn_txt_hover_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Hover Text Color','konstruk'),
                        'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                        'default'   => '#ffffff',                        
                        'validate'  => 'color',                        
                    ), 
                    array(
                        'id'        => 'btn_border_radius',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Button Border Radius','konstruk'),
                        'subtitle'  => esc_html__('Border Radius example(5px)', 'konstruk'),                                             
                    ),  
                )
            )
        );
    
    //offcanvas  settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Offcanvas Style', 'konstruk' ),
        'desc'   => esc_html__( 'Offcanvas Style Here', 'konstruk' ),        
        'subsection' =>true,  
        'fields' => array( 
                array(
                    'id'       => 'offcanvas_logo',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Offcanvas Logo', 'konstruk' ),
                    'subtitle' => esc_html__( 'Upload your logo', 'konstruk' ),                  
                ),
                
                array(
                    'id'       => 'offcanvas_logo_height',                               
                    'title'    => esc_html__( 'Logo Height', 'konstruk' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'konstruk' ),
                    'type'     => 'text',
                    'default'  => '45px'                    
                ),

                array(
                    'id'        => 'offcan_bg_overlay_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Background Color (Overlay)','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '',                        
                    'validate'  => 'color', 
                    'output' => array('background' => '.offwrap'),                         
                ),

                array(
                    'id'        => 'offcan_bgs_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Background Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '#ffffff',                        
                    'validate'  => 'color',                        
                ),   

                array(
                    'id'        => 'offcan_link_social_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Social Icon Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '#0a0a0a',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'offcan__social_border_color',
                    'type'      => 'color_rgba',                       
                    'title'     => esc_html__('Social Icon Border Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '',                        
                    'validate'  => 'color', 
                    'output' => array('border-color' => '.sidenav .offcanvas_social li a i'),                       
                ),

                array(
                    'id'        => 'offcan__social_bg_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Social Icon Bg Color (Hover)','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '',                        
                    'validate'  => 'color',  
                    'output' => array(
                        'background' => '.sidenav .offcanvas_social li a i:hover',
                        'border-color' => '.sidenav .offcanvas_social li a i:hover',
                    ),                                          
                ),

                array(
                    'id'        => 'offcan_txt_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Text Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '#0a0a0a',                        
                    'validate'  => 'color',                        
                ),
                 
                array(
                    'id'        => 'offcan_link_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Link Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '#0a0a0a',                        
                    'validate'  => 'color',                        
                ),  

                array(
                    'id'        => 'offcan_link_hovers_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Link hover Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '#ffb703',                        
                    'validate'  => 'color',                        
                ),  

                array(
                    'id'        => 'offcan_link_icon_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Icon Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '',                        
                    'validate'  => 'color', 
                    'output' => array('color' => '.mobile-topnars .rs-address-area .rs-address-list i:before'),                        
                ),
          
                array(
                    'id'        => 'offcanvas_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Hamburger Dots Primary Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '#0a0a0a',                        
                    'validate'  => 'color',                        
                ), 
          
                array(
                    'id'        => 'offcanvas_dots_secondary_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Hamburger Dots Secondary Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'offcanvas_dots_close_secondary_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Hamburger Close Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),
            )
        )
    );
    

    //-> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'konstruk' ),
        'id'     => 'typography',
        'desc'   => esc_html__( 'You can specify your body and heading font here','konstruk'),
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'konstruk' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'konstruk' ),
                'google'   => true, 
                'font-style' =>false,           
                'default'  => array(                    
                    'font-size'   => '15px',
                    'font-family' => 'Roboto',
                    'font-weight' => '400',
                ),
            ),
            array(
                'id'       => 'opt-typography-menu',
                'type'     => 'typography',
                'title'    => esc_html__( 'Navigation Font', 'konstruk' ),
                'subtitle' => esc_html__( 'Specify the menu font properties.', 'konstruk' ),
                'google'   => true,
                'font-backup' => true,                
                'all_styles'  => true,              
                'default'  => array(
                    'color'       => '#333333',                    
                    'font-family' => 'Roboto',
                    'google'      => true,
                    'font-size'   => '16px',                    
                    'font-weight' => '500',                    
                ),
            ),
            array(
                'id'          => 'opt-typography-h1',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H1', 'konstruk' ),
                'font-backup' => true,                
                'all_styles'  => true,
                'units'       => 'px',
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'konstruk' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => '700',
                    'font-family' => 'Playfair Display',
                    'google'      => true,
                    'font-size'   => '48px',
                    'line-height' => '58px'
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h2',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H2', 'konstruk' ),
                'font-backup' => true,                
                'all_styles'  => true,                 
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'konstruk' ),
                'default'     => array(
                    'color'       => '#010d14',
                    'font-style'  => '700',
                    'font-family' => 'Playfair Display',
                    'google'      => true,
                    'font-size'   => '36px',
                    'line-height' => '46px'
                    
                ),
                ),
            array(
                'id'          => 'opt-typography-h3',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H3', 'konstruk' ),             
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'konstruk' ),
                'default'     => array(
                    'color'       => '#010d14',
                    'font-style'  => '700',
                    'font-family' => 'Playfair Display',
                    'google'      => true,
                    'font-size'   => '28px',
                    'line-height' => '38px'
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h4',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H4', 'konstruk' ),                
                'font-backup' => false,                
                'all_styles'  => true,               
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'konstruk' ),
                'default'     => array(
                    'color'       => '#010d14',
                    'font-style'  => '700',
                    'font-family' => 'Playfair Display',
                    'google'      => true,
                    'font-size'   => '20px',
                    'line-height' => '30px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-h5',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H5', 'konstruk' ),                
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'konstruk' ),
                'default'     => array(
                    'color'       => '#010d14',
                    'font-style'  => '700',
                    'font-family' => 'Playfair Display',
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '28px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-6',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H6', 'konstruk' ),
             
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'konstruk' ),
                'default'     => array(
                    'color'       => '#010d14',
                    'font-style'  => '700',
                    'font-family' => 'Playfair Display',
                    'google'      => true,
                    'font-size'   => '16px',
                    'line-height' => '26px'
                ),
            ),
                
        )
    )                    
   
);

    /*Blog Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog', 'konstruk' ),
        'id'               => 'blog',
        'customizer_width' => '450px',
        'icon' => 'el el-comment',
        )
    );
        
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Settings', 'konstruk' ),
        'id'               => 'blog-settings',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(
        
                array(
                    'id'    => 'blog_banner_main', 
                    'url'   => true,     
                    'title' => esc_html__( 'Blog Page Banner', 'konstruk' ),                 
                    'type'  => 'media',                                  
                ),  

                array(
                    'id'        => 'blog_bg_color',
                    'type'      => 'color',                           
                    'title'     => esc_html__('Body Backgroud Color','konstruk'),
                    'subtitle'  => esc_html__('Pick body background color', 'konstruk'),
                    'default'   => '#ffffff',
                    'validate'  => 'color',                        
                ),
                
                array(
                    'id'       => 'blog_title',                               
                    'title'    => esc_html__( 'Blog Page Custom Title', 'konstruk' ),
                    'subtitle' => esc_html__( 'Enter Blog  Title Here', 'konstruk' ),
                    'type'     => 'text',                                   
                ),

                 array(
                    'id'       => 'blog_desc',                               
                    'title'    => esc_html__( 'Blog  Banner Description', 'konstruk' ),
                    'subtitle' => esc_html__( 'Enter Blog  Description Here', 'konstruk' ),
                    'type'     => 'textarea',                                   
                ),
                
                array(
                    'id'               => 'blog-layout',
                    'type'             => 'image_select',
                    'title'            => esc_html__('Select Blog Layout', 'konstruk'), 
                    'subtitle'         => esc_html__('Select your blog layout', 'konstruk'),
                    'options'          => array(
                    'full'             => array(
                    'alt'              => 'Blog Style 1', 
                    'img'              => get_template_directory_uri().'/libs/img/1c.png'                                      
                ),
                    '2right'           => array(
                    'alt'              => 'Blog Style 2', 
                    'img'              => get_template_directory_uri().'/libs/img/2cr.png'
                ),
                '2left'            => array(
                'alt'              => 'Blog Style 3', 
                'img'              => get_template_directory_uri().'/libs/img/2cl.png'
                ),                                  
                ),
                'default'          => '2right'
                ),                      
                
                array(
                    'id'               => 'blog-grid',
                    'type'             => 'select',
                    'title'            => esc_html__('Select Blog Gird', 'konstruk'),                   
                    'desc'             => esc_html__('Select your blog gird layout', 'konstruk'),
                    'options'          => array(
                        '12'           => esc_html__('1 Column','konstruk'), 
                        '6'            => esc_html__('2 Column', 'konstruk'),     
                        '4'            => esc_html__('3 Column', 'konstruk'),
                        '3'            => esc_html__('4 Column', 'konstruk'),
                    ),
                    'default'       => '12',                                  
                ),  
                

                array(
                   'id'       => 'blogpage-blog-author',
                   'type'     => 'switch', 
                   'title'    => esc_html__('Hide Author', 'konstruk'),
                   'subtitle' => esc_html__('You can show or hide Author', 'konstruk'),
                   'default'  => false,
                ),

                array(
                   'id'       => 'blog-date',
                   'type'     => 'switch', 
                   'title'    => esc_html__('Hide Date', 'konstruk'),
                   'subtitle' => esc_html__('You can show or hide Date', 'konstruk'),
                   'default'  => false,
                ),

                array(
                   'id'       => 'blogpage-category',
                   'type'     => 'switch', 
                   'title'    => esc_html__('Hide Category', 'konstruk'),
                   'subtitle' => esc_html__('You can show or hide Category', 'konstruk'),
                   'default'  => false,
                ),            

                array(
                    'id'               => 'blog_readmore',                               
                    'title'            => esc_html__( 'Blog  ReadMore Text', 'konstruk' ),
                    'subtitle'         => esc_html__( 'Enter Blog  ReadMore Here', 'konstruk' ),
                    'type'             => 'text',                                   
                ),
                
            )
        ) 
                
    );
    
    
    /*Single Post Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Post', 'konstruk' ),
        'id'               => 'spost',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(                            
        
                            array(
                                'id'       => 'blog_banner', 
                                'url'      => true,     
                                'title'    => esc_html__( 'Blog Single page banner', 'konstruk' ),                  
                                'type'     => 'media',
                            ),  
                           
                            array(
                               'id'       => 'blog-author',
                               'type'     => 'switch', 
                               'title'    => esc_html__('Hide Author', 'konstruk'),
                               'subtitle' => esc_html__('You can show or hide Author', 'konstruk'),
                               'default'  => false,
                            ),

                            array(
                               'id'       => 'blog-comments',
                               'type'     => 'switch', 
                               'title'    => esc_html__('Hide Comment', 'konstruk'),
                               'subtitle' => esc_html__('You can show or hide Comment', 'konstruk'),
                               'default'  => false,
                            ),

                            array(
                               'id'       => 'blog-published',
                               'type'     => 'switch', 
                               'title'    => esc_html__('Hide Published', 'konstruk'),
                               'subtitle' => esc_html__('You can show or hide Published', 'konstruk'),
                               'default'  => false,
                            ), 

                            array(
                               'id'       => 'blog-categories',
                               'type'     => 'switch', 
                               'title'    => esc_html__('Hide Categories', 'konstruk'),
                               'subtitle' => esc_html__('You can show or hide Categories', 'konstruk'),
                               'default'  => false,
                            ), 

                            array(
                                'id'               => 'meta_text_alignment',
                                'type'             => 'select',
                                'title'            => esc_html__('Meta Text Alignment', 'konstruk'), 
                                'options'          => array(  
                                    'text-left'    => esc_html__('Left', 'konstruk'),
                                    'text-center'  => esc_html__('Center', 'konstruk'),
                                    'text-right'   => esc_html__('Right', 'konstruk')
                                ),
                                'default'          => 'text-left',            
                            ),    
                        )
                )    
    
    );

  
    /*Team Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Team Section', 'konstruk' ),
        'id'               => 'team',
        'customizer_width' => '450px',
        'icon' => 'el el-user',
        'fields'           => array(

            array(
                'id'       => 'show-team-banner',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Team Page Banner', 'konstruk'),
                'subtitle' => esc_html__('You can select banner show or hide', 'konstruk'),
                'default'  => true,
            ), 
        
            array(
                'id'       => 'team_single_image', 
                'url'      => true,     
                'title'    => esc_html__( 'Team Single page banner image', 'konstruk' ),                    
                'type'     => 'media',
            ),  

            array(
                'id'       => 'show-team-biography-skill',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Team Single Biography & Professional Skills', 'konstruk'),
                'subtitle' => esc_html__('You Can Show Biography & Professional Skills', 'konstruk'),
                'default'  => true,
            ),
            
            array(
                'id'        => 'team_single_bg_color',
                'type'      => 'color',                           
                'title'     => esc_html__('Sinlge Team Body Backgroud Color','konstruk'),
                'subtitle'  => esc_html__('Pick body background color', 'konstruk'),
                'default'   => '#ffffff',
                'validate'  => 'color',                        
            ),
            array(
                'id'       => 'team_slug',                               
                'title'    => esc_html__( 'Team Slug', 'konstruk' ),
                'subtitle' => esc_html__( 'Enter Team Slug Here', 'konstruk' ),
                'type'     => 'text',
                'default'  => esc_html__('teams', 'konstruk'), 
            ), 
            array(
                'id'       => 'team_sigle_txt',                               
                'title'    => esc_html__( 'Team Single Banner Ttile', 'konstruk' ),                  
                'type'     => 'text',      
            ), 
            array(
                'id'       => 'team_sigle_txt_desc',                               
                'title'    => esc_html__( 'Team Single Banner Text', 'konstruk' ),                  
                'type'     => 'textarea',      
            ), 
            array(
                'id'       => 'team_sigle_title',                               
                'title'    => esc_html__( 'Biography', 'konstruk' ),                  
                'type'     => 'text',  
                'default'  => esc_html__('Biography', 'konstruk'),     
            ),    
            array(
                'id'       => 'team_sigle_skallbar',                               
                'title'    => esc_html__( 'Professional Skills', 'konstruk' ),                  
                'type'     => 'text', 
                'default'  => esc_html__('Professional Skills', 'konstruk'),      
            ),              
                          
        )) 
    );    


    /*Department Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Portfolio Section', 'konstruk' ),
        'id'               => 'Portfolio',
        'customizer_width' => '450px',
        'icon' => 'el el-align-right',
        'fields'           => array(
        
            array(
                'id'       => 'department_single_image', 
                'url'      => true,     
                'title'    => esc_html__( 'Portfolio Single page banner image', 'konstruk' ),                    
                'type'     => 'media',                    
            ),  

            array(
                'id'       => 'portfolio_banner_text',                               
                'title'    => esc_html__( 'Portfolio Singe Page Banner Text', 'konstruk' ),
                'subtitle' => esc_html__( 'Enter Portfolio Banner Text', 'konstruk' ),
                'type'     => 'textarea',
                'default'  => '',
                    
            ), 

            array(
                'id'       => 'portfolio_slug',                               
                'title'    => esc_html__( 'Portfolio Slug', 'konstruk' ),
                'subtitle' => esc_html__( 'Enter Portfolio Slug Here', 'konstruk' ),
                'type'     => 'text',
                'default'  => 'portfolios',
                    
            ), 
        )
    ) 
);




    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social Icons', 'konstruk' ),
        'desc'   => esc_html__( 'Add your social icon here', 'konstruk' ),
        'icon'   => 'el el-share',
         'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields' => array(
                    array(
                        'id'       => 'facebook',                               
                        'title'    => esc_html__( 'Facebook Link', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Facebook Link', 'konstruk' ),
                        'type'     => 'text',                     
                    ),
                        
                     array(
                        'id'       => 'twitter',                               
                        'title'    => esc_html__( 'Twitter Link', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Twitter Link', 'konstruk' ),
                        'type'     => 'text'
                    ),
                    
                        array(
                        'id'       => 'rss',                               
                        'title'    => esc_html__( 'Rss Link', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Rss Link', 'konstruk' ),
                        'type'     => 'text'
                    ),
                    
                     array(
                        'id'       => 'pinterest',                               
                        'title'    => esc_html__( 'Pinterest Link', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Pinterest Link', 'konstruk' ),
                        'type'     => 'text'
                    ),
                     array(
                        'id'       => 'linkedin',                               
                        'title'    => esc_html__( 'Linkedin Link', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Linkedin Link', 'konstruk' ),
                        'type'     => 'text',  
                    ),

                    array(
                        'id'       => 'instagram',                               
                        'title'    => esc_html__( 'Instagram Link', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Instagram Link', 'konstruk' ),
                        'type'     => 'text',                       
                    ),

                     array(
                        'id'       => 'youtube',                               
                        'title'    => esc_html__( 'Youtube Link', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Youtube Link', 'konstruk' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'tumblr',                               
                        'title'    => esc_html__( 'Tumblr Link', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Tumblr Link', 'konstruk' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'vimeo',                               
                        'title'    => esc_html__( 'Vimeo Link', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Vimeo Link', 'konstruk' ),
                        'type'     => 'text',                       
                    ), 

                    array(
                        'id'       => 'snapchat',                               
                        'title'    => esc_html__( 'Snapchat Link', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Snapchat Link', 'konstruk' ),
                        'type'     => 'text',                       
                    ),
                    
                    array(
                        'id'       => 'tiktok',                               
                        'title'    => esc_html__( 'Tik Tok Link', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Tik Tok Link', 'konstruk' ),
                        'type'     => 'text',                       
                    ), 

                    array(
                        'id'       => 'houzz',                               
                        'title'    => esc_html__( 'Houzz Link', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Houzz Link', 'konstruk' ),
                        'type'     => 'text',                       
                    ),         
            ) 
        ) 
    );
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Mouse Pointer', 'konstruk' ),
        'desc'   => esc_html__( 'Add your Mouse Pointer here', 'konstruk' ),
        'icon'   => 'el el-hand-up',
        'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields' => array(
                        array(
                            'id'       => 'show_pointer',
                            'type'     => 'switch', 
                            'title'    => esc_html__('Show Pointer', 'konstruk'),
                            'subtitle' => esc_html__('You can show or hide Mouse Pointer', 'konstruk'),
                            'default'  => false,
                        ), 

                        array(
                            'id'        => 'pointer_border',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Pointer Border','konstruk'),
                            'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                            'default'   => '#ffb703',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'       => 'border_width',                               
                            'title'    => esc_html__( 'Border Width', 'konstruk' ),
                            'subtitle' => esc_html__( 'Enter Pointer Border Width', 'konstruk' ),
                            'type'     => 'text',
                            'default'   => '2',                         
                        ), 

                        array(
                            'id'        => 'pointer_bg',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Pointer Background','konstruk'),
                            'subtitle'  => esc_html__('Enter Pointer Background color', 'konstruk'),    
                            'default'   => 'transparent',                        
                            'validate'  => 'color',                        
                        ),  


                        array(
                            'id'       => 'diameter',                               
                            'title'    => esc_html__( 'Diameter', 'konstruk' ),
                            'subtitle' => esc_html__( 'Enter Pointer diameter Size', 'konstruk' ),
                            'type'     => 'text',  
                            'default'   => '40',                    
                        ),   

                        array(
                            'id'       => 'speed',                               
                            'title'    => esc_html__( 'Pointer Speed', 'konstruk' ),
                            'subtitle' => esc_html__( 'Enter Pointer Scale Size', 'konstruk' ),
                            'type'     => 'text',
                            'default'   => '4',                         
                        ),                     

                        array(
                            'id'       => 'scale',                               
                            'title'    => esc_html__( 'Hover Scale', 'konstruk' ),
                            'subtitle' => esc_html__( 'Enter Pointer Scale Size', 'konstruk' ),
                            'type'     => 'text',
                            'default'   => '1.3',                         
                        ),
            ) 
        ) 
    );

    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'ScrollBar', 'konstruk' ),
    'desc'   => esc_html__( 'Add custom scrollbar options here', 'konstruk' ),
    'icon'   => 'el el-hand-up',
    'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
    'fields' => array(
                    array(
                        'id'       => 'show_scrollbar',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show ScrollBar', 'konstruk'),
                        'subtitle' => esc_html__('You can show or hide ScrollBar', 'konstruk'),
                        'default'  => false,
                    ), 


                    array(
                        'id'        => 'cursorcolor',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Cursor Color','konstruk'),
                        'subtitle'  => esc_html__('Pick color', 'konstruk'),    
                        'default'   => '#ffb703',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'rail_bg',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Rail Background','konstruk'),
                        'subtitle'  => esc_html__('Enter Rail Background color', 'konstruk'),    
                        'default'   => '#010101',                        
                        'validate'  => 'color',                        
                    ),  


                    array(
                        'id'       => 'cursor_width',                               
                        'title'    => esc_html__( 'Cursor Width', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Cursor Width', 'konstruk' ),
                        'type'     => 'text',
                        'default'   => '14',                         
                    ),                         

                    array(
                        'id'       => 'cursorminheight',                               
                        'title'    => esc_html__( 'Cursor Min Height', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Cursor Min Height', 'konstruk' ),
                        'type'     => 'text',
                        'default'  => '120',                         
                    ),                         

                    array(
                        'id'       => 'scrollspeed',                               
                        'title'    => esc_html__( 'Scroll Speed', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Scroll Speed', 'konstruk' ),
                        'type'     => 'text',
                        'default'   => '60',                         
                    ),                         


                    array(
                        'id'       => 'mousescrollstep',                               
                        'title'    => esc_html__( 'Mouse Scroll Step', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter Mouse Scroll Step', 'konstruk' ),
                        'type'     => 'text',
                        'default'   => '110',                         
                    ), 

                 
            ) 
        ) 
    );
    if ( class_exists( 'WooCommerce' ) ) {
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Woocommerce', 'konstruk' ),    
        'icon'   => 'el el-shopping-cart',    
        ) 
    ); 

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Shop', 'konstruk' ),
        'id'               => 'shop_layout',
        'customizer_width' => '450px',
        'subsection' =>true,      
        'fields'           => array(                      
            array(
                'id'       => 'shop_banner', 
                'url'      => true,     
                'title'    => esc_html__( 'Shop page banner', 'konstruk' ),                    
                'type'     => 'media',
            ), 
            array(
                    'id'       => 'shop-layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Select Shop Layout', 'konstruk'), 
                    'subtitle' => esc_html__('Select your shop layout', 'konstruk'),
                    'options'  => array(
                        'full'      => array(
                            'alt'   => 'Shop Style 1', 
                            'img'   => get_template_directory_uri().'/libs/img/1c.png'                                      
                        ),
                        'right-col' => array(
                            'alt'   => 'Shop Style 2', 
                            'img'   => get_template_directory_uri().'/libs/img/2cr.png'
                        ),
                        'left-col'  => array(
                            'alt'   => 'Shop Style 3', 
                            'img'   => get_template_directory_uri().'/libs/img/2cl.png'
                        ),                                  
                    ),
                    'default' => 'full'
                ),

                array(
                    'id'       => 'wc_num_product',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Number of Products Per Page', 'konstruk' ),
                    'default'  => '9',
                ),

                array(
                    'id'       => 'wc_num_product_per_row',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Number of Products Per Row', 'konstruk' ),
                    'default'  => '3',
                ),

                array(
                    'id'       => 'wc_cart_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Cart Icon Show At Menu Area', 'konstruk' ),
                    'on'       => esc_html__( 'Enabled', 'konstruk' ),
                    'off'      => esc_html__( 'Disabled', 'konstruk' ),
                    'default'  => false,
                ), 

                array(
                    'id'        => 'cart',
                    'type'      => 'color',
                    'title'     => esc_html__('Cart Icon Color (Normal)','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '',
                    'validate'  => 'color',
                    'output' => array(                 
                        'color'            => '.menu-cart-area i'
                    ), 
                    'required' => array('wc_cart_icon','equals', true),                       
                ),

                array(
                    'id'        => 'carts',
                    'type'      => 'color',
                    'title'     => esc_html__('Cart Icon Color (Sticky)','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '',
                    'validate'  => 'color',
                    'output' => array(                 
                        'color'            => '.header-inner.sticky .menu-cart-area i'
                    ), 
                    'required' => array('wc_cart_icon','equals', true),                       
                ), 

                array(
                    'id'       => 'cart_count',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Cart Count Show', 'konstruk' ),
                    'on'       => esc_html__( 'Enabled', 'konstruk' ),
                    'off'      => esc_html__( 'Disabled', 'konstruk' ),
                    'default'  => false,
                ),

                array(
                    'id'        => 'cart_count_colors_bg',
                    'type'      => 'color',
                    'title'     => esc_html__('Cart Count Bg Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '',
                    'validate'  => 'color',
                    'output' => array(                 
                        'background-color'            => '.rsw-count'
                    ), 
                    'required' => array('cart_count','equals', true),                       
                ), 

                array(
                    'id'        => 'cart_count_colors',
                    'type'      => 'color',
                    'title'     => esc_html__('Cart Count Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '',
                    'validate'  => 'color',
                    'output' => array(                 
                        'color'            => '.rsw-count'
                    ), 
                    'required' => array('cart_count','equals', true),                       
                ), 

                array(
                'id'       => 'disable-sidebar',
                'type'     => 'switch', 
                'title'    => esc_html__('Sidebar Disable For Single Product Page', 'konstruk'),                
                'default'  => true,
            ), 
               
            )
        ) 
    );
}
   
    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Footer Option', 'konstruk' ),
    'desc'   => esc_html__( 'Footer style here', 'konstruk' ),
    'icon'   => 'el el-th-large',   
    'fields' => array(
                array(
                    'id'       => 'footer_bg_image', 
                    'url'      => true,     
                    'title'    => esc_html__( 'Footer Background Image', 'konstruk' ),                 
                    'type'     => 'media',                                  
                ),

                array(
                        'id'        => 'footer_bg_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer Bg Color','konstruk'),
                        'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                        'default'   => '#000d13',
                        'validate'  => 'color',                        
                    ),  

                 array(
                    'id'               => 'header_grid2',
                    'type'             => 'select',
                    'title'            => esc_html__('Footer Area Width', 'konstruk'),             
                   
                    'options'          => array(                                     
                    
                        'container' => esc_html__('Container', 'konstruk'),
                        'full'      => esc_html__('Container Fluid', 'konstruk')
                    ),

                    'default'          => 'container',            
                ),

                array(
                    'id'       => 'footer_logo',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Footer Logo', 'konstruk' ),
                    'subtitle' => esc_html__( 'Upload your footer logo', 'konstruk' ),                  
                ), 

             
                array(
                    'id'       => 'footer-logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'konstruk' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'konstruk' ),
                    'type'     => 'text',
                    'default'  => '30px'                    
                ), 
                array(
                    'id'        => 'foot_social_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Icon Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'foot_social_color_bg',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Icon Background Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '',
                    'validate'  => 'color',  
                    'output' => array(                 
                        'background'  => '.rs-footer .widget ul.footer_social li i'
                    )                        
                ),                   
                   

                array(
                    'id'        => 'foot_social_hover',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Icon Hover','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),   

                array(
                    'id'        => 'foot_social_color_bg_hover',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Icon Hover Background Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '',
                    'validate'  => 'color',  
                    'output' => array(                 
                        'background'  => '.rs-footer .widget ul.footer_social li i:hover'
                    )                       
                ), 

                array(
                    'id'        => 'foot_social_color_border',
                    'type'      => 'text',
                    'title'     => esc_html__('Social Icon Border Radius','konstruk'),                                       
                ),

                array(
                    'id'        => 'foot_social_color_width',
                    'type'      => 'text',
                    'title'     => esc_html__('Social Icon Bg Width','konstruk'),                                       
                ), 
 

                array(
                    'id'        => 'footer_text_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Footer Font Size','konstruk'),
                    'subtitle'  => esc_html__('Font Size', 'konstruk'),    
                    'default'   => '16px',                                            
                ),  

                array(
                    'id'        => 'footer_h3_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Footer Title Font Size','konstruk'),
                    'subtitle'  => esc_html__('Font Size', 'konstruk'),    
                    'default'   => '20px',                                            
                ),  

                array(
                    'id'        => 'footer_link_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Footer Link Font Size','konstruk'),
                    'subtitle'  => esc_html__('Font Size', 'konstruk'),    
                    'default'   => '',                                            
                ), 
                array(
                    'id'        => 'footer_title_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Title Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '#ffffff',
                    'validate'  => 'color',                        
                ),

                 array(
                    'id'        => 'footer_title_border_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Title Border Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),   

                array(
                    'id'        => 'footer_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Text Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '#ffffff',
                    'validate'  => 'color',                        
                ),  

                 array(
                    'id'        => 'footer_icon_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Icon Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'footer_link_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Link Hover Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '#ffb703',
                    'validate'  => 'color',                        
                ),   

                array(
                    'id'        => 'footer_input_bg_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Button Background Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ), 

                array(
                        'id'        => 'footer_input_hover_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer Button Hover Background Color','konstruk'),
                        'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                        'default'   => '',
                        'validate'  => 'color',                        
                    ),

                array(
                        'id'        => 'footer_input_border_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer input Border Color','konstruk'),
                        'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                        'default'   => '#333333',
                        'validate'  => 'color',                        
                    ),  

                array(
                    'id'        => 'footer_input_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Button Text Color','konstruk'),
                    'subtitle'  => esc_html__('Pick color.', 'konstruk'),
                    'default'   => '#ffffff',
                    'validate'  => 'color',                        
                ),                  
                       
                
                array(
                    'id'       => 'copyright',
                    'type'     => 'textarea',
                    'title'    => esc_html__( 'Footer CopyRight', 'konstruk' ),
                    'subtitle' => esc_html__( 'Change your footer copyright text ?', 'konstruk' ),
                    'default'  => esc_html__( '2022 All Rights Reserved', 'konstruk' ),
                ),  

                array(
                    'id'       => 'copyright_bg',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Copyright Background', 'konstruk' ),
                    'subtitle' => esc_html__( 'Copyright Background Color', 'konstruk' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'background'            => 'body .footer-bottom'
                    )           
                ),

                array(
                    'id'       => 'copyright__border',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Copyright Border', 'konstruk' ),
                    'subtitle' => esc_html__( 'Copyright Border Color', 'konstruk' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'border-color'            => 'body .footer-bottom'
                    )           
                ),
         
                array(
                    'id'       => 'copyright_text_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Copyright Text Color', 'konstruk' ),
                    'subtitle' => esc_html__( 'Copyright Text Color', 'konstruk' ),      
                    'default'  => '#ffffff',            
                ), 
            ) 
        ) 
    );        
    
    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( '404 Error Page', 'konstruk' ),
    'desc'   => esc_html__( '404 details  here', 'konstruk' ),
    'icon'   => 'el el-error-alt',    
    'fields' => array(

                array(
                        'id'       => 'title_404',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Title', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter title for 404 page', 'konstruk' ), 
                        'default'  => esc_html__('404', 'konstruk')                
                    ),  
                
                array(
                        'id'       => 'text_404',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Text', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter text for 404 page', 'konstruk' ),  
                        'default'  => esc_html__('Page Not Found', 'konstruk')             
                    ),                      
                       
                
                array(
                        'id'       => 'back_home',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Back to Home Button Label', 'konstruk' ),
                        'subtitle' => esc_html__( 'Enter label for "Back to Home" button', 'konstruk' ),
                        'default'  => esc_html__('Back to Homepage', 'konstruk')  
                                    
                    ), 

                array(
                    'id'       => 'error_bg',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload 404 Page Bg', 'konstruk' ),
                    'subtitle' => esc_html__( 'Upload your image', 'konstruk' ),
                    'url'=> true                
                ),                
                
                array(
                    'id'       => 'error_text',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Text Color', 'konstruk' ),
                    'subtitle' => esc_html__( 'Text Color', 'konstruk' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'color'            => '.page-error .content-area h2 span, .page-error .content-area h2'
                    )           
                ),
                                  
            ) 
        ) 
    );   


    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";           
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.     
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'konstruk' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'konstruk' ),
                'icon'   => 'el el-paper-clip',              
                'fields' => array()
            );
            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';
            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_action( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );              
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }