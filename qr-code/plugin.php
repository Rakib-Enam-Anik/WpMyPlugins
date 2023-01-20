<?php
/* 
Plugin Name: QR CODE PLUGIN
description: Portfolio With Loadmore Description
Version:3.0
Author: Smart Coder
Author URI:http://smartcoderbd.com
Text Domain:qrcodes
Domain Path:/language
*/

function qr_code_content($content){
    $post_id = get_the_ID();
    $post_title = get_the_title($post_id);
    $post_permalink = urldecode(get_the_permalink($post_id));

    $post_type = get_post_type($post_id);

    $post_type_filter = apply_filters('qr_post_type_change',array());
    if(!in_array($post_type,$post_type_filter)){
        return $content;
    }

    $width = get_option('qr_setting_width_id');
    $width = $width ? $width : 150;
    $height = get_option('qr_setting_height_id');
    $height = $height ? $height : 150;

    $dimension = apply_filters('qr_code_dimension',"{$width}x{$height}");
    $image_attr = apply_filters('qr_code_image_attr','');

    $src = sprintf("https://api.qrserver.com/v1/create-qr-code/?size=%s&data=%s",
    $dimension , $post_permalink);

    $post_type = get_post_type($post_id);

    $post_type_filter = apply_filters('qr_post_type_change',array());
    if(!in_array($post_type,$post_type_filter)){
        return $content;
    }

    $content .= sprintf("<img src='%s' alt='%s'>" ,$src,$post_title);
    return $content;
}
add_filter('the_content','qr_code_content');

function qr_code_option(){
    add_settings_section(
        'qr_setting_section',
        'QR Setting Section',
        'qr_setting_section_callback_function',
        'general'
    );
    add_settings_field(
        'qr_setting_width_id',
        __('Qr Code Width','qr_code'),
        'qr_width_setting_callback_function',
        'general',
        'qr_setting_section',
    );
    add_settings_field(
        'qr_setting_height_id',
        __('Qr Code Height','qr_code'),
        'qr_height_setting_callback_function',
        'general',
        'qr_setting_section',
    );

    register_setting('general','qr_setting_width_id',array('sanitize_callback' =>'esc_attr'));

    register_setting('general','qr_setting_height_id',array('sanitize_callback' =>'esc_attr'));
}
add_action('admin_init','qr_code_option');

function qr_setting_section_callback_function(){
    echo "<p>QR Code Setting</p>";
}

function qr_width_setting_callback_function($arg){
    $width = get_option('qr_setting_width_id');
    printf("<input type='text' id='%s' name='%s' value='%s' />",'qr_setting_width_id',
    'qr_setting_width_id', $width );
}
function qr_height_setting_callback_function($arg){
        $height = get_option('qr_setting_height_id');
        printf("<input type='text' id='%s' name='%s' value='%s' />",'qr_setting_height_id',
        'qr_setting_height_id', $height );

}