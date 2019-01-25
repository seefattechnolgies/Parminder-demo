<?php
if (!defined('ABSPATH'))
    exit;

class Mowplayer_Html_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(false, $name = 'Mowplayer_Html');
    }

    function widget($args, $instance) {
        extract($args);
        global $wpdb;
        $title = apply_filters('widget_title', $instance['title']);

        $entry = $wpdb->get_row($wpdb->prepare("SELECT `content` FROM `" . $wpdb->prefix . "mowplayer_videos`  WHERE id=%d", $instance['message']));
        echo $before_widget . ($title ? $before_title . $title . $after_title : '') . do_shortcode($entry->content) . $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }

    function form($instance) {
        global $wpdb;

        $entries = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "xyz_ihs_short_code WHERE status=%d  ORDER BY id DESC", 1));
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $message = isset($instance['message']) ? esc_attr($instance['message']) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('Choose Snippet :'); ?></label> 
            <select name="<?php echo $this->get_field_name('message'); ?>">
                <?php
                if (count($entries) > 0) {
                    $count = 1;
                    $class = '';
                    foreach ($entries as $entry) {
                        ?>
                        <option value="<?php echo $entry->id; ?>" <?php if ($message == $entry->id) echo "selected"; ?>><?php echo $entry->title; ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </p>
        <?php
    }

}

function xyz_ihs_add_snippet_widget() {
    register_widget("Xyz_Insert_Html_Widget");
}

add_action('widgets_init', 'xyz_ihs_add_snippet_widget');
