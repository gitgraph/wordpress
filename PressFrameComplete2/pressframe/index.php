<?php get_header(); ?><?php get_template_part('news') ?>

<div id="content" style="box-shadow: 0px -1px 6px #D8D8D8;"> 

    <div class="container"> 

        <div id="main" class="main"> <?php if (have_posts()): ?> <?php $c = 0; ?> 
                <ul id="index"> <?php while (have_posts()): the_post(); ?> <?php $c++; ?> 
                        <li <?php echo 'id="li' . $c . '"' ?> <?php echo 'rel="' . $c . '"' ?> > 

                            <div id="featured" class="featuredc"> <?php the_post_thumbnail(); ?>
                            </div> 

                            <div id="top"> <a id="title" href="<?php the_permalink(); ?>"><h1> <?php the_title(); ?> </h1></a> 

                                <div class="cattag"> 

                                    <div id="catlist" class="ctstyle"> <?php echo get_the_category_list(' '); ?> 
                                    </div> 

                                    <div id="midv">
                                    </div> 

                                    <div id="taglist" class="ctstyle"> <?php echo get_the_tag_list(' '); ?> 
                                    </div> 
                                </div> 

                                <div class="info"> 

                                    <div id="commenthead" style="border:none;float: left;height: 25px;margin: 0;margin: 0px 5px 0 0;"> <a id="lrp" href="<?php the_permalink(); ?>" > 
                                            <ul id="ch">
                                                <li id="c1"><?php comments_number('0', '1', '%'); ?></li>
                                                <li id="c2"></li>
                                            </ul> </a> 
                                    </div> 

                                    <div id="date" style="float:left;"> <?php echo get_the_date(); ?> written by <?php the_author_posts_link(); ?> 
                                    </div> 
                                </div> 
                            </div> 

                            <div class="text"> <?php the_content(); ?> 
                            </div> </li> <?php endwhile; ?> 

                    <div id="pag"> 

                        <div class="pleft"> <?php if (get_previous_posts_link()): ?> <?php previous_posts_link(__('Newer posts', 'times')); ?> <?php endif; ?> 
                        </div> 

                        <div class="pright"> <?php if (get_next_posts_link()): ?> <?php next_posts_link(__('Older posts', 'times')); ?> <?php endif; ?> 
                        </div> 
                    </div> 
                </ul> <?php else : ?> <?php endif; ?> 
        </div> <?php get_sidebar(); ?> <?php get_footer(); ?>