<?php

register_sidebar(array('name' => __('Widgets'), 'id' => 'sidebar', 'description' => 'Add widgets here'));
add_theme_support('post-thumbnails');
register_post_type('news', array('label' => _('News Posts'), 'public' => true,
    'menu_position' => 2, 'rewrite' => array('slug' => 'news'),
    'supports' => array('title', 'editor', 'category', 'author', 'excerpt'),
    'taxonomies' => array('category', 'post_tag')
        )
);
add_action('init', 'pressframe_news_add_default_boxes');

function pressframe_news_add_default_boxes() {
    register_taxonomy_for_object_type('category', 'news');
    register_taxonomy_for_object_type('post_tag', 'news');
}

add_action('customize_register', 'pressframe_settings');

function pressframe_settings($wpc) {

    $wpc->add_section('section_1', array('title' => __('Typography', 'pressframe'), 'priority' => 30));
    
    $wpc->add_setting('font_family', array('default' => 'Roboto'));
    
    $wpc->add_control(new WP_Customize_Control($wpc, 'font_family', array('label' => __('Font Family', 'pressframe'),
        'section' => 'section_1', 'settings' => 'font_family', 'type' => 'select',
        'choices' => array('Abel' => 'Abel', 'Oswald' => 'Oswald', 'Terminal Dosis' => 'Terminal Dosis',
            'PT Serif' => 'PT Serif', 'Bitter' => 'Bitter', 'Georgia' => 'Georgia', 
            'Droid Serif' => 'Droid Serif', 'Helvetica' => 'Helvetica', 'Istok Web' => 'Istok Web',
            'Arial' => 'Arial', 'Verdana' => 'Verdana', 'Lucida Sans Unicode' => 'Lucida Sans Unicode',
            'Droid Sans' => 'Droid Sans', 'Lato' => 'Lato', 'Lobster' => 'Lobster', 'Roboto' => 'Roboto'), 'priority' => 1)));

    $wpc->add_setting('font_size', array('default' => '16',));
    
    $wpc->add_control(new WP_Customize_Control($wpc, 'font_size', array('label' => __('Font Size', 'pressframe'),
        'section' => 'section_1', 'settings' => 'font_size', 'type' => 'select',
        'choices' => array('18' => '18', '17' => '17', '16' => '16', '15' => '15', '14' => '14', '13' => '13', '12' => '12'), 'priority' => 2)));

    $wpc->add_section('section_2', array('title' => __('Logo', 'pressframe'), 'priority' => 31));
    
    $wpc->add_setting('logo_image', array('default' => ''));
    
    $wpc->add_control(new WP_Customize_Image_Control($wpc, 'logo_image', array('label' => __('Logo Image', 'pressframe'),
        'section' => 'section_2',
        'settings' => 'logo_image',
        'priority' => 1)));

    $wpc->add_section('section_3', array('title' => __('Sidebar', 'pressframe'), 'priority' => 32,));
    
    $wpc->add_setting('sidebar_position', array('default' => '2'));
    
    $wpc->add_control(new WP_Customize_Control($wpc, 'sidebar_position', array('label' => __('Sidebar Position', 'pressframe'),
        'section' => 'section_3',
        'settings' => 'sidebar_position', 'type' => 'radio',
        'choices' => array('1' => 'Left', '2' => 'Right'), 'priority' => 1)));

    $wpc->add_section('section_4', array('title' => __('Color', 'pressframe'), 'priority' => 33,));

    $wpc->add_setting('color', array('default' => '#ff5500'));

    $wpc->add_control(new WP_Customize_Color_Control($wpc, 'color', array('label' => __('', 'pressframe'),
        'section' => 'section_4',
        'settings' => 'color',
        'priority' => 1)));
}

add_action('wp_head', 'pressframe_css');

