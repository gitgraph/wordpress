<?php if (comments_open()) : ?> <a href="<?php the_permalink(); ?>"> <h4 id="rpb" class="comments"><?php comments_number('No Responses', 'One Response', '% Responses'); ?>

            <div id="midv3"> | 
            </div></h4> </a> <h4 id="rps" class="comments"><?php comments_number('No Responses', 'One Response', '% Responses'); ?> </h4> 
    <ul id="commentlist"><?php wp_list_comments(); ?>
    </ul><?php else : ?> <?php if (!comments_open()) : ?> <h4 id="rps" class="comments">Comments are closed</h4><?php endif; ?><?php endif; ?> <?php if (comments_open()) : ?> 

    <div id="respond"><h4 id="comments"><?php comment_form_title('Leave a Reply', 'Leave a Reply to %s'); ?></h4>

        <div class="cancel-comment-reply"><small><?php cancel_comment_reply_link(); ?></small>
        </div><?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>

            <p>You must be <a href="<?php echo wp_login_url(get_permalink()); ?>">logged in</a> to post a comment.</p><?php else : ?>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="formcomment" > <?php if (is_user_logged_in()) : ?>

                    <p id="cmp">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p><?php else : ?>

                    <p>
                        <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                        <label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small>
                        </label></p>

                    <p>
                        <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                        <label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small>
                        </label></p>

                    <p>
                        <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
                        <label for="url"><small>Website</small>
                        </label></p><?php endif; ?> 

                <div id="comment-status" >
                </div>

                <p>
                    <textarea name="comment" id="comment" cols="100%" rows="5" tabindex="4">
                    </textarea></p>

                <p>
                    <input name="submit" class="sendr" type="button" rel="<?php the_permalink(); ?>" id="submit" tabindex="5" value="Submit Comment" /><?php comment_id_fields(); ?></p><?php do_action('comment_form', $post->ID); ?>
            </form><?php endif; ?>
    </div><?php endif; ?>