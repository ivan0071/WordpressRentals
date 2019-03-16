<?php defined('ABSPATH') or die('No script kiddies please!'); ?>
<?php

function m2a_getMessageBoxHTML()
{
    ob_start();
    require M2A__PLUGIN_DIR . '/templates/messagebox.php';
    $messagebox = ob_get_contents();
    ob_end_clean();
    return $messagebox;
}

function m2a_getPopupHTML()
{
    add_thickbox();
    ob_start();
    require M2A__PLUGIN_DIR . '/templates/popup.php';
    $messagebox = ob_get_contents();
    ob_end_clean();
    return $messagebox;
}

function m2a_sendemail($to, $subject, $message, $usermail = 0, $post_id)
{
    $post_title = get_the_title($post_id);
    $site_name = get_bloginfo('url');
    if ($usermail) {
        $message = "You have a message from {$usermail}<br/>  Subject: {$subject}<br/>Message: {$message}  -<a href='{$site_name}'>{$site_name}</a>";
    } else {
        $message = "You sent message successfully<br/>  Subject: {$subject}<br/>Message: {$message}<br/> -<a href='{$site_name}'>{$site_name}</a>";
    }
    $subject = "Message on {$post_title}";
    wp_mail($to, $subject, $message, array('Content-Type: text/html; charset=UTF-8'));
}

function m2a_aftercontent()
{
    $m2a_setting = get_option('m2a_settings');
    if (isset($m2a_setting['aftercontent']) && $m2a_setting['aftercontent'] == 1) {
        if ((!isset($m2a_setting['nonuser'])) || ($m2a_setting['nonuser'] == 1 && is_user_logged_in())) {

            function m2a_messagebox($content)
            {
                $m2a_setting = get_option('m2a_settings');
                if (is_single()) {
                    if ($m2a_setting['showas'] == 'messagebox')
                        return $content . m2a_getMessageBoxHTML();
                    else
                        return $content . m2a_getPopupHTML();
                }
            }

            add_filter('the_content', 'm2a_messagebox');
        }
    }
}

add_action('init', 'm2a_aftercontent');


/*
 * Saving Data to database
 */

function m2a_message_db_store()
{
    global $wpdb;
    // global $post;
    $postid = $_REQUEST['post_id'];
    $authorid = get_post_field('post_author', $postid);
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];
    $options = get_option('m2a_settings');
    if (isset($options['googlecaptcha'])) {
        $captcha = $_REQUEST['g-recaptcha-response'];
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $options['googlecaptchasecretkey'] . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);
        if ($response['success'] == false) {
            wp_safe_redirect(wp_get_referer());
        }
    }

    $userid = $_REQUEST['user_email'];
    $usermail = $userid;
    if (is_user_logged_in()) {
        $userid = get_current_user_id();
        $usermail = get_userdata($userid)->user_email;
    }

    $tableName = $wpdb->prefix . 'm2a_message';
    $insertation_array = array(
        'sender' => $userid,
        'author_id' => $authorid,
        'post_id' => $postid,
        'subject' => $subject,
        'message' => $message);
    $wpdb->insert($tableName, $insertation_array);
    $options = get_option('m2a_settings');
    if (isset($options['emailtoauthor']) && $options['emailtoauthor'] == 1) {
        $to = get_userdata($authorid)->user_email;
        m2a_sendemail($to, $subject, $message, $usermail, $postid);
    }
    if (isset($options['emailtouser']) && $options['emailtouser'] == 1) {
        m2a_sendemail($usermail, $subject, $message, 0, $postid);
    }
    wp_safe_redirect(wp_get_referer());
}

add_action('admin_post_nopriv_m2a_new_message', 'm2a_message_db_store');
add_action('admin_post_m2a_new_message', 'm2a_message_db_store');

// Create shortcode
function messagebox($atts = array())
{
    $a = get_option('m2a_settings');
    $atts = shortcode_atts(array(
        'style' => 'default',
    ), $atts, 'message2author');
    if ((!isset($a['nonuser'])) || ($a['nonuser'] == 1 && is_user_logged_in())) {
        if ($atts['style'] == 'messagebox') {
            return m2a_getMessageBoxHTML();
        } elseif ($atts['style'] == 'popup') {
            return m2a_getPopupHTML();
        } elseif ($atts['style'] == 'default') {
            if ($a['showas'] == 'messagebox') {
                return m2a_getMessageBoxHTML();
            } elseif ($a['showas'] == 'popup') {
                return m2a_getPopupHTML();
            }
        }
    }
}

add_shortcode('message2author', 'messagebox');
?>