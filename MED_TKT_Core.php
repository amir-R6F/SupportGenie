<?php

/*
Plugin Name: تیکت پشتیبانی مدآیلتس
Plugin URI: https://www.rtl-theme.com/author/viennacompany/products/
Description: افزونه تیکت پشتیبانی
Author: ویانا
Version: 1.0.0
Author URI: https://www.rtl-theme.com/author/viennacompany/
*/

defined("ABSPATH" || exit());

class MED_TKT_Core{
    private static $__instance = null;
    const MINI_PHP_VER = '7.2';

    public static function instance()
    {
        if (is_null(self::$__instance)){
            self::$__instance = new self();
        }
    }

    public function __construct()
    {
        if (version_compare(PHP_VERSION, self::MINI_PHP_VER, '<')){
            do_action('admin_notices', [$this, 'admin_php_notice']);
            return;
        }
        $this->constants();
        $this->init();
    }

    public function constants()
    {
        if (!function_exists('get_plugin_data')){
            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }

        define("MED_BASE_FILE", __FILE__);
        define("MED_PATH", trailingslashit(plugin_dir_path(MED_BASE_FILE)));
        define("MED_URL", trailingslashit(plugin_dir_url(MED_BASE_FILE)));
        define("MED_ADMIN_ASSETS", trailingslashit(MED_URL . 'assets/admin'));
        define("MED_FRONT_ASSETS", trailingslashit(MED_URL . 'assets/front'));
        define("MED_INC", trailingslashit(MED_PATH . 'inc'));
        define("MED_VIEWS", trailingslashit(MED_PATH . 'views'));

        $tkt_plugin_data = get_plugin_data(MED_BASE_FILE);
        define('MED_VER', $tkt_plugin_data['Version']);
    }

    public function init()
    {
        require_once MED_PATH . 'vendor/autoload.php';

        require_once MED_INC . 'admin/codestar/codestar-framework.php';

        require_once MED_INC . 'admin/MED_Settings.php';

        require_once MED_INC . 'MED_Func.php';




        register_activation_hook(MED_BASE_FILE, [$this, 'active']);
        register_deactivation_hook(MED_BASE_FILE, [$this, 'deative']);


        add_shortcode('MED_TICKET', [$this, 'MED_Shortcode']);


        if (is_admin()){
            new MED_Menu();
        }

        new MED_Route();

        new MED_Assets();

        //add_action( 'elementor/widgets/register', [$this, 'register_ViamContactUs_widget'] );

    }

    public function MED_Shortcode()
    {
        //$currentPage = new VIC_Plugin_View_Manager();
        //include MED_VIEWS . 'front/main.php';
    }

    public function active()
    {
        MED_DB::create_table();
    }

    public function deative()
    {

    }

    public function register_ViamContactUs_widget( $widgets_manager ) {

        require_once( __DIR__ . '/widgets/oembed-widget.php' );

        $widgets_manager->register( new \Elementor_ViamContactUs_Widget() );
    }


    public function admin_php_notice()
    {
        ?>
        <div class="notice notice-warning">
            <p>نیازمند Php نسخه بالاتر است افزونه تماس با ما آکام</p>
        </div>
        <?php
    }
}

Med_TKT_Core::instance();
