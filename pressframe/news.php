 

<div id="hdiv" class="ndiv"> 

    <div id="hdivo"> 

        <div class="hdivoc"> 
        </div> 

        <div id="drh"> 

            <div id="dr1" class="dr">
            </div> 

            <div id="dr2" class="dr">
            </div> 

            <div id="dr3" class="dr">
            </div> 
        </div> 
    </div> <?php $hhd = ''; ?> <?php if (get_theme_mod('nhd')) { ?> <?php $hhd = get_theme_mod('nhd'); ?> <?php } ?> 

    <div id="hdtext"> 

        <div id="hdrtext"> <h1 id="h1t" class="headline"><?php echo $hhd; ?></h1> 
        </div> 
    </div> <?php $ppp = 0; ?> <?php if (get_theme_mod('newp')) { ?> <?php $ppp = get_theme_mod('newp'); ?> <?php } ?> <?php $ct = 0; ?> <?php
    $args1 = array('posts_per_page' => $ppp);
    $loop1 = new WP_Query($args1);
    ?> <?php if ($loop1->have_posts()) : ?> 

        <div id="newh" style="margin-left: -8000px;"> 
            <ul id="hdivul" class="1"> <?php while ($loop1->have_posts()) : $loop1->the_post(); ?> <?php $ct++; ?> 
                    <li class="hli" <?php echo 'id="h' . $ct . '"' ?> > <a <?php echo 'id="' . $ct . '"' ?> href="<?php the_permalink(); ?>" class="ac"> 

                            <div id="nx"> <a <?php echo 'onclick="xnclick(' . $ct . ');"' ?> id="a" href="#" > <img id="xnimg" src="<?php bloginfo('template_url'); ?>/img/nclose.png"> </a> 
                            </div> 

                            <div <?php echo 'id="drag' . $ct . '" ' ?> class="draggable"> 
                            </div> 

                            <div id="text2"> 
                            </div> 

                            <div id="text"> 

                                <div id="tbox"> <h3 id="h3t"><?php the_title(); ?></h3> 
                                </div> 

                                <div id="tline"> 
                                </div> 

                                <div id="ncat"> 

                                    <div id="catlist"> <?php echo get_the_category_list(' '); ?> 
                                    </div> 

                                    <div id="midv"> | 
                                    </div> 

                                    <div id="taglist"> <?php echo get_the_tag_list(' ', ' '); ?> 
                                    </div> 
                                </div> 

                                <div id="sctext"> 

                                    <div class="cimgspost" <?php echo 'id="imgsnpost' . $ct . '"' ?>> 

                                        <div id="f1center"> 

                                            <div id="viewb"> <?php echo '<img src="' . get_bloginfo('stylesheet_directory') . '/img/deficon.png" />'; ?> 
                                            </div> 
                                        </div> 

                                        <div id="viewbvid"> <?php echo '<img src="' . get_bloginfo('stylesheet_directory') . '/img/vidicon.png" />'; ?> 
                                        </div> 
                                    </div> 

                                    <div id="cdtext"> <?php the_content(); ?> 
                                    </div> 
                                </div> 

                                <div id="vstrong"> <strong> 

                                        <div id="date"> <?php echo get_the_date(); ?>
                                        </div> 

                                        <div id="midv2"> | 
                                        </div> written by <?php the_author_posts_link(); ?> </strong> 
                                </div> 
                            </div> 

                            <div id="commenthead" <?php echo 'class="' . $ct . '"' ?> rel="news"> 

                                <div id="loadbox3">
                                </div> <?php
                                global $withcomments;
                                $withcomments = 1;
                                comments_template('/comments.php', true);
                                ?> 
                            </div> </a> </li> <?php endwhile; ?> <?php wp_reset_query(); ?> 
            </ul> <?php if (get_theme_mod('newp') > 1 && $loop1->post_count > 1) { ?> <a id="nc1" class="nc" href="#" onclick="return false;">

                    <div id="p1img"> <img id="thumbimg" class="cthumbimg2" src="<?php bloginfo('template_url'); ?>/img/larr.png"> 
                    </div></a> <a id="nc2" class="nc" href="#" onclick="return false;">

                    <div id="p2img"> <img id="thumbimg" class="cthumbimg2" src="<?php bloginfo('template_url'); ?>/img/rarr.png"> 
                    </div></a> <?php } ?> 
        </div> <?php else : ?> 

        <div id="nopost" style="display: block; margin-top: 200px;"> <h1 id="h3t" style="text-align: center; margin: 0 auto 22px auto;" class="headline">NO POSTS FOUND</h1> 
        </div> <?php endif; ?> 
</div>