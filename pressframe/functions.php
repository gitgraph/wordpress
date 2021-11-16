<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$uh3 = 1;
$_SESSION['filename'] = $uh3;
$_SESSION['a4set'] = null;
add_action('wp_head', 'ubrowser');

function ubrowser() {
    $pregsrc = $_SERVER['HTTP_USER_AGENT'];
    $ub = 'def';
    if (preg_match('/MSIE/i', $pregsrc)) {
        $ub = "ie";
    } elseif (preg_match('/Firefox/i', $pregsrc)) {
        $ub = "firefox";
    } elseif (preg_match('/Safari/i', $pregsrc)) {
        $ub = "safari";
        if (preg_match('/Chrome/i', $pregsrc)) {
            $ub = "chrome";
        }
    } elseif (preg_match('/Chrome/i', $pregsrc)) {
        $ub = "chrome";
    } elseif (preg_match('/Flock/i', $pregsrc)) {
        $ub = "flock";
    } elseif (preg_match('/Opera/i', $pregsrc)) {
        $ub = "opera";
    }
    ?> 

    <script type='text/javascript'> _browser = <?php echo json_encode($ub); ?>;
        _agent = <?php echo json_encode($pregsrc); ?>;

    </script> <?php
    $_SESSION['browser'] = $ub;
}

function im_admin() {
    if (current_user_can('manage_options')) {
        ?> 

        <script type='text/javascript'> _admin = '1';

        </script> <?php } else { ?> 

        <script type='text/javascript'> _admin = '0';

        </script> <?php
    }
}

add_action('wp_head', 'im_admin');
add_theme_support('post-thumbnails');
register_sidebar(array('name' => __('Footer Widgets'), 'id' => 'widgets', 'description' => 'Add widgets here'));
register_sidebar(array('name' => __('Sidebar Widgets'), 'id' => 'sidebar', 'description' => 'Add widgets here'));
add_action('get_header', 'filter_head');

function filter_head() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

function ajaxComment($comment_ID, $comment_status) {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $comment = get_comment($comment_ID);
        wp_notify_postauthor($comment_ID, $comment->comment_type);
        $commentContent = getCommentHTML($comment);
        die($commentContent);
    }
}

add_action('comment_post', 'ajaxComment', 20, 2);
if (function_exists('register_nav_menus')) {
    register_nav_menu('home', __('Home Menu', 'pressframe'));


}class m_walker extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent

<ul id=\"submenu\">\n";
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent

</ul>\n";
    }

    private $idx = 20;
    private $tm = 0;
    private $sm = 0;

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        global $wp_query;
        $indent = ( $depth ) ? str_repeat("\t", $depth) : '';
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        if ($depth == 0) {
            $this->tm++;
            $this->idx = 15 * $this->tm;
            $this->sm = 0;
            $output .= $indent . '

<li class="mli" style="left:0%;" id="li' . $this->tm . '"' . $value . $class_names . '>';
            if (has_post_thumbnail($item->object_id)) {
                $thumb_id = get_post_thumbnail_id($item->object_id);
                $thumb_url = wp_get_attachment_image_src($thumb_id, true);
                $thumbnail = '



<div class="gimg"><img id="thumbimg" class="cthumbimg2" src="' . $thumb_url[0] . '" />

</div>';
            } else {
                $thumbnail = '



<div class="gimg"><img id="thumbimg" class="cthumbimg2" src="' . get_template_directory_uri() . '/img/nowh.png" />

</div>';
            }
        } else {
            if ($depth == 1) {
                $this->sm++;
                $output .= $indent . '

<li class="csub" id="sb' . $this->sm . '"' . $value . $class_names . '>';
            } else if ($depth > 1) {
                $output .= $indent . '

<li class="csub" id="sb99"' . $value . $class_names . '>';
            }
        } $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .=!empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .=!empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .=!empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $prepend = '<strong>';
        $append = '</strong>';
        $description = !empty($item->description) ? '



<span>' . esc_attr($item->description) . '

</span>' : '';
        if ($depth != 0) {
            $description = $append = $prepend = "";
        } $item_output = $args->before;
        if ($depth == 0) {
            if ($item->attr_title === 'atitle') {
                $_SESSION['a4set'] = 1;
            } $item_output .= '



<div class="hbox"><h2 id="ht"> 



<div class="dragme">

</div>' . $args->link_before . $prepend . apply_filters('the_title', $item->title, $item->ID) . $append . '</h2>

</div>';
            $item_output .= $thumbnail;
            $item_output .= '



<div class="dragme" >

</div>';
        } else {
            $item_output .= '



<div class="hbox2"><h2 id="ht">' . $args->link_before . $prepend . apply_filters('the_title', $item->title, $item->ID) . $append . '</h2>

</div>';
        } if ($depth == 0) {
            $item_output .= '<a class="hmu" id="' . $this->tm . ' " ' . $attributes . '>';
        } else {
            $item_output .= '<a id="' . $this->tm . ' " ' . $attributes . '>';
        } $item_output .= $description . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

}

