<?php
/*
 * Plugin Name:       Column Management
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
 * Text Domain:       column
 * Domain Path:       /languages
 */

 function manage_posts_columns_func($column){
    unset($column['tags']);
    unset($column['comments']);

     $column['id'] = __('ID','column');
     $column['thumbnails'] = __('Thumbnails','column');
      $column['wordcount'] = __('WordCount','column');


    return $column;
 }
 add_filter('manage_posts_columns', 'manage_posts_columns_func');

 function manage_posts_custom_column_func($column,$post_id){
    if('id' == $column){
        echo $post_id;
    }elseif('thumbnails' == $column){
        $thumbnail = get_the_post_thumbnail($post_id,array(100,100));
        echo $thumbnail;
    }
    elseif('wordcount' == $column){
      $wordn = get_post_meta($post_id,'wordn',true);
      echo $wordn;

    }
    return $column;
 }

 add_filter('manage_posts_custom_column','manage_posts_custom_column_func',10,2);

 /*
 function init_function(){
    $_posts = get_posts(array(
		'posts_per_page'      => -1,
		'post_type'        => 'post',
		'post_status' => 'any'
	));
   foreach ($_posts as $p){
      $content = $p->post_content;
      $wordn = str_word_count( strip_tags($content));

      update_post_meta( $p->ID, 'wordn', $wordn);
   }

 }

 add_action('init','init_function');
 */
 function colmn_filter($column){
   $column ['wordcount'] = 'wordn';
   return $column;
 }
 add_filter('manage_edit-post_sortable_columns','colmn_filter');

 function coldemo_update_wordcount_on_post_save($post_id){
   $q = get_post($post_id);
   $content = $q->post_content;
   $wordn = str_word_count( strip_tags($content));

   update_post_meta($q->ID, 'wordn', $wordn);
 }
 add_action('save_post','coldemo_update_wordcount_on_post_save');

 function col_demo_filter(){
   $filter_value = isset($_GET['DEMOFILTER']) ? $_GET['DEMOFILTER'] : '';
   $values = array(
      '0' =>__('Select Status', 'column'),
      '1' =>__('Some Posts', 'column'),
      '2' =>__('Some Posts++', 'column'),
   );
   ?>
   <select name="DEMOFILTER">
      <?php
      foreach ( $values as $key => $value){
         printf("<option value='%s' %s>%s</option>", $key,
         $key == $filter_value ? "selected = 'selected'" : '',$value);
      }
      ?>
</select>
<?php
 }
 add_action('restrict_manage_posts','col_demo_filter');

 function filter_result_posts($query){
   $filter_value = isset($_GET['DEMOFILTER']) ? $_GET['DEMOFILTER'] : '';
   if('1' ==$filter_value){
      $query->set( 'post__in',array(1));
   }elseif('2' == $filter_value ){
      $query->set('post__in', array(7));

   }
   }
add_action('pre_get_posts', 'filter_result_posts');

 function col_demo_image_filter(){
   $filter_value = isset($_GET['IMAGEFILTER']) ? $_GET['IMAGEFILTER'] : '';
   $values = array(
      '0' =>__(' Image Filter', 'column'),
      '1' =>__('Thumnails Exist', 'column'),
      '2' =>__('No Thumnails', 'column'),
   );
   ?>
   <select name="IMAGEFILTER">
      <?php
      foreach ( $values as $key => $value){
         printf("<option value='%s' %s>%s</option>", $key,
         $key == $filter_value ? "selected = 'selected'" : '',$value);
      }
      ?>
</select>
<?php
 }
 add_action('restrict_manage_posts','col_demo_image_filter');

 function filter_image_result_posts($query){
   $filter_value = isset($_GET['IMAGEFILTER']) ? $_GET['IMAGEFILTER'] : '';
   if('1' ==$filter_value){
      $query->set( 'meta_query',array(array(
         'key' => '_thumbnail_id',
         'compare'=> 'EXISTS' 

      )));
   }elseif('2' == $filter_value ){
      $query->set('meta_query', array(array(
         'key' => '_thumbnail_id',
         'compare'=> 'NOT EXISTS' 
      )));

   }
   }
add_action('pre_get_posts', 'filter_image_result_posts');
