<?php get_header(); ?>

<div id="content" style="box-shadow: none;"> 

    <div class="container"> 

        <div id="main"class="main"> <?php if (have_posts()): ?> <?php $c = 0; ?> 
                <ul id="index"> <?php while (have_posts()): the_post(); ?> <?php $c++; ?> 
                        <li <?php echo 'id="li' . $c . '"' ?> <?php echo 'rel="' . $c . '"' ?> > 

                            <div id="featured" class="featuredc"> <?php the_post_thumbnail(); ?>
                            </div> 

                            <div id="top"> <a id="title" href="<?php the_permalink(); ?>"> <h1> <?php the_title(); ?> </h1></a> 

                                <div class="cattag"> 

                                    <div id="catlist" class="ctstyle"> <?php echo get_the_category_list(' '); ?> 
                                    </div> 

                                    <div id="midv">
                                    </div> 

                                    <div id="taglist" class="ctstyle"> <?php echo get_the_tag_list(' '); ?> 
                                    </div> 
                                </div> 

                                <div id="date" style="margin: 0;"> <?php echo get_the_date(); ?> written by <?php the_author_posts_link(); ?> 
                                </div> 
                            </div> 

                            <div class="text"> <?php the_content(); ?> 
                            </div> 

                            <div id="commenthead" style="padding: 10px 0px;"> <?php comments_template(); ?> 
                            </div> </li> <?php endwhile; ?> 

                    <div id="pag"> 

                        <div class="pleft"> <?php if (get_next_post_link()): ?> <?php next_post_link('%link', 'Previous post', FALSE); ?> <?php endif; ?> 
                        </div> 

                        <div class="pright"> <?php if (get_previous_post_link()): ?> <?php previous_post_link('%link', 'Next post', FALSE); ?> <?php endif; ?> 
                        </div> 
                    </div> 
                </ul> <?php endif; ?> 
        </div> <?php get_sidebar(); ?> <?php get_footer(); ?>