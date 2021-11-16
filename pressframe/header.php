<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:svg="http://www.w3.org/2000/svg"> 

    <head> 
        <title><?php bloginfo('title'); ?> 
        </title> 
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" /> 
        <meta name="viewport" content="width=device-width,initial-scale=1"> 

            <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" /> 

            <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,100,300' rel='stylesheet' type='text/css'> 
                <script type='text/javascript'> _msite = '<?php bloginfo('url'); ?>';
                    _tempurl = '<?php bloginfo('template_url'); ?>';
                    vmax = 0;
                    _alod = 0;
                </script> <?php wp_head(); ?> 
                </head> 

                <body> 

                    <div id="dquo1" style="display: none;">&ldquo;
                    </div> 

                    <div id="dquo2" style="display: none;">&bdquo;
                    </div> 

                    <div id="maincontent"> 

                        <div id="wrap"> <section id="s1h"> 

                                <header> 

                                    <div id="header1"> 

                                        <div id="title"> 

                                            <div id="imgt"><a href="<?php echo get_option('home'); ?>" rel="home"> </a>
                                            </div> 

                                            <div id="hlogo"> <h1><?php bloginfo('name'); ?> <a href="<?php echo get_option('home'); ?>" rel="home"> </a></h1> 

                                                <p><?php bloginfo('description'); ?></p> 
                                            </div> 
                                        </div> <h4 id="log">log </h4> 

                                        <div id="twid" class="widgets"> 

                                            <div id="shead"> 

                                                <div id="sback">
                                                </div> 

                                                <div id="search"> 

                                                    <div id="sclose"> <a href="#" onclick="return false;"> <img id="srhimg2" src="<?php bloginfo('template_url'); ?>/img/sclose.png"> </a> 
                                                    </div> 

                                                    <div id="seekbtn"> <a href="#" onclick="return false;"> <img id="srhimg1" src="<?php bloginfo('template_url'); ?>/img/search.png"> </a> 
                                                    </div> <?php get_search_form(); ?> 
                                                </div> 
                                            </div> 
                                        </div> 
                                    </div> 

                                    <div id="gtop"> <a href="#" onclick="return false;"> 

                                            <div id="uarr"> <img id="thumbimg" class="cthumbimg2" src="<?php bloginfo('template_url'); ?>/img/uparr.png"> 
                                            </div> </a> 
                                    </div> </header> 

                                <div id="over" class="section"> 
                                </div> 

                                <div id="homehead" style="top: -400px;"> 

                                    <div id="homemenu"> 

                                        <div id="homeback"> 

                                            <div id="homebackc"> 

                                                <div class="dragme">
                                                </div> 
                                            </div> 
                                        </div> 

                                        <div id="homehold"> 

                                            <div id="home1">
                                                <ul id="ulhm1"> 
                                                </ul> 
                                            </div> <a class="chome" href="#" onclick="return false;" > 

                                                <div class="dragme">
                                                </div> 

                                                <div id="dhome"> 

                                                    <div id="house"> <img id="thumbimg" class="cthumbimg2" src="<?php bloginfo('template_url'); ?>/img/home.png"> 
                                                    </div> <h1>Home</h1> 
                                                </div> </a> 

                                            <div id="home2">
                                                <ul id="ulhm2"> 
                                                </ul> 
                                            </div> 
                                        </div> 

                                        <div id="homenav"> <?php wp_nav_menu(array('theme_location' => 'home', 'menu_class' => 'nav', 'items_wrap' => '
<ul id="menu-home" class="%2$s">%3$s
</ul>', 'walker' => new m_walker(), 'walker_arg2' => bloginfo('template_url'))); ?> 
                                        </div> 

                                        <div id="loadbox2">
                                        </div> 

                                        <div id="shade">
                                        </div> 
                                    </div> 
                                </div> </section> <section id="s1" class="section"> 

                                <div id="swrap"> 

                                    <div id="thhead"> <section id="tsec1"> <?php if (get_theme_mod('tset')) { ?> <?php if (get_theme_mod('tset') === '1') { ?> <?php get_template_part('news'); ?> <?php } ?> <?php if (get_theme_mod('tset') === '2') { ?> <?php get_template_part('headimg'); ?> <?php } ?> <?php if (get_theme_mod('tset') === '3') { ?> <?php get_template_part('sliderblock'); ?> <?php } ?> <?php if (get_theme_mod('tset') === '4') { ?> <?php get_template_part('field'); ?> <?php } ?> <?php if (get_theme_mod('tset') === '5') { ?> <?php } ?> <?php } ?> </section> 
                                    </div> 

                                    <div id="oth"> 
                                    </div> 

                                    <div id="subload"> 

                                        <div id="loaders"> 
                                            <ul id="loadersul"> 
                                            </ul> 
                                        </div> 
                                    </div> 
                                </div> </section> 