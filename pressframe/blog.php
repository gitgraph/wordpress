 

<div id="mblog"> <?php
    $ct = 0;
    $pp = 4;
    ?> <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args1 = array('posts_per_page' => $pp, 'paged' => $paged);
    $loop1 = new WP_Query($args1);
    ?> <?php if ($loop1->have_posts()) : ?> 
        <ul id="ulblog" class="blogb"> <?php while ($loop1->have_posts()) : $loop1->the_post(); ?> <?php $ct++; ?> 
                <li <?php echo 'id="liblog' . $ct . '"' ?> class="liblog"> 

                    <div id="btext" > <h3 id="h3t"> <a id="plinkhd" class="plinkhdc" href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h3> 

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
                        ?> <a id="lrp" href="<?php the_permalink(); ?>"> Leave a reply </a> 
                    </div> </li> <?php endwhile; ?> <?php wp_reset_query(); ?> 
        </ul> <?php
        $wp_query->max_num_pages = $loop1->max_num_pages;
        echo blogpag();
        ?> <?php else : ?> 

        <div id="nopost" style="display: block;"> <h1 id="h3t" style="text-align: center; margin: 0 auto 22px auto;" class="headline">NO POSTS FOUND</h1> 
        </div> <?php endif; ?> 
</div> 