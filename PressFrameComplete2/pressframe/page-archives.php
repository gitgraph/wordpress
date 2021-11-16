<?php /* Template Name: Archives */ ?><?php get_header(); ?>

<div id="content" style="box-shadow: none;"> 

    <div class="container"> 

        <div id="main" class="main"> <?php ?> <?php if (have_posts()): ?> <?php $c = 0; ?> 
                <ul id="page"> <?php while (have_posts()): the_post(); ?> <?php $c++; ?> 
                        <li <?php echo 'id="li' . $c . '"' ?> <?php echo 'rel="' . $c . '"' ?> > 

                            <div id="featured" class="featuredc"> <?php the_post_thumbnail(); ?>
                            </div> 

                            <div id="top"> <a id="title" href="<?php the_permalink(); ?>"> <h1> <?php the_title(); ?> </h1></a> 
                            </div> 

                            <div id="text"> <?php the_content(); ?>
                            </div> 

                            <div id="archives"> 

                                <div class="archive_list"> <h3 class="titles"><?php _e('Archives by category'); ?></h3> 
                                    <ul> <?php wp_list_categories(array('feed' => __('RSS', 'pressframe'), 'show_count' => true, 'use_desc_for_title' => false, 'title_li' => false)); ?> 
                                    </ul> 
                                </div> 

                                <div class="archive_list"> <h3 class="titles"><?php _e('Archives by month'); ?></h3> 
                                    <ul> <?php wp_get_archives(array('show_post_count' => true, 'type' => 'monthly')); ?> 
                                    </ul> 
                                </div> 
                            </div> </li> <?php endwhile; ?> 
                </ul> <?php endif; ?> 
        </div> <?php get_sidebar(); ?> <?php get_footer(); ?>