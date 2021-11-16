 

<div id="mblog"> <?php if (is_category()) { ?> 

    <div id="jbox"> <?php single_tag_title(); ?> 
    </div><?php } ?> <?php if (is_date()) { ?> 

    <div id="jbox"> <?php single_month_title(' '); ?> 
    </div><?php } ?> <?php
    $pppp = get_option('posts_per_page');
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args0 = array('posts_per_page' => $pppp, 'paged' => $paged);
    $loop0 = new WP_Query($args0);
    ?> <?php $ct = 0; ?> <?php if (have_posts()) : ?> 
        <ul id="ulblog" class="blogb"> <?php while (have_posts()) : the_post(); ?> <?php $ct++; ?> 
                <li <?php echo 'id="liblog' . $ct . '"' ?> class="liblog"> 

                    <div id="btext"> <h3 id="h3t"> <a id="plinkhd" class="plinkhdc" href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h3> 

                        <div id="bcat"> 

                            <div id="catlist"> <?php echo get_the_category_list(' '); ?> 
                            </div> 

                            <div id="midv"> | 
                            </div> 

                            <div id="taglist"> <?php echo get_the_tag_list(' ', ' '); ?> 
                            </div> 
                        </div> 

                        <div class="cimgspost" <?php echo 'id="imgspost' . $ct . '"' ?>> 
                        </div> <?php the_content(); ?> 
                    </div> 

                    <div id="bcommenthead"> <strong> 

                            <div id="date"> <?php echo get_the_date(); ?>
                            </div> 

                            <div id="midv2"> | 
                            </div> written by <?php the_author_posts_link(); ?> </strong> <?php
                        global $withcomments;
                        $withcomments = 1;
                        comments_template('/comments.php', true);
                        ?> <a id="lrp" href="<?php the_permalink(); ?>" > Leave a reply </a> 
                    </div> </li> <?php endwhile; ?> <?php wp_reset_query(); ?> 
        </ul> <?php echo postpag(); ?> <?php else : ?> 

        <div id="nopost"> <h1 id="h3t" style="text-align: center; margin: 0 auto 22px auto;" class="headline">NO POSTS FOUND</h1> 
        </div> <?php endif; ?> 
</div> 