add_action('add_meta_boxes', 'create_metabox');
add_action('save_post', 'save_meta', 1, 2);

function create_metabox() {
    add_meta_box('c_metabox', __('Image Slider Featured', 'pressframe'), 'c_metabox', 'post', 'side', 'low');
}

function c_metabox() {
    global $post;
    $check = get_post_meta($post->ID, '_m_post_location', true);
    ?> 



    <p> 

        <input type="checkbox" name="post_location" <?php checked($check, 'on'); ?> /> 

        <label> <?php echo __('Image Slider', 'pressframe') ?>

        </label> </p><?php
}

function save_meta($post_id) {
    $chk = isset($_POST['post_location']) ? 'on' : 'off';
    update_post_meta($post_id, '_m_post_location', $chk);
}

function postpag() {
    global $wp_query;
    global $dc;
    $dc = -1;
    global $log;
    $log = 0;
    if (is_singular()) {
        return;
    } if ($wp_query->max_num_pages <= 1) {
        return;
    } $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);
    if ($paged >= 1) {
        $links[] = $paged;
    } if ($paged >= 3) {
        $log = 1;
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    } if (( $paged + 2 ) <= $max) {
        $log = 2;
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    } echo '



<div id="pagination">

<ul>' . "\n";
    if (get_previous_posts_link()) {
        printf('

<li>%s</li>' . "\n", get_previous_posts_link());
    } if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf('

<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');
        if (!in_array(2, $links)) {
            $log = 3;
            echo '

<li>…</li>';
        }
    } sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('

<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    } if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links)) {
            echo '

<li>…</li>' . "\n";
        } $class = $paged == $max ? ' class="active"' : '';
        printf('

<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    } if (get_next_posts_link()) {
        printf('

<li>%s</li>' . "\n", get_next_posts_link());
    } echo '

</ul>

</div>' . "\n";
}

function blogpag() {
    global $wp_query;
    global $dc;
    $dc = -1;
    global $log;
    $log = 0;
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);
    if ($paged >= 1) {
        $links[] = $paged;
    } if ($paged >= 3) {
        $log = 1;
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    } if (( $paged + 2 ) <= $max) {
        $log = 2;
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    } echo '



<div id="pagination">

<ul>' . "\n";
    if (get_previous_posts_link()) {
        printf('

<li>%s</li>' . "\n", get_previous_posts_link());
    } if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf('

<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');
        if (!in_array(2, $links)) {
            $log = 3;
            echo '

<li>…</li>';
        }
    } sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('

<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    } if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links)) {
            echo '

<li>…</li>' . "\n";
        } $class = $paged == $max ? ' class="active"' : '';
        printf('

<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    } if (get_next_posts_link()) {
        printf('

<li>%s</li>' . "\n", get_next_posts_link());
    } echo '

</ul>

</div>' . "\n";
}

function pagecount($max) {
    global $wp_query;
    $paged = ( get_query_var('page') > 1 ) ? get_query_var('page') : 1;
    ?> 

    <script type='text/javascript'> vpaged = <?php echo json_encode($paged); ?>;
        vmax = <?php echo json_encode($max); ?>;
        _vflink = <?php echo json_encode(next_posts($max, false)); ?>;

    </script> <?php
}

add_action('customize_register', 'cstart');

