<?php
function wabc_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar A', 'wabc' ),
		'id'            => 'sidebar-a',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar B', 'wabc' ),
		'id'            => 'sidebar-b',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

    register_sidebar( array(
        'name'          => __( 'Hero', 'wabc' ),
        'id'            => 'sidebar-hero',
				'description'   => '',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
    ) );


		/*
		TKSD WIDGETS AREAS
		*/
		// slideshow sidebar
		register_sidebar(array(
			'id' => 'sidebarslideshow',
			'name' => __('slideshow', 'wabc'),
			'description' => __('The first (primary) sidebar.', 'wabc'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>',
		));
		//header sibebars
		register_sidebar(array(
			'id' => 'sidebarheadera',
			'name' => __('Header A', 'wabc'),
			'description' => __('The second TKSD (primary) sidebar.', 'wabc'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>',
		));
		register_sidebar(array(
			'id' => 'sidebarheaderb',
			'name' => __('Header B', 'wabc'),
			'description' => __('The second TKSD (primary) sidebar.', 'wabc'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>',
		));
		register_sidebar(array(
			'id' => 'sidebarheaderc',
			'name' => __('Header C', 'wabc'),
			'description' => __('The third TKSD (primary) sidebar.', 'wabc'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>',
		));

		// top sidebars
			register_sidebar(array(
				'id' => 'sidebara',
				'name' => __('Top A', 'wabc'),
				'description' => __('The second TKSD (primary) sidebar.', 'wabc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widgettitle">',
				'after_title' => '</h2>',
			));
			register_sidebar(array(
				'id' => 'sidebarb',
				'name' => __('Top B', 'wabc'),
				'description' => __('The second TKSD (primary) sidebar.', 'wabc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widgettitle">',
				'after_title' => '</h2>',
			));
			register_sidebar(array(
				'id' => 'sidebarc',
				'name' => __('Top C', 'wabc'),
				'description' => __('The third TKSD (primary) sidebar.', 'wabc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widgettitle">',
				'after_title' => '</h2>',
			));
			// middle sidebar
			register_sidebar(array(
				'id' => 'sidebarmd1',
				'name' => __('Middle A', 'wabc'),
				'description' => __('The first middle sidebar.', 'wabc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widgettitle">',
				'after_title' => '</h2>',
			));
			register_sidebar(array(
				'id' => 'sidebarmd2',
				'name' => __('Middle B', 'wabc'),
				'description' => __('The second middle sidebar.', 'wabc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widgettitle">',
				'after_title' => '</h2>',
			));


			//footer sidebars
			register_sidebar(array(
				'id' => 'sidebarfa',
				'name' => __('Footer A', 'wabc'),
				'description' => __('The second TKSD (primary) sidebar.', 'wabc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widgettitle">',
				'after_title' => '</h2>',
			));
			register_sidebar(array(
				'id' => 'sidebarfb',
				'name' => __('Footer B', 'wabc'),
				'description' => __('The second TKSD (primary) sidebar.', 'wabc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widgettitle">',
				'after_title' => '</h2>',
			));
			register_sidebar(array(
				'id' => 'sidebarfc',
				'name' => __('Footer C', 'wabc'),
				'description' => __('The third TKSD (primary) sidebar.', 'wabc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widgettitle">',
				'after_title' => '</h2>',
			));

			register_sidebar(array(
				'id' => 'offcanvas',
				'name' => __('Offcanvas', 'wabc'),
				'description' => __('The offcanvas sidebar.', 'wabc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widgettitle">',
				'after_title' => '</h2>',
			));
// Register footer 2 sidebars

register_sidebar(array(
	'id' => 'sidebarf2a',
	'name' => __('Footer 2A', 'wabc'),
	'description' => __('The second TKSD (primary) sidebar.', 'wabc'),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
));
register_sidebar(array(
	'id' => 'sidebarf2b',
	'name' => __('Footer 2B', 'wabc'),
	'description' => __('The second TKSD (primary) sidebar.', 'wabc'),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
));
register_sidebar(array(
	'id' => 'sidebarf2c',
	'name' => __('Footer 2C', 'wabc'),
	'description' => __('The third TKSD (primary) sidebar.', 'wabc'),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
));
// Contact Page widgets

register_sidebar(array(
	'id' => 'sidebarcfa',
	'name' => __('Contact A', 'wabc'),
	'description' => __('The second TKSD (primary) sidebar.', 'wabc'),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
));
register_sidebar(array(
	'id' => 'sidebarcfb',
	'name' => __('Contact B', 'wabc'),
	'description' => __('The second TKSD (primary) sidebar.', 'wabc'),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
));





/*
    register_sidebar( array(
        'name'          => __( 'Off Canvas', 'wabc' ),
        'id'            => 'off-canvas',
        'description'   => '',
        'before_widget' => '<div class="col-md-12">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );*/
}
add_action( 'widgets_init', 'wabc_widgets_init' );