function pressframe_css() {
    ?> 
    <style type =text/css>

        <?php if (get_theme_mod('font_family')) { ?> 
            #hlogo h1, #top h1, #sidebar h3, .ctstyle a, #respond h3,#respond p,#comments,#main #commenthead .vcard div,#archives .titles 
            {font-weight: 300; font-family: '<?php echo get_theme_mod('font_family'); ?>', serif; }
            .hli #h3t {font-weight: 400; font-family: '<?php echo get_theme_mod('font_family'); ?>', serif; }
        <?php } ?> 
        <?php if (get_theme_mod('font_size')) { ?> 
            html { font-size: <?php echo get_theme_mod('font_size'); ?>px; } 
        <?php } ?> 
        <?php if (get_theme_mod('sidebar_position')) { ?> 
            <?php if (get_theme_mod('sidebar_position') === '1') { ?> 
                #main{float: right;}
                #main>ul { padding: 20px 0 0 20px;  }
                #sidebar{float: right;}
                #sidebar>ul{ padding: 20px 20px 0 0;}
                @media only screen and (max-width: 1200px){ #main>ul {padding: 0;}  #sidebar>ul{ padding: 0;} }
            <?php } ?> 
            <?php if (get_theme_mod('sidebar_position') === '2') { ?> 
                #main{float: left;}
                #main>ul {  padding: 20px 20px 0 0; }
                #sidebar{float: left;}
                #sidebar>ul{ padding: 20px 0 0 20px;}
                @media only screen and (max-width: 1200px){ #main>ul {padding: 0;} #sidebar>ul{ padding: 0;} }
            <?php } ?> 
        <?php } ?> 
                
        <?php if (get_theme_mod('color')) { ?> 
            #sidebar .widgettitle {color: <?php echo get_theme_mod('color'); ?>; } 
            #sidebar .widget_recent_entries a:hover, #sidebar .widget_categories a:hover, #sidebar .widget_archive a:hover,
            #sidebar .widget_meta a:hover, #sidebar .widget_nav_menu a:hover,#sidebar .widget_pages a:hover
            {color: #222; border-left: 1px solid <?php echo get_theme_mod('color'); ?>; } 
            #sidebar .tagcloud a:hover{color: #222; border-top: 1px solid <?php echo get_theme_mod('color'); ?>; } 
            #menu .container>div>ul li:hover{ box-shadow: 0px -1px 0px <?php echo get_theme_mod('color'); ?>; }
            #main #title h1{color: <?php echo get_theme_mod('color'); ?>; }
            .hli{ border-top: 1px solid <?php echo get_theme_mod('color'); ?>; }
            #main #commenthead .vcard div{color: <?php echo get_theme_mod('color'); ?>; }

        <?php } ?>             
            
    </style> 
    
    <?php
}

add_action('wp_enqueue_scripts', 'pressframe_ff_googlefonts');

function pressframe_ff_googlefonts() {
    if (get_theme_mod('font_family')) {
        switch (get_theme_mod('font_family')) {
            case 'Abel':wp_enqueue_style('font-abel', 'http://fonts.googleapis.com/css?family=Abel', false, 1.0, 'screen');
                break;
            case 'Oswald':wp_enqueue_style('font-oswald', 'http://fonts.googleapis.com/css?family=Oswald', false, 1.0, 'screen');
                break;
            case 'Terminal Dosis':wp_enqueue_style('font-terminal-dosis', 'http://fonts.googleapis.com/css?family=Terminal+Dosis', false, 1.0, 'screen');
                break;
            case 'Droid Serif':wp_enqueue_style('font-droid-serif', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic', false, 1.0, 'screen');
                break;
            case 'Istok Web':wp_enqueue_style('font-istok-web', 'http://fonts.googleapis.com/css?family=Istok+Web', false, 1.0, 'screen');
                break;
            case 'Droid Sans':wp_enqueue_style('font-droid-sans', 'http://fonts.googleapis.com/css?family=Droid+Sans', false, 1.0, 'screen');
                break;
            case 'Bitter':wp_enqueue_style('font-bitter', 'http://fonts.googleapis.com/css?family=Bitter', false, 1.0, 'screen');
                break;
            case 'Lato':wp_enqueue_style('font-lato', 'http://fonts.googleapis.com/css?family=Lato', false, 1.0, 'screen');
                break;
            case 'Lobster':wp_enqueue_style('font-lobster', 'http://fonts.googleapis.com/css?family=Lobster', false, 1.0, 'screen');
                break;
            case 'Roboto':wp_enqueue_style('font-roboto', 'http://fonts.googleapis.com/css?family=Roboto', false, 1.0, 'screen');
                break;
        }
    }
}
?>