function cstart($wpc) {
    $wpc->add_section('sec1', array('title' => __('Typography', 'pressframe'), 'priority' => 30,));
    $wpc->add_setting('ff', array('default' => 'Helvetica',));
    $wpc->add_control(new WP_Customize_Control($wpc, 'ff', array('label' => __('Font Family', 'pressframe'), 'section' => 'sec1', 'settings' => 'ff', 'type' => 'select', 'choices' => array('Abel' => 'Abel', 'Oswald' => 'Oswald', 'Terminal Dosis' => 'Terminal Dosis', 'PT Serif' => 'PT Serif', 'Bitter' => 'Bitter', 'Georgia' => 'Georgia', 'Droid Serif' => 'Droid Serif', 'Helvetica' => 'Helvetica', 'Istok Web' => 'Istok Web', 'Arial' => 'Arial', 'Verdana' => 'Verdana', 'Lucida Sans Unicode' => 'Lucida Sans Unicode', 'Droid Sans' => 'Droid Sans', 'Lato' => 'Lato', 'Lobster' => 'Lobster', 'Roboto' => 'Roboto'), 'priority' => 1)));
    $wpc->add_setting('fs', array('default' => '16',));
    $wpc->add_control(new WP_Customize_Control($wpc, 'fs', array('label' => __('Font Size', 'pressframe'), 'section' => 'sec1', 'settings' => 'fs', 'type' => 'select', 'choices' => array('18' => '18', '17' => '17', '16' => '16', '15' => '15', '14' => '14', '13' => '13', '12' => '12'), 'priority' => 2)));
    $wpc->add_section('sec2', array('title' => __('Main Settings', 'pressframe'), 'priority' => 31));
    $wpc->add_setting('hbrdcolor', array('default' => '#8D8D8D',));
    $wpc->add_control(new WP_Customize_Color_Control($wpc, 'hbrdcolor', array('label' => __('Header Border Color', 'pressframe'), 'section' => 'sec2', 'settings' => 'hbrdcolor', 'priority' => 1)));
    $wpc->add_setting('nohbrd', array('default' => true));
    $wpc->add_control(new WP_Customize_Control($wpc, 'nohbrd', array('label' => __('Header Border', 'pressframe'), 'section' => 'sec2', 'settings' => 'nohbrd', 'type' => 'checkbox', 'priority' => 2)));
    $wpc->add_setting('mlsh', array('default' => true));
    $wpc->add_control(new WP_Customize_Control($wpc, 'mlsh', array('label' => __('Menu Line Shadow', 'pressframe'), 'section' => 'sec2', 'settings' => 'mlsh', 'type' => 'checkbox', 'priority' => 3)));
    $wpc->add_setting('mlbrd', array('default' => true));
    $wpc->add_control(new WP_Customize_Control($wpc, 'mlbrd', array('label' => __('Menu Line Border', 'pressframe'), 'section' => 'sec2', 'settings' => 'mlbrd', 'type' => 'checkbox', 'priority' => 4)));
    $wpc->add_section('sec3', array('title' => __('Header', 'pressframe'), 'priority' => 32));
    $wpc->add_setting('hset', array('default' => '1'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'hset', array('label' => __('Header Logo', 'pressframe'), 'section' => 'sec3', 'settings' => 'hset', 'type' => 'radio', 'choices' => array('1' => 'Text', '2' => 'Image', '3' => 'None'), 'priority' => 1)));
    $wpc->add_setting('hdtcolor', array('default' => '#fff',));
    $wpc->add_control(new WP_Customize_Color_Control($wpc, 'hdtcolor', array('label' => __('Header Text Color', 'pressframe'), 'section' => 'sec3', 'settings' => 'hdtcolor', 'priority' => 2)));
    $wpc->add_setting('imgb', array('default' => ''));
    $wpc->add_control(new WP_Customize_Image_Control($wpc, 'imgb', array('label' => __('Logo Image (250 x 130)', 'pressframe'), 'section' => 'sec3', 'settings' => 'imgb', 'priority' => 3)));
    $wpc->add_setting('hbcolor', array('default' => '#181c26'));
    $wpc->add_control(new WP_Customize_Color_Control($wpc, 'hbcolor', array('label' => __('Header Background Color', 'pressframe'), 'section' => 'sec3', 'settings' => 'hbcolor', 'priority' => 4)));
    $wpc->add_setting('headbg', array('default' => ''));
    $wpc->add_control(new WP_Customize_Image_Control($wpc, 'headbg', array('label' => __('Header Background', 'pressframe'), 'section' => 'sec3', 'settings' => 'headbg', 'priority' => 5)));
    $wpc->add_setting('headimgs', array('default' => 'auto',));
    $wpc->add_control(new WP_Customize_Control($wpc, 'headimgs', array('label' => __('Header Background Size', 'anewtheme'), 'section' => 'sec3', 'settings' => 'headimgs', 'type' => 'radio', 'choices' => array('auto' => 'Auto', '100% 100%' => '100%'), 'priority' => 6)));
    $wpc->add_setting('headimgr', array('default' => 'repeat',));
    $wpc->add_control(new WP_Customize_Control($wpc, 'headimgr', array('label' => __('Header Background Repeat', 'anewtheme'), 'section' => 'sec3', 'settings' => 'headimgr', 'type' => 'radio', 'choices' => array('repeat' => 'Repeat', 'no-repeat' => 'No-repeat', 'repeat-x' => 'Repeat-x', 'repeat-y' => 'Repeat-y'), 'priority' => 7)));
    $wpc->add_section('sec4', array('title' => __('Top', 'pressframe'), 'priority' => 33));
    $wpc->add_setting('tset', array('default' => '1'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'tset', array('label' => __('Top Section', 'pressframe'), 'section' => 'sec4', 'settings' => 'tset', 'type' => 'select', 'choices' => array('1' => 'News', '2' => 'Image', '3' => 'Image Slider', '4' => 'FieldFeed', '5' => 'None'), 'priority' => 1)));
    $wpc->add_section('sec5', array('title' => __('Home Page', 'pressframe'), 'priority' => 34));
    $wpc->add_setting('hmset1', array('default' => '1'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'hmset1', array('label' => __('Section One', 'pressframe'), 'section' => 'sec5', 'settings' => 'hmset1', 'type' => 'select', 'choices' => array('1' => 'Image Slider', '2' => 'News', '3' => 'FieldFeed', '4' => 'None'), 'priority' => 1)));
    $wpc->add_setting('hmset2', array('default' => '3'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'hmset2', array('label' => __('Section Two', 'pressframe'), 'section' => 'sec5', 'settings' => 'hmset2', 'type' => 'select', 'choices' => array('1' => 'Image Slider', '2' => 'News', '3' => 'FieldFeed', '4' => 'None'), 'priority' => 2)));
    $wpc->add_section('sec6', array('title' => __('Sidebar', 'pressframe'), 'priority' => 35));
    $wpc->add_setting('hside', array('default' => '5'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'hside', array('label' => __('Sidebar Home Position', 'pressframe'), 'section' => 'sec6', 'settings' => 'hside', 'type' => 'select', 'choices' => array('1' => 'Left', '2' => 'Right', '3' => 'Top', '4' => 'Middle', '5' => 'Bottom', '6' => 'None'), 'priority' => 1)));
    $wpc->add_setting('pside', array('default' => '5'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'pside', array('label' => __('Sidebar Page Position', 'pressframe'), 'section' => 'sec6', 'settings' => 'pside', 'type' => 'select', 'choices' => array('1' => 'Left', '2' => 'Right', '3' => 'Top', '5' => 'Bottom', '6' => 'None'), 'priority' => 2)));
    $wpc->add_setting('sidest', array('default' => '1'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'sidest', array('label' => __('Sidebar Style', 'pressframe'), 'section' => 'sec6', 'settings' => 'sidest', 'type' => 'radio', 'choices' => array('1' => 'Default', '2' => 'Boxed', '3' => 'Boxed-Shadow',), 'priority' => 3)));
    $wpc->add_section('sec7', array('title' => __('News Section', 'pressframe'), 'priority' => 36));
    $wpc->add_setting('nhd', array('default' => 'News'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'nhd', array('label' => __('News Headline', 'pressframe'), 'section' => 'sec7', 'settings' => 'nhd', 'type' => 'text', 'priority' => 1)));
    $wpc->add_setting('nohdn', array('default' => true));
    $wpc->add_control(new WP_Customize_Control($wpc, 'nohdn', array('label' => __('Headline', 'pressframe'), 'section' => 'sec7', 'settings' => 'nohdn', 'type' => 'checkbox', 'priority' => 2)));
    $wpc->add_setting('newb', array('default' => '1'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'newb', array('label' => __('News Style', 'pressframe'), 'section' => 'sec7', 'settings' => 'newb', 'type' => 'radio', 'choices' => array('1' => 'Relief', '2' => 'Flat',), 'priority' => 2)));
    $wpc->add_setting('newp', array('default' => '6'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'newp', array('label' => __('Post per page', 'pressframe'), 'section' => 'sec7', 'settings' => 'newp', 'type' => 'select', 'choices' => array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7), 'priority' => 3)));
    $wpc->add_section('sec8', array('title' => __('Image Slider Section', 'pressframe'), 'priority' => 37));
    $wpc->add_setting('ihd', array('default' => 'Image Slider'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'ihd', array('label' => __('Image Slider Headline', 'pressframe'), 'section' => 'sec8', 'settings' => 'ihd', 'type' => 'text', 'priority' => 1)));
    $wpc->add_setting('nohdi', array('default' => true));
    $wpc->add_control(new WP_Customize_Control($wpc, 'nohdi', array('label' => __('Headline', 'pressframe'), 'section' => 'sec8', 'settings' => 'nohdi', 'type' => 'checkbox', 'priority' => 2)));
    $wpc->add_setting('iss', array('default' => '1'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'iss', array('label' => __('Image Slider Style', 'pressframe'), 'section' => 'sec8', 'settings' => 'iss', 'type' => 'radio', 'choices' => array('1' => 'Boxed', '2' => 'Full Width', '3' => 'Full Width(No Frame)'), 'priority' => 3)));
    $wpc->add_setting('ipc', array('default' => true));
    $wpc->add_control(new WP_Customize_Control($wpc, 'ipc', array('label' => __('Post', 'pressframe'), 'section' => 'sec8', 'settings' => 'ipc', 'type' => 'checkbox', 'priority' => 4)));
    $wpc->add_section('sec9', array('title' => __('FieldFeed Section', 'pressframe'), 'priority' => 38));
    $wpc->add_setting('fhd', array('default' => 'FieldFeed'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'fhd', array('label' => __('FieldFeed Headline', 'pressframe'), 'section' => 'sec9', 'settings' => 'fhd', 'type' => 'text', 'priority' => 1)));
    $wpc->add_setting('nohdf', array('default' => true));
    $wpc->add_control(new WP_Customize_Control($wpc, 'nohdf', array('label' => __('Headline', 'pressframe'), 'section' => 'sec9', 'settings' => 'nohdf', 'type' => 'checkbox', 'priority' => 2)));
    $wpc->add_setting('fieldb', array('default' => '1'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'fieldb', array('label' => __('Field Style', 'pressframe'), 'section' => 'sec9', 'settings' => 'fieldb', 'type' => 'radio', 'choices' => array('1' => 'Relief', '2' => 'Flat',), 'priority' => 3)));
    $wpc->add_section('sec10', array('title' => __('Image Section', 'pressframe'), 'priority' => 39));
    $wpc->add_setting('ihhd', array('default' => 'Welcome'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'ihhd', array('label' => __('Image Headline', 'pressframe'), 'section' => 'sec10', 'settings' => 'ihhd', 'type' => 'text', 'priority' => 1)));
    $wpc->add_setting('nohdit', array('default' => true));
    $wpc->add_control(new WP_Customize_Control($wpc, 'nohdit', array('label' => __('Headline', 'pressframe'), 'section' => 'sec10', 'settings' => 'nohdit', 'type' => 'checkbox', 'priority' => 2)));
    $wpc->add_setting('iff', array('default' => 'Helvetica',));
    $wpc->add_control(new WP_Customize_Control($wpc, 'iff', array('label' => __('Headline Font Family', 'pressframe'), 'section' => 'sec10', 'settings' => 'iff', 'type' => 'select', 'choices' => array('Abel' => 'Abel', 'Oswald' => 'Oswald', 'Terminal Dosis' => 'Terminal Dosis', 'PT Serif' => 'PT Serif', 'Bitter' => 'Bitter', 'Georgia' => 'Georgia', 'Droid Serif' => 'Droid Serif', 'Helvetica' => 'Helvetica', 'Istok Web' => 'Istok Web', 'Arial' => 'Arial', 'Verdana' => 'Verdana', 'Lucida Sans Unicode' => 'Lucida Sans Unicode', 'Droid Sans' => 'Droid Sans'), 'priority' => 3)));
    $wpc->add_setting('ifs', array('default' => '60',));
    $wpc->add_control(new WP_Customize_Control($wpc, 'ifs', array('label' => __('Headline Font Size', 'pressframe'), 'section' => 'sec10', 'settings' => 'ifs', 'type' => 'select', 'choices' => array('40' => '40', '60' => '60', '80' => '80', '100' => '100', '120' => '120', '140' => '140', '160' => '160', '180' => '180'), 'priority' => 4)));
    $wpc->add_setting('ihdfc', array('default' => '#000',));
    $wpc->add_control(new WP_Customize_Color_Control($wpc, 'ihdfc', array('label' => __('Headline Font Color', 'pressframe'), 'section' => 'sec10', 'settings' => 'ihdfc', 'priority' => 5)));
    $wpc->add_setting('its', array('default' => '#B3B3B3',));
    $wpc->add_control(new WP_Customize_Color_Control($wpc, 'its', array('label' => __('Headline Shadow Color', 'pressframe'), 'section' => 'sec10', 'settings' => 'its', 'priority' => 6)));
    $wpc->add_setting('nohdsh', array('default' => true));
    $wpc->add_control(new WP_Customize_Control($wpc, 'nohdsh', array('label' => __('Headline Shadow', 'pressframe'), 'section' => 'sec10', 'settings' => 'nohdsh', 'type' => 'checkbox', 'priority' => 7)));
    $wpc->add_setting('imgbi', array('default' => ''));
    $wpc->add_control(new WP_Customize_Image_Control($wpc, 'imgbi', array('label' => __('Edit Image', 'pressframe'), 'section' => 'sec10', 'settings' => 'imgbi', 'priority' => 8)));
    $wpc->add_setting('imbr', array('default' => '0',));
    $wpc->add_control(new WP_Customize_Control($wpc, 'imbr', array('label' => __('Image Blur', 'pressframe'), 'section' => 'sec10', 'settings' => 'imbr', 'type' => 'select', 'choices' => array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20'), 'priority' => 9)));
    $wpc->add_section('sec11', array('title' => __('Post', 'pressframe'), 'priority' => 40));
    $wpc->add_setting('postb', array('default' => '1'));
    $wpc->add_control(new WP_Customize_Control($wpc, 'postb', array('label' => __('Post Style', 'pressframe'), 'section' => 'sec11', 'settings' => 'postb', 'type' => 'radio', 'choices' => array('1' => 'Relief', '2' => 'Flat',), 'priority' => 1)));
    $wpc->add_section('sec13', array('title' => __('Menu Settings', 'pressframe'), 'priority' => 42));
    $wpc->add_setting('menusc', array('default' => '#2B2B2B',));
    $wpc->add_control(new WP_Customize_Color_Control($wpc, 'menusc', array('label' => __('Submenu Font Color', 'pressframe'), 'section' => 'sec13', 'settings' => 'menusc', 'priority' => 1)));
    $wpc->add_setting('menush', array('default' => true));
    $wpc->add_control(new WP_Customize_Control($wpc, 'menush', array('label' => __('Submenu Text Shadow', 'pressframe'), 'section' => 'sec13', 'settings' => 'menush', 'type' => 'checkbox', 'priority' => 2)));
}

add_action('wp_head', 'a_css');

function a_css() {
    ?> 

    <style type =text/css> <?php if (get_theme_mod('ff')) { ?> #hlogo h1, .headline, .hli>#text>#tbox>#h3t, #ulblog>.liblog>#btext>#h3t, #ulblog>.liblog>#btext>a>#h3t, .cimgli>#btextf3>#h3t, #ulblogf>.liblogf>#btextf>#h3t, .cbtextf3>#tbox>#h3t{ font-family: '<?php echo get_theme_mod('ff'); ?>', serif; } <?php } ?> <?php if (get_theme_mod('fs')) { ?> html { font-size: <?php echo get_theme_mod('fs'); ?>px; } <?php } ?> <?php if (get_theme_mod('hbrdcolor')) { ?> header { border-bottom: 1px solid <?php echo get_theme_mod('hbrdcolor'); ?>; } <?php } ?> <?php if (!get_theme_mod('nohbrd')) { ?> header { border: none; } <?php } ?> <?php if (!get_theme_mod('mlsh')) { ?> #s2 { box-shadow: none; } <?php } ?> <?php if (!get_theme_mod('mlbrd')) { ?> #s2 { border: none; } <?php } ?> <?php if (get_theme_mod('hset')) { ?> <?php if (get_theme_mod('hset') === '1') { ?> #imgt { display: none; } #hlogo { display: inline-block; } <?php } ?> <?php if (get_theme_mod('hset') === '2') { ?> #imgt { display: inline-block; } #hlogo { display: none; } <?php } ?> <?php if (get_theme_mod('hset') === '3') { ?> #imgt { display: none; } #hlogo { display: none; } <?php } ?> <?php } ?> <?php if (get_theme_mod('hdtcolor')) { ?> #hlogo h1, #hlogo p { color: <?php echo get_theme_mod('hdtcolor'); ?>; } <?php } ?> <?php if (get_theme_mod('imgb')) { ?> #imgt { background:url('<?php echo get_theme_mod('imgb'); ?>'); } <?php } ?> <?php if (get_theme_mod('hbcolor')) { ?> #header1 { background: <?php echo get_theme_mod('hbcolor'); ?>; } <?php } ?> <?php if (get_theme_mod('headbg')) { ?> #header1 { background:url('<?php echo get_theme_mod('headbg'); ?>'); } <?php } ?> <?php if (get_theme_mod('headimgs')) { ?> #header1{ background-size:<?php echo get_theme_mod('headimgs'); ?>;} <?php } ?> <?php if (get_theme_mod('headimgr')) { ?> #header1 { background-repeat:<?php echo get_theme_mod('headimgr'); ?>;} <?php } ?>  <?php if (get_theme_mod('hside')) { ?> <?php if (get_theme_mod('hside') === '1') { ?> .home2 #hdmain{ text-align: left; margin: 0px auto 0 auto; width: 96%; margin-left: 2%; } .home2 #hhead{ width: 65%; margin-left: 0; text-align: left; } .home2 #hhead2{ float: left; width: 325px; display: inline-block; } .home #hsec1 { padding: 0px 0; width: 100%; text-align: center; display: inline-block; margin: 0 10px; margin-bottom: 85px; border-bottom: 1px solid #E4E4E4; } .home #hsec2 { padding: 0px 0; width: 100%; text-align: center; display: inline-block; margin: 0 10px; margin-bottom: 85px; border-bottom: 1px solid #E4E4E4; } #hhead2 #hsec3 { background-color: #fff; text-align: right; width: 325px; display: inline-block; border: none; } #hhead2 .asec #swid { text-align: center; width: 100%; margin-top: 12px; } .home .asec #mblogf { margin-top: 0%; width: 100%; } .home .asec #mblogf #ulblogf { text-align: center; } <?php } ?> <?php if (get_theme_mod('hside') === '2') { ?> .home2 #hdmain{ text-align: right; margin: 0px auto 0 auto; width: 96%; margin-left: 2%; } .home2 #hhead{ width: 65%; margin-left: 0; text-align: left; } .home2 #hhead2{ float: right; width: 325px; display: inline-block; } .home #hsec1 { padding: 0px 0; width: 100%; text-align: center; display: inline-block; margin: 0 10px; margin-bottom: 85px; border-bottom: 1px solid #E4E4E4; } .home #hsec2 { padding: 0px 0; width: 100%; text-align: center; display: inline-block; margin: 0 10px; margin-bottom: 85px; border-bottom: 1px solid #E4E4E4; } #hhead2 #hsec3 { background-color: #fff; text-align: right; width: 325px; display: inline-block; border: none; } #hhead2 .asec #swid { text-align: center; width: 100%; margin-top: 12px; } .home .asec #mblogf { margin-top: 0%; width: 100%; } .home .asec #mblogf #ulblogf { text-align: center; } <?php } ?> <?php if (get_theme_mod('hside') === '6') { ?> <?php } ?> <?php } ?> <?php if (get_theme_mod('pside')) { ?> <?php if (get_theme_mod('pside') === '1') { ?> .page2 #hdmain{ text-align: left; margin: 0px auto 0 auto; } .page2 #hhead{ width: 98%; margin-left: 2%; text-align: left; } .page #hsec1 { padding: 0px 0; width: 65%; text-align: left; display: inline-block; margin: 0 10px; } .page #hsec3 { background-color: #fff; text-align: right; width: 325px; display: inline-block; border: none; float: left; } .page .asec #swid { text-align: center; width: 100%; margin-top: 12px; } .page .asec #mblogf { margin-top: 0%; } #mblog{ width: 100%; } <?php } ?> <?php if (get_theme_mod('pside') === '2') { ?> .page2 #hdmain{ text-align: left; margin: 0px auto 0 auto; } .page2 #hhead{ width: 98%; margin-left: 2%; text-align: right; } .page #hsec1 { padding: 0px 0; width: 65%; text-align: left; display: inline-block; margin: 0 10px; } .page #hsec3 { background-color: #fff; text-align: right; width: 325px; display: inline-block; border: none; float: right; } .page .asec #swid { text-align: center; width: 100%; margin-top: 12px; } .page .asec #mblogf { margin-top: 0%; } #mblog{ width: 100%; } <?php } ?> <?php if (get_theme_mod('pside') === '6') { ?> <?php } ?> <?php } ?> <?php if (get_theme_mod('sidest')) { ?> <?php if (get_theme_mod('sidest') === '1') { ?> <?php } ?> <?php if (get_theme_mod('sidest') === '2') { ?> #swid > li { border: 2px solid #222; margin: 20px 15px; } <?php } ?> <?php if (get_theme_mod('sidest') === '3') { ?> #swid > li { border: 2px solid #222; box-shadow: -2px 3px 3px #222; margin: 20px 15px; } <?php } ?> <?php } ?> <?php if (!get_theme_mod('nohdn')) { ?> #hdiv>#hdtext>#hdrtext>.headline{ display: none; } <?php } ?> <?php if (get_theme_mod('newb')) { ?> <?php if (get_theme_mod('newb') === '1') { ?> <?php } ?> <?php if (get_theme_mod('newb') === '2') { ?> .hli{ box-shadow: 0px 0px 3px #BDBDBD; } .hli #text2{ box-shadow: none; } <?php } ?> <?php } ?> <?php if (!get_theme_mod('nohdi')) { ?> #hdrtextis>.headline{ display: none; } <?php } ?> <?php if (get_theme_mod('iss')) { ?> <?php if (get_theme_mod('iss') === '1') { ?> <?php } ?> <?php if (get_theme_mod('iss') === '2') { ?> #imgh2p { width: 100%; } <?php } ?> <?php if (get_theme_mod('iss') === '3') { ?> #imgh2p { width: 100%; border: none; padding: 0; margin: 0; } #hdrtextis{ display: none; } #imgh2p>#imgsthd{ bottom: 0px; top: 8px; opacity: 0.8; } <?php } ?> <?php } ?> <?php if (!get_theme_mod('ipc')) { ?> .cimgli>#btextf3{ display: none; } <?php } ?> <?php if (!get_theme_mod('nohdf')) { ?> #mblogf>.headline{ display: none; } <?php } ?> <?php if (get_theme_mod('fieldb')) { ?> <?php if (get_theme_mod('fieldb') === '1') { ?> <?php } ?> <?php if (get_theme_mod('fieldb') === '2') { ?> #ulblogf .liblogf{ box-shadow: 0px 1px 3px #9B9B9B; } #ulblogf .liblogf>#btextf2{ box-shadow: none; } <?php } ?> <?php } ?> <?php if (!get_theme_mod('nohdit')) { ?> #headimg>#hdbox>#headtext{ display: none; } <?php } ?> <?php if (get_theme_mod('iff')) { ?> #headtext { font-family: '<?php echo get_theme_mod('iff'); ?>', serif; } <?php } ?> <?php if (get_theme_mod('ifs')) { ?> #headtext { font-size: <?php echo get_theme_mod('ifs'); ?>px; } <?php } ?> <?php if (get_theme_mod('ihdfc')) { ?> #headtext { color: <?php echo get_theme_mod('ihdfc'); ?>; } <?php } ?> <?php if (get_theme_mod('its')) { ?> #headtext { text-shadow: 2px 2px 22px <?php echo get_theme_mod('its'); ?>; } <?php } ?> <?php if (!get_theme_mod('nohdsh')) { ?> #headtext { text-shadow: none; } <?php } ?> <?php if (get_theme_mod('imbr')) { ?> #headimg>#himg>img{ -webkit-filter: blur(<?php echo get_theme_mod('imbr'); ?>px); -moz-filter: blur(<?php echo get_theme_mod('imbr'); ?>px); -o-filter: blur(<?php echo get_theme_mod('imbr'); ?>px); -ms-filter: blur(<?php echo get_theme_mod('imbr'); ?>px); filter: blur(<?php echo get_theme_mod('imbr'); ?>px); filter: url('#blur'); } <?php } ?> <?php if (get_theme_mod('postb')) { ?> <?php if (get_theme_mod('postb') === '1') { ?> <?php } ?> <?php if (get_theme_mod('postb') === '2') { ?> #ulblog .liblog{ box-shadow: 0px 1px 4px #9B9B9B; border-left: none; border-bottom: none; } <?php } ?> <?php } ?> <?php if (get_theme_mod('menusc')) { ?> #b1 #bh1{ color: <?php echo get_theme_mod('menusc'); ?>; } #b2 #bh2{ color: <?php echo get_theme_mod('menusc'); ?>; } .mli>#submenu #ht { color: <?php echo get_theme_mod('menusc'); ?>; } <?php } ?> <?php if (!get_theme_mod('menush')) { ?> #b1 #bh1{ text-shadow: none; } #b2 #bh2{ text-shadow: none; } .mli>#submenu #ht { text-shadow: none; } <?php } ?> 

    </style> 

    <script type='text/javascript'> _ipcheck = '0';
        _prelief = '1';

    </script> <?php if (!get_theme_mod('ipc')) { ?> 

        <script type='text/javascript'> _ipcheck = '1';

        </script> <?php } ?> <?php if (get_theme_mod('postb')) { ?> <?php if (get_theme_mod('postb') === '1') { ?> <?php } ?> <?php if (get_theme_mod('postb') === '2') { ?> 

            <script type='text/javascript'> _prelief = '0';

            </script> <?php } ?> <?php } ?> <?php
}

add_action('wp_enqueue_scripts', 'ff_googlefonts');

function ff_googlefonts() {
    if (get_theme_mod('ff')) {
        switch (get_theme_mod('ff')) {
            case 'Abel':wp_enqueue_style('font-abel', 'http://fonts.googleapis.com/css?family=Abel', false, 1.0, 'screen');
                break;
            case 'Oswald':wp_enqueue_style('font-oswald', 'http://fonts.googleapis.com/css?family=Oswald', false, 1.0, 'screen');
                break;
            case 'Terminal Dosis':wp_enqueue_style('font-terminal-dosis', 'http://fonts.googleapis.com/css?family=Terminal+Dosis', false, 1.0, 'screen');
                break;
            case 'Droid Serif':wp_enqueue_style('font-droid-serif', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic', false, 1.0, 'screen');
                break;
            case 'Istok Web':wp_enqueue_style('font-istok-web', 'http://fonts.googleapis.com/css?family=Istok+Web', false, 1.0, 'screen');
                break;
            case 'Droid Sans':wp_enqueue_style('font-droid-sans', 'http://fonts.googleapis.com/css?family=Droid+Sans', false, 1.0, 'screen');
                break;
            case 'Bitter':wp_enqueue_style('font-bitter', 'http://fonts.googleapis.com/css?family=Bitter', false, 1.0, 'screen');
                break;
            case 'Lato':wp_enqueue_style('font-lato', 'http://fonts.googleapis.com/css?family=Lato', false, 1.0, 'screen');
                break;
            case 'Lobster':wp_enqueue_style('font-lobster', 'http://fonts.googleapis.com/css?family=Lobster', false, 1.0, 'screen');
                break;
            case 'Roboto':wp_enqueue_style('font-roboto', 'http://fonts.googleapis.com/css?family=Roboto', false, 1.0, 'screen');
                break;
        }
    }
}
?>