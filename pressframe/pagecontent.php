 

<div id="mblog" class="pageloc"> <?php if (have_posts()) : ?> 
    <ul id="ulblog" class="pagec"> <?php while (have_posts()) : the_post(); ?> 
        <li id="liblog1" class="liblog"> <h1 id="h3t" style="text-align: center; margin: 0 auto 22px auto;" class="headline"><?php the_title(); ?></h1> 

            <div id="btext" style="min-height: 470px; width: 100%; text-align: left;"> 

                <div class="cimgspost" <?php echo 'id="imgspost1"' ?>> 
                </div> <?php the_content(); ?> 
            </div> </li> <?php endwhile; ?> 
    </ul> <?php else : ?> 

    <div id="nopost" style="display: block;"> <h1 id="h3t" style="text-align: center; margin: 0 auto 22px auto;" class="headline">NO PAGE FOUND</h1> 
    </div> <?php endif; ?> 
</div> 