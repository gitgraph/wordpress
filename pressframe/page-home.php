<?php /* Template Name: Home */ ?><?php get_header(); ?> <section id="s2" class="section"> 

    <div id="dh1"> <h1>...open</h1> 
    </div> 
    <script type='text/javascript'> open = 'home';
    </script> 

    <div id="hdiv2" class="home2"> 

        <div id="hdmain"> 

            <div id="hhead" class="home" rel="<?php
            if (get_theme_mod('hside')) {
                echo get_theme_mod('hside');
            }
            ?>"> <?php if (get_theme_mod('hside') === '3') { ?> <section id="hsec3" class="asec"> 

                        <div id="swid" class="widgets" style="padding: 90px 0px;"> <?php dynamic_sidebar('sidebar'); ?> 
                        </div> </section> <?php } ?> <?php
                $arel1 = '';
                if (get_theme_mod('hmset1')) {
                    ?> <?php
                    if (get_theme_mod('hmset1') === '1') {
                        $arel1 = 'sliderblock';
                    }
                    ?> <?php
                    if (get_theme_mod('hmset1') === '2') {
                        $arel1 = 'news';
                    }
                    ?> <?php
                    if (get_theme_mod('hmset1') === '3') {
                        $arel1 = 'field';
                    }
                    ?> <?php
                    if (get_theme_mod('hmset1') === '4') {
                        $arel1 = 'none';
                    }
                    ?> <?php } ?> <section id="hsec1" class="asec" rel="<?php echo $arel1; ?>"> <?php if (get_theme_mod('hmset1')) { ?> <?php if (get_theme_mod('hmset1') === '1') { ?> <?php get_template_part('sliderblock'); ?> <?php } ?> <?php if (get_theme_mod('hmset1') === '2') { ?> <?php get_template_part('news'); ?> <?php } ?> <?php if (get_theme_mod('hmset1') === '3') { ?> <?php get_template_part('field') ?> <?php } ?> <?php if (get_theme_mod('hmset1') === '4') { ?> <?php } ?> <?php } ?> </section> <?php if (get_theme_mod('hside') === '4') { ?> <section id="hsec3" class="asec"> 

                        <div id="swid" class="widgets" style="padding: 90px 0px;"> <?php dynamic_sidebar('sidebar'); ?> 
                        </div> </section> <?php } ?> <?php
                $arel2 = '';
                if (get_theme_mod('hmset2')) {
                    ?> <?php
                    if (get_theme_mod('hmset2') === '1') {
                        $arel2 = 'sliderblock';
                    }
                    ?> <?php
                    if (get_theme_mod('hmset2') === '2') {
                        $arel2 = 'news';
                    }
                    ?> <?php
                    if (get_theme_mod('hmset2') === '3') {
                        $arel2 = 'field';
                    }
                    ?> <?php
                    if (get_theme_mod('hmset2') === '4') {
                        $arel2 = 'none';
                    }
                    ?> <?php } ?> <section id="hsec2" class="asec" rel="<?php echo $arel2; ?>"> <?php if (get_theme_mod('hmset2')) { ?> <?php if (get_theme_mod('hmset2') === '1') { ?> <?php get_template_part('sliderblock'); ?> <?php } ?> <?php if (get_theme_mod('hmset2') === '2') { ?> <?php get_template_part('news'); ?> <?php } ?> <?php if (get_theme_mod('hmset2') === '3') { ?> <?php get_template_part('field') ?> <?php } ?> <?php if (get_theme_mod('hmset2') === '4') { ?> <?php } ?> <?php } ?> </section> <?php if (get_theme_mod('hside') === '5') { ?> <section id="hsec3" class="asec"> 

                        <div id="swid" class="widgets" style="padding: 90px 0px;"> <?php dynamic_sidebar('sidebar'); ?> 
                        </div> </section> <?php } ?> 
            </div> 

            <div id="hhead2"> <?php
                $ppside = '';
                if (get_theme_mod('hside') === '1' || get_theme_mod('hside') === '2') {
                    ?> <?php
                    if (get_theme_mod('hside') === '1') {
                        $ppside = 'left';
                    }
                    ?> <?php
                    if (get_theme_mod('hside') === '2') {
                        $ppside = 'right';
                    }
                    ?> <section id="hsec3" class="asec" rel="<?php echo $ppside; ?>"> 

                        <div id="swid" class="widgets" style="padding: 90px 0px;"> <?php dynamic_sidebar('sidebar'); ?> 
                        </div> </section> <?php } ?> 
            </div> 
        </div> 
    </div> <?php get_footer(); ?> 