<?php /* Template Name: Contact */ ?><?php
$emsg = '';
if (!$_POST['message_human'] == 0) {
    if ($_POST['message_human'] != 2) {
        $emsg = "

<p>Human verification incorrect.</p>";
    } else {
        if (!filter_var($_POST['message_email'], FILTER_VALIDATE_EMAIL)) {
            $emsg = "

<p>Email Address Invalid.</p>";
        } else {
            if (empty($_POST['message_name']) || empty($_POST['message_text'])) {
                $emsg = "

<p>Please supply all information.</p>";
            } else {
                $sent = mail(get_option('admin_email'), "Someone sent a message from " . get_bloginfo('name'), $_POST['message_text'], 'From: ' . $_POST['message_email'] . "\r\n" . 'Reply-To: ' . $_POST['message_email'] . "\r\n");
                if ($sent) {
                    $emsg = "

<p>Thanks! Your message has been sent.</p>";
                } else {
                    $emsg = "

<p>Message was not sent. Try Again.</p>";
                }
            }
        }
    }
} else if ($_POST['submitted']) {
    $emsg = "

<p>Please supply all information.</p>";
}
?> <?php get_header(); ?><section id="s2" class="section"> 

    <div id="dh1" style="height: 85px;"> <h1>...open</h1> 
    </div> 
    <script type='text/javascript'> open = 'contact';
    </script> 

    <div id="hdiv2" class="page2"> 

        <div id="hdmain"> 

            <div id="hhead" class="page" rel="<?php
            if (get_theme_mod('pside')) {
                echo get_theme_mod('pside');
            }
            ?>"> <?php if (get_theme_mod('pside') === '3') { ?> <section id="hsec3" class="asec"> 

                        <div id="swid" class="widgets"> <?php dynamic_sidebar('sidebar'); ?> 
                        </div> </section> <?php } ?> <section id="hsec1" class="asec" style="padding:0;"> 

                    <div id="mblog" class="pageloc"> <?php if (have_posts()) : ?> 
                            <ul id="ulblog" class="pagec"> <?php while (have_posts()) : the_post(); ?> 
                                    <li id="liblog1" class="liblog"> <h1 id="h3t" style="text-align: center; margin: 0 auto 22px auto;" class="headline"><?php the_title(); ?></h1> 

                                        <div id="btext" style="min-height: 470px; width: 100%;"> 

                                            <div class="cimgspost" <?php echo 'id="imgspost1"' ?>> 
                                            </div> <?php the_content(); ?> 

                                            <div id="respondcontact"> 

                                                <div id="eerror"><?php echo $emsg; ?>
                                                </div> 

                                                <form action="<?php the_permalink(); ?>" method="post" class="contactform"> 
                                                    <ul class="contactform"> 
                                                        <li> 
                                                            <label for="message_name">Name 
                                                            </label> 
                                                            <input type="text" name="message_name" value="<?php
                                                            if (isset($_POST['message_name'])) {
                                                                echo $_POST['message_name'];
                                                            }
                                                            ?>" /> </li> 
                                                        <li> 
                                                            <label for="message_email">Email 
                                                            </label> 
                                                            <input type="text" name="message_email" value="<?php
                                                            if (isset($_POST['message_email'])) {
                                                                echo $_POST['message_email'];
                                                            }
                                                            ?>" /> </li> 
                                                        <li> 
                                                            <label for="message_text">Message 
                                                            </label> 
                                                            <textarea type="text" name="message_text" > <?php
                                                                if (isset($_POST['message_text'])) {
                                                                    if (function_exists('stripslashes')) {
                                                                        echo stripslashes($_POST['message_text']);
                                                                    } else {
                                                                        echo $_POST['message_text'];
                                                                    }
                                                                }
                                                                ?> 
                                                            </textarea> </li> 
                                                        <li> 
                                                            <label for="message_human">Human Verification 
                                                            </label> 
                                                            <input type="text" style="width: 50px;display:inline-block;" name="message_human"/> + 3 = 5 </li> 
                                                        <li> 
                                                            <input type="hidden" name="submitted" value="1"/> </li> 
                                                        <li> 
                                                            <input type="submit" id="esend" title="Send" class="sendcontact"/> </li> 
                                                    </ul> 
                                                </form> 
                                            </div> 
                                        </div> </li> <?php endwhile; ?> 
                            </ul> <?php else : ?> 

                            <div id="nopost" style="display: block;"> <h1 id="h3t" style="text-align: center; margin: 0 auto 22px auto;" class="headline">NO PAGE FOUND</h1> 
                            </div> <?php endif; ?> 
                    </div> </section> <?php if (get_theme_mod('pside') === '5') { ?> <section id="hsec3" class="asec"> 

                        <div id="swid" class="widgets"> <?php dynamic_sidebar('sidebar'); ?> 
                        </div> </section> <?php } ?> <?php if (get_theme_mod('pside') === '1' || get_theme_mod('pside') === '2') { ?> <section id="hsec3" class="asec"> 

                        <div id="swid" class="widgets"> <?php dynamic_sidebar('sidebar'); ?> 
                        </div> </section> <?php } ?> 
            </div> 
        </div> 
    </div> <?php get_footer(); ?> 