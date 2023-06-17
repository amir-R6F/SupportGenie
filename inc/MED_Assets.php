<?php

defined("ABSPATH" || exit());

class MED_Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'front_assets']);
        add_action('admin_enqueue_scripts', [$this, 'admin_assets']);
    }

    public function admin_assets()
    {

        wp_enqueue_style('med-style', MED_FRONT_ASSETS . 'css/style.css', '', MED_VER);
        wp_enqueue_style('med-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', '', MED_VER);
        wp_enqueue_style('med-bootstrapMin', MED_FRONT_ASSETS . 'css/bootstrap.min.css', '', MED_VER);
        wp_enqueue_script('med-bootstrapBundle', MED_FRONT_ASSETS . 'js/bootstrap.bundle.min.js', '', MED_VER, true);
        wp_enqueue_script('meda-main', MED_ADMIN_ASSETS . 'js/main.js', ['jquery'], MED_VER, true);
        wp_enqueue_script('medf-main', MED_FRONT_ASSETS . 'js/main.js', ['jquery'], MED_VER, true);
        wp_enqueue_script('med-sweetAlert', 'https://cdn.jsdelivr.net/npm/sweetalert2@11', '', MED_VER, true);

        wp_localize_script('medf-main', 'MED_data', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce()
        ]);
        wp_localize_script('meda-main', 'MED_data', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce()
        ]);
    }

    public function front_assets()
    {
    }

    public function style_queue($handle, $dir)
    {
        wp_enqueue_style($handle, MED_FRONT_ASSETS . $dir, '', MED_VER);
    }
}
