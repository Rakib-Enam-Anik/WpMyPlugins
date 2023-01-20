<?php
/*
 * Plugin Name:      BlackWebsite Wp Dark Mode
 * Plugin URI:       http://localhost/customplugin/
 * Description:       wp dark mode control
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Rakib Enam
 * Author URI:       http://rakibenam.com.liveblog365.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       blackwebsite
 * Domain Path:       /languages
 */



 class BlackWebsiteSetting{
    public function __construct(){
        add_action('plugin_loaded',array($this,'blackwebsite_load_textdomain'));
        add_action('admin_menu',array($this,'blackwebsite_setting_page'));
        add_action('admin_init',array($this,'blackwebsite_init_page'));

    }
    public function blackwebsite_load_textdomain(){
        load_plugin_textdomain('blackwebsite',false,dirname(__FILE__)."/language");
    }

    public function blackwebsite_setting_page(){
        add_options_page(
        __('BlackWebsite', 'blackwebsite'),
        __('My Plugin', 'blackwebsite'),
        'manage_options',
        'blackwebsite_admin_setting_page',
        array($this,'blackwebsite_admin_page')
    );
    }
   public function blackwebsite_admin_page(){
   // echo "Setting Page";
   $this->options = get_option('blackwebsite_options');
    ?>
    <div class="wrap">
        <form action="options.php">
            <?php
            settings_fields('blackwebsite_main_options_group');
            do_settings_sections('blackwebsite_settings_admin_page');
            
            submit_button()

            ?>
            </form>

   </div>
   <?php

   }

   public function blackwebsite_init_page(){
    register_setting(
        'blackwebsite_main_options_group', //Option group
        'blackwebsite_options', //Option name
        array($this, 'sanitize')//sanitize
    );
    add_settings_section(
        'blackwebsite_main_section', //ID
        'Custom Position', //Tittle
        array($this, 'blackwebsite_print_main_section_info'), //Callback
        'blackwebsite_settings_admin_page' //Page
    );

    add_settings_section(
        'blackwebsite_widget_section', //ID
        'Widget Settings', //Tittle
        array($this, 'blackwebsite_print_main_section_info'), //Callback
        'blackwebsite_settings_admin_page' //Page
    );

    add_settings_section(
        'blackwebsite_extras_section', //ID
        'Extra Settings', //Tittle
        array($this, 'blackwebsite_print_main_extra_settings'), //Callback
        'blackwebsite_settings_admin_page' //Page
    );



    add_settings_field(
        'blackwebsite_bottom',//ID
        __('Bottom Position', 'blackwebsite'),//Title
        array($this, 'blackwebsite_bottom_callback'),//Callback
        'blackwebsite_settings_admin_page', //Page
        'blackwebsite_main_section'//Section
    );

    add_settings_field(
        'blackwebsite_right',//ID
        __('Right Position', 'blackwebsite'),//Title
        array($this, 'blackwebsite_right_callback'),//Callback
        'blackwebsite_settings_admin_page', //Page
        'blackwebsite_main_section'//Section
    );

    add_settings_field(
        'blackwebsite_left',//ID
        __('Left Position', 'blackwebsite'),//Title
        array($this, 'blackwebsite_left_callback'),//Callback
        'blackwebsite_settings_admin_page', //Page
        'blackwebsite_main_section'//Section
    );
   }
   public function blackwebsite_print_main_section_info(){
    echo 'Enter Your Settings Options: ';
   }

   public function blackwebsite_bottom_callback(){
        printf(
            '<input type="text" id="blackwebsite_bottom" placeholder="32px" name="blackwebsite_options[blackwebsite_bottom]"
            value="%s" />',
            isset($this->options['blackwebsite_bottom']) ? esc_attr(
                $this->options['blackwebsite_bottom']) : ''
            );
    

   }

   public function blackwebsite_right_callback(){
    printf(
        '<input type="text" id="blackwebsite_right" placeholder="32px" name="blackwebsite_options[blackwebsite_right]"
        value="%s" />',
        isset($this->options['blackwebsite_right']) ? esc_attr(
            $this->options['blackwebsite_right']) : ''
        );


}

public function blackwebsite_left_callback(){
    printf(
        '<input type="text" id="blackwebsite_left" placeholder="32px" name="blackwebsite_options[blackwebsite_left]"
        value="%s" />',
        isset($this->options['blackwebsite_left']) ? esc_attr(
            $this->options['blackwebsite_left']) : ''
        );


}
 }

 new  BlackWebsiteSetting();