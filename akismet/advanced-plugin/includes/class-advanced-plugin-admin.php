wp_enqueue_script($this->plugin_name,plugin_dir_url(
    __FILE__) . 'js/advanced-plugin-admin.js',array('jquery'), $this->version, false);
))

public function advanced_menu(){
    add_menu_page('Book Management','Book Management',manage_options)
}