 

<div id="hdiv" class="ndiv"> 

    <div class="container" style="position: relative; height:100%;"> 

        <div id="hdivo">

            <div class="hdivoc"> 
            </div> 
        </div> <?php $ct = 0; ?> <?php
        $args1 = array('posts_per_page' => 4, 'post_type' => 'news');
        $loop1 = new WP_Query($args1);
        ?> 

        <div id="news" rel="1"> <?php if ($loop1->have_posts()) : ?> 
                <ul id="newsul" class="1"> <?php while ($loop1->have_posts()) : $loop1->the_post(); ?> <?php $ct++; ?> 
                        <li class="hli" <?php echo 'id="li' . $ct . '"' ?> <?php echo ' rel="' . $ct . '"' ?> > 

                            <div id="nx"> <a <?php echo 'rel="' . $ct . '"' ?> href="#" class="nclose"> <img id="xnimg" src="<?php bloginfo('template_url'); ?>/images/close.png" > </a> 
                            </div> 

                            <div id="tbox"> <h1 id="h3t"><?php the_title(); ?></h1>
                            </div> 

                            <div id="tline">
                            </div> 

                            <div class="cattag"> 

                                <div id="catlist" class="ctstyle"> <?php echo get_the_category_list(' '); ?> 
                                </div> 

                                <div id="midv">
                                </div> 

                                <div id="taglist" class="ctstyle"> <?php echo get_the_tag_list(); ?> 
                                </div> 
                            </div> 

                            <div id="text" class="text"> <?php the_content(); ?> 
                            </div> 

                            <div id="info"> 

                                <div id="author"> 

                                    <div id="date"> <?php echo get_the_date(); ?> 
                                    </div> 

                                    <div id="writer">, written by <?php the_author_posts_link(); ?>
                                    </div> 
                                </div> 

                                <div id="commenthead" style="border:none;float: left;margin: 0;margin: 0px 5px 0 0;"> <a id="lrp" href="<?php the_permalink(); ?>" > 
                                        <ul id="ch">
                                            <li id="c1"><?php comments_number('0', '1', '%'); ?></li>
                                            <li id="c2"></li>
                                        </ul> </a> 
                                </div> 
                            </div> <a <?php echo 'rel="' . $ct . '"' ?> class="nclick" href="#" > </a> <a href="<?php the_permalink(); ?>" class="aclick"> </a> </li> <?php endwhile; ?> <?php wp_reset_query(); ?> 
                </ul> <a id="larrh" class="clarrh" href="#" onclick="return false;"> <img id="laarrh" class="imgarr" src="<?php bloginfo('template_url'); ?>/images/arrow.png"> </a> <a id="rarrh" class="crarrh" href="#" onclick="return false;"> <img id="raarrh" class="imgarr" src="<?php bloginfo('template_url'); ?>/images/arrow.png"> </a> <?php else : ?> <?php endif; ?> 
        </div> 
    </div>
</div>