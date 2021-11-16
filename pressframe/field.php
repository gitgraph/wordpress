 

<div id="mblogf"> <?php $fhd = ''; ?> <?php if (get_theme_mod('fhd')) { ?> <?php $fhd = get_theme_mod('fhd'); ?> <?php } ?> <h1 id="h1t" class="headline"><?php echo $fhd; ?></h1> <?php
    $ct = 0;
    $pppf = 30;
    ?> <?php
    $pagedf = (get_query_var('page')) ? get_query_var('page') : 1;
    $args1f = array('posts_per_page' => $pppf, 'paged' => $pagedf);
    $loop1 = new WP_Query($args1f);
    ?> <?php if ($loop1->have_posts()) : ?> 
        <ul id="ulblogf"> <?php while ($loop1->have_posts()) : $loop1->the_post(); ?> <?php $ct++; ?> 
                <li <?php echo 'id="liblogf' . $ct . '"' ?> class="liblogf"> 

                    <div class="cimgspostf" <?php echo 'id="imgspostf' . $ct . '"' ?>> 

                        <div id="viewbvid"> <?php echo '<img src="' . get_bloginfo('stylesheet_directory') . '/img/vidicon.png" />'; ?> 
                        </div> 
                    </div> 

                    <div id="btextf" class="cbtextf"> <a id="plink" href="<?php the_permalink(); ?>"> 

                            <div id="plinkimg" class="pimgc"> 
                            </div> </a> <h3 id="h3t"><?php the_title(); ?></h3> 

                        <div id="tcontent"> 

                            <div id="bcatf"> 

                                <div id="catlist"> <?php echo get_the_category_list(' '); ?> 
                                </div> 

                                <div id="midv"> | 
                                </div> 

                                <div id="taglist"> <?php echo get_the_tag_list(' ', ' '); ?> 
                                </div> 
                            </div> <?php the_content(); ?> 
                        </div> 
                    </div> 

                    <div id="btextf2"> 
                    </div> </li> <?php endwhile; ?> <?php wp_reset_query(); ?> 
        </ul> 

        <div id="loadbox"> 
        </div> <?php else : ?> 

        <div id="nopost" style="display: block;"> <h1 id="h3t" style="text-align: center; margin: 0 auto 22px auto;" class="headline">NO POSTS FOUND</h1> 
        </div> <?php endif; ?> <?php
    $maxf = $loop1->max_num_pages;
    echo pagecount($maxf);
    ?> 

    <div id="loadm"> <a href="#" onclick="return null;"> </a> 

        <div id="pdivh"> 

            <p>Load More</p> 

            <div id="drh"> 

                <div id="dr1" class="dr">
                </div> 

                <div id="dr2" class="dr">
                </div> 

                <div id="dr3" class="dr">
                </div> 
            </div> 
        </div> 
    </div> 
</div> 