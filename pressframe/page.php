<?php get_header(); ?> <section id="s2" class="section"> 

    <div id="dh1" style="height: 85px;"> <h1>...open</h1> 
    </div> 
    <script type='text/javascript'> open = 'page';
    </script> 

    <div id="hdiv2" class="page2"> 

        <div id="hdmain"> 

            <div id="hhead" class="page" rel="<?php
            if (get_theme_mod('pside')) {
                echo get_theme_mod('pside');
            }
            ?>"> <?php if (get_theme_mod('pside') === '3') { ?> <section id="hsec3" class="asec"> 

                        <div id="swid" class="widgets"> <?php dynamic_sidebar('sidebar'); ?> 
                        </div> </section> <?php } ?> <section id="hsec1" class="asec" rel="base"> <?php get_template_part('pagecontent') ?> </section> <?php if (get_theme_mod('pside') === '5') { ?> <section id="hsec3" class="asec"> 

                        <div id="swid" class="widgets"> <?php dynamic_sidebar('sidebar'); ?> 
                        </div> </section> <?php } ?> <?php if (get_theme_mod('pside') === '1' || get_theme_mod('pside') === '2') { ?> <section id="hsec3" class="asec"> 

                        <div id="swid" class="widgets"> <?php dynamic_sidebar('sidebar'); ?> 
                        </div> </section> <?php } ?> 
            </div> 
        </div> 
    </div> <?php get_footer(); ?> 