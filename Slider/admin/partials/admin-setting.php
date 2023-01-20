<?php
class Slider_Setting{
    private $options; 

    public function __construct(){
        add_action('admin_menu',array($this,'admin_setting_menu'));
        add_action('admin_init',array($this,'page_init'));
    }
    public function admin_setting_menu(){
        add_submenu_page('edit.php?post_type=bootstrap_slider',__('Setting','bootstrap-carousel-slider'),
        __('Setting','bootstrap-carousel-slider'),'manage_options','slider-setting',array($this,'setting_submenu_callback'));
    }


public function setting_submenu_callback(){
    $this->options = get_option('slider_settings');
    ?>
    <div class="wrap">
        <h2>Setting</h2>
        <form method="post" action="options.php">
            <?php 
            settings_fields('slider_setting');
            do_settings_sections('slider-carousel');
            submit_button();
            ?>
            </form>
</div>
<?php
}
 //add_action('admin_init',array($this,'page_init'));  
 public function page_init(){
    register_setting(
        'slider_settings',//Option group
        'slider_settings',//Option name
        array($this, 'sanitize')//Sanitize
    );
 
 
 //Sections
 add_settings_section(
    'slider_settings_behaviour',//ID
    __('Carousel Behaviour', 'bootstrap-carousel-slider'),//Title
    array($this, 'slider_settings_behaviour_header'), //Callback
    'slider-carousel'//page
 );
 add_settings_section(
    'slider_settings_setup',//ID
    __('Carousel Setup', 'bootstrap-carousel-slider'),//Title
    array($this, 'slider_settings_setup'), //Callback
    'slider-carousel'//page
 );

 add_settings_section(
    'slider_settings_link_buttons',//ID
    __('Carousel Setup', 'bootstrap-carousel-slider'),//Title
    array($this, 'slider_settings_link_buttons_header'), //Callback
    'slider-carousel'//page
 );

 add_settings_section(
    'slider_settings_markup',//ID
    __('Custom Markup', 'bootstrap-carousel-slider'),//Title
    array($this, 'slider_settings_markup_header'), //Callback
    'slider-carousel'//page
 );

 //Behaviour Fields
 add_settings_field(
    'interval',//ID
    __('Slide Interval (milliseconds)', 'bootstrap-carousel-slider'),//Title
    array($this, 'interval_callback'),//Callback
    'slider-carousel',//page
    'slider_settings_behaviour' //Section
 );
}


 public function interval_callback(){
    printf('<input type="text" id="interval" name="slider_settings [interval] value="%s" size="15" />',
    isset($this->options['interval']) ? esc_attr($this->options['interval']) : ''); 

    //echo '<p class="description">'.__('How long each images shows for before it slides. Set to 0 to disable 
   // animation.','cpt-bootstrap-carousel').'</p>;
 }
  public function sanitize($input){

  }

}

if(is_admin()){
    $slider_setting = new Slider_Setting();
}
?>