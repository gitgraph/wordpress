<?php /* Template Name: Contact */ ?><?php
$emsg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ((!filter_var($_POST['message_email'], FILTER_VALIDATE_EMAIL))) {
        $emsg = "

<p>Email address invalid</p>";
    } else {
        if (empty($_POST['message_name']) || empty($_POST['message_text'])) {
            $emsg = "

<p>Please supply all information</p>";
        } else {
            $sent = mail(get_option('admin_email'), "Someone sent a message from " . get_bloginfo('name'), $_POST['message_text'], 'From: ' . $_POST['message_email'] . "\r\n" . 'Reply-To: ' . $_POST['message_email'] . "\r\n");
            if ($sent) {
                $emsg = "

<p>Thanks! Your message has been sent</p>";
            } else {
                $emsg = "

<p>Message was not sent. Try Again</p>";
            }
        }
    }
}
?> <?php get_header(); ?>

<div id="content" style="box-shadow: none;"> 

    <div class="container"> 

        <div id="main" class="main"> <?php if (have_posts()): ?> <?php $c = 0; ?> 
                <ul id="page"> <?php while (have_posts()): the_post(); ?> <?php $c++; ?> 
                        <li <?php echo 'id="li' . $c . '"' ?> <?php echo 'rel="' . $c . '"' ?> > 

                            <div id="featured" class="featuredc"> <?php the_post_thumbnail(); ?>
                            </div> 

                            <div id="top"> <a id="title" href="<?php the_permalink(); ?>"> <h1> <?php the_title(); ?> </h1></a> 
                            </div> 

                            <div class="text"> <?php the_content(); ?>
                            </div> 

                            <div id="sendmail"> 

                                <div id="error"><?php echo $emsg; ?>
                                </div> 

                                <form action="<?php the_permalink(); ?>" method="post" class="contactform"> 

                                    <p> 
                                        <input type="text" placeholder="Name" name="message_name" value="<?php
                                        if (isset($_POST['message_name'])) {
                                            echo $_POST['message_name'];
                                        }
                                        ?>" /> </p> 

                                    <p> 
                                        <input type="text" placeholder="Email" name="message_email" value="<?php
                                        if (isset($_POST['message_email'])) {
                                            echo $_POST['message_email'];
                                        }
                                        ?>" /> </p> 

                                    <p> 
                                        <textarea type="text" placeholder="Message" cols="58" rows="10" name="message_text" > <?php
                                            if (isset($_POST['message_text'])) {
                                                if (function_exists('stripslashes')) {
                                                    echo stripslashes($_POST['message_text']);
                                                } else {
                                                    echo $_POST['message_text'];
                                                }
                                            }
                                            ?> 
                                        </textarea> </p> 

                                    <p> 
                                        <input type="hidden" name="submitted" value="1"/> </p> 

                                    <p> 
                                        <input type="submit" id="esend" title="Send" class="sendcontact"/> </p> 
                                </form> 
                            </div> </li> <?php endwhile; ?> 
                </ul> <?php endif; ?> 
        </div> <?php get_sidebar(); ?> <?php get_footer(); ?>