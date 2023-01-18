<?php
/*
 * Plugin Name:       New  Plugin
 * Plugin URI:       http://localhost/customplugin/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Rakib Enam
 * Author URI:       http://rakibenam.com.liveblog365.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       new-plugin
 * Domain Path:       /languages
 */

 add_action('plugins_loaded',function(){
    load_plugin_textdomain('new-plugin',false,dirname(__FILE__)."/language");
 });

 function new_features($content){
    $strip = strip_tags($content);
    $wordc = str_word_count($strip);
   

    $read_min = floor(   $wordc/ 200);
    $read_se = floor($wordc % 200/(200/60));

    $tags = apply_filters('new_plugin_tags', 'h3');
    $label = apply_filters('new_plugin_label','Reading Time');

    $post_type = get_post_type(get_the_ID());

    $post_type_filter = apply_filters('post_type_change',array());
    if(!in_array($post_type,$post_type_filter)){
      return $content;
    }

    $content .= sprintf('<%s>%s: min: %s Second:%s </%s>', $tags ,  $label, $read_min,$read_se, $tags );

    return $content;



 }
add_filter('the_content', 'new_features');

/*
Tittle hook

add_filter('the_title',function($title){
   $title .= "New";
   return $title;
});
*/

/*
word count

add_filter('the_title',function($title){
   $titlec = str_word_count($title);
   $title .= sprintf('<h4>Title Count:%s</h4>,$titlec');
   return $title;
});

*/

/*
length count

function content_count($content){
   $count = strlen($content);
   $content .= sprintf('<h5>Length: %s</h5>', $count);
   return $content;
}
add_filter('the_content','content_count');
*/

/*
//time and date showing

function new_features($strip){
   $strip = strip_tag($content);
   $wordc = str_word_count($strip);
   $length = strlen($strip);
   $time  =  the_time("H i s A");

   $content .= sprintf('<p>Count:%s Length:%s Date:%s</p>', $wordc,$length,$tme);

   return strtolower($content);
}
add_filter('the_content','new_features');

*/