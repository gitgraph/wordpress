 

<div id="mblog"> <?php $ct = 0; ?> <?php if (have_posts()) : ?> 
    <ul id="ulblog" class="bsingle"> <?php while (have_posts()) : the_post(); ?> <?php $ct++; ?> 
        <li <?php echo 'id="liblog' . $ct . '"' ?> class="liblog" style="min-height: 530px;"> 

            <div id="btext" style="min-height: 670px;" > <h3 id="h3t"><?php the_title(); ?></h3> 

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

                <div id="bstrong"> <strong> 

                        <div id="date"> <?php echo get_the_date(); ?>
                        </div> 

                        <div id="midv2"> | 
                        </div> written by <?php the_author_posts_link(); ?> </strong> 
                </div> 
            </div> 

            <div id="commenthead" <?php echo 'class="' . $ct . '"' ?> rel="single"> 

                <div id="loadbox3">
                </div> <?php
                        global $withcomments;
                        $withcomments = 1;
                        comments_template('/comments.php', true);
                        ?> 
                    </div> </li> <?php endwhile; ?> 
        </ul> <?php else : ?> 

        <div id="nopost"> <h1 id="h3t" style="text-align: center; margin: 0 auto 22px auto;" class="headline">NO POSTS FOUND</h1> 
        </div> <?php endif; ?> <?php echo postpag(); ?> 
</div> 