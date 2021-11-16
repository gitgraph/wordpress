<?php $ihd = ''; ?> <?php if (get_theme_mod('ihd')) { ?> <?php $ihd = get_theme_mod('ihd'); ?> <?php } ?> <?php $rel = ''; ?> <?php $class = ''; ?> <?php if (get_theme_mod('iss')) { ?> <?php
    if (get_theme_mod('iss') === '1') {
        $rel = '1';
        ?> <?php } ?> <?php
    if (get_theme_mod('iss') === '2') {
        $rel = '2';
        ?> <?php } ?> <?php
    if (get_theme_mod('iss') === '3') {
        $rel = '3';
        $class = 'fw';
        ?> <?php } ?> <?php } ?> 

<div id="hdrtextis"> <h1 id="h1t" class="headline"><?php echo $ihd; ?></h1>
</div> 

<div id="imgh2p" rel="<?php echo $rel; ?>" class="<?php echo $class; ?>"> 

    <div id="imgh2pp" >
    </div> <?php
    $ct = 0;
    $xi = 45;
    ?> <?php
    $args3 = array('posts_per_page' => 6, 'meta_key' => '_m_post_location', 'meta_value' => 'on');
    $loop3 = new WP_Query($args3);
    ?> <?php if ($loop3->have_posts()) : ?> 
        <ul id="imgul2p" class="1"> <?php while ($loop3->have_posts()) : $loop3->the_post(); ?> <?php
                $ct++;
                $xi+=2;
                ?> <?php echo '
<li class="cimgli" id="imgli' . $ct . '">' ?> <?php
                if (has_post_thumbnail()) {
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src($thumb_id, true);
                    echo '<img id="thumbimg" class="cthumbimg2" src="' . $thumb_url[0] . '" />';
                } else {
                    echo '<img src="' . get_bloginfo('stylesheet_directory') . '/img/dimg.png" />';
                }
                ?> 

                <div id="btextf3" class="cbtextf3" style="display: none;"> <a id="bcac" href="<?php the_permalink(); ?>" class="bta"></a> 

                    <div id="tbox"> <h3 id="h3t"><?php the_title(); ?></h3> 
                    </div> 

                    <div id="tline"> 
                    </div> 

                    <div id="bcatf"> 

                        <div id="catlist"> <?php echo get_the_category_list(' '); ?> 
                        </div> 

                        <div id="midv"> | 
                        </div> 

                        <div id="taglist"> <?php echo get_the_tag_list(' ', ' '); ?> 
                        </div> 
                    </div> 

                    <div id="btextf23"> 

                        <div class="cimgspost" <?php echo 'id="imgsblock' . $ct . '"' ?>> 

                            <div id="viewb"> <?php echo '<img src="' . get_bloginfo('stylesheet_directory') . '/img/deficon.png" />'; ?> 
                            </div> 

                            <div id="viewbvid"> <?php echo '<img src="' . get_bloginfo('stylesheet_directory') . '/img/vidicon.png" />'; ?> 
                            </div> 
                        </div> 

                        <div id="cdtext"> <?php the_content(); ?> 
                        </div> 
                    </div> 
                </div> <?php echo '</li>' ?> <?php echo '

<div class="imgstc" id="imgst' . $ct . '"> 
</div>' ?> <?php endwhile; ?> <?php wp_reset_query(); ?> 
        </ul> <?php if ($loop3->post_count > 1) { ?> <a id="2p" class="p1" name="fd" href="#" onclick="return false;">

                <div id="p1img" style="transform-origin: 0% 50%"> <img id="thumbimg" class="cthumbimg2" src="<?php bloginfo('template_url'); ?>/img/larr.png"> 
                </div></a> <a id="2p" class="p2" name="fd" href="#" onclick="return false;">

                <div id="p2img" style="transform-origin: 100% 50%"> <img id="thumbimg" class="cthumbimg2" src="<?php bloginfo('template_url'); ?>/img/rarr.png"> 
                </div></a> 

            <div id="imgsthd" style="bottom:15px;"> 

                <div id="imgsth" > 
                </div> 
            </div> <?php } ?> 
        <script type='text/javascript'> imgrr = 'i0';
        </script> <?php else: ?> 
        <script type='text/javascript'> imgrr = 'i1';
        </script> <?php endif; ?> 
</div> 