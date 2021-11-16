<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:svg="http://www.w3.org/2000/svg"> 

    <head> 
        <title><?php bloginfo('title'); ?></title> 
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" /> 
        <meta name="viewport" content="width=device-width,initial-scale=1"> 
            <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" /> 
            <script type='text/javascript'> _tempurl = '<?php bloginfo('template_url'); ?>';</script>
         <?php wp_head(); ?> 
    </head> 

    <body> 
        <div id="header"> 
            <div class="container"> 
                <div id="hlogo"> 

                    <div id="cssc">
                    </div> 

                    <div id="htext"> <a href="<?php echo get_option('home'); ?>" rel="home"> <?php if (get_theme_mod('logo_image')) { ?> <img id="imgth" src="<?php echo get_theme_mod('logo_image'); ?>"> <?php } else { ?> <?php if (get_bloginfo('name')) { ?> <h1><?php bloginfo('name'); ?></h1> <?php } ?> <?php } ?> </a> 

                        <p><?php bloginfo('description'); ?></p> 
                    </div> 
                </div> 

                <div id="menubtn"> 
                    <ul><a href="#" onclick="return false;"></a>
                        <li></li><li></li><li></li>
                    </ul> 
                </div> 

                <div id="seekbtn"> 
                    <ul> <a class="searchc" href="#" onclick="return false;"></a> 
                        <li id="s0"></li>
                        <li id="s1"></li>
                        <li id="s2"></li>
                    </ul> 
                </div> 
            </div> 
        </div> 

        <div id="menu" rel="close"> 

            <div class="container"> <?php wp_nav_menu(); ?> 
            </div> 
        </div> 

        <div id="search" rel="close"> 

            <div class="container"> <?php get_search_form(); ?> 
            </div> 
        </div> 

        <div id="ghead"> 

            <div class="container"> <a id="gtop" href="#" onclick="return false;"> <img id="uparr" style="display: inline-block;width:35px; height: 23px;margin: 6px 0;" src="<?php bloginfo('template_url'); ?>/images/arrow.png"> </a> 
            </div> 
        </div>