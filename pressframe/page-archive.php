<?php /* Template Name: Archive */ ?><?php
if ($_SESSION['a4set'] == null) {
    get_header();
}
?> <section id="s2" class="section"> 

    <div id="dh1"> <h1>...open</h1> 
    </div> 

    <div id="hdiv2" class="page2"> 

        <div id="hdmain"> 

            <div id="hhead" class="page" rel="<?php
            if (get_theme_mod('pside')) {
                echo get_theme_mod('pside');
            }
            ?>"> <?php if (get_theme_mod('pside') === '3') {  ?> <section id="hsec3" class="asec"> 

                        <div id="swid" class="widgets"> <?php dynamic_sidebar('sidebar'); ?> 
                        </div> </section> <?php } ?> <section id="hsec1" class="asec" > 

                    <div id="aloadh"> 

                        <div id="aloadc"> 

                            <div id="b1" rel="1"> <h2 class="bhc1" id="bh1"><?php _e('Archives by category'); ?></h2> <a class="bbr" href="#" id="b1a" onclick="bclick(1, 'a');"> </a> 
                                <ul> <?php wp_list_categories(array('feed' => __('RSS', 'pressframe'), 'show_count' => true, 'use_desc_for_title' => false, 'title_li' => false)); ?> 
                                </ul> 
                            </div> 

                            <div id="b2" rel="2"> <h2 class="bhc2" id="bh2"><?php _e('Archives by month'); ?></h2> <a class="bbr" href="#" id="b2a" onclick="bclick(2, 'a');"> </a> 
                                <ul> <?php wp_get_archives(array('show_post_count' => true, 'type' => 'monthly')); ?> 
                                </ul> 
                            </div> 
                        </div> 
                    </div> </section> <?php if (get_theme_mod('pside') === '5') { ?> <section id="hsec3" class="asec"> 

                        <div id="swid" class="widgets"> <?php dynamic_sidebar('sidebar'); ?> 
                        </div> </section> <?php } ?> <?php if (get_theme_mod('pside') === '1' || get_theme_mod('pside') === '2') { ?> <section id="hsec3" class="asec"> 

                        <div id="swid" class="widgets"> <?php dynamic_sidebar('sidebar'); ?> 
                        </div> </section> <?php } ?> 
            </div> 
        </div> 
    </div> 
    <script type="text/javascript">
    </script> <?php
    if ($_SESSION['a4set'] == null) {
        get_footer();
    }?>