<?php
function MED_settings($key = ''){

    $options = get_option('MED_TKT_SETTINGS');

    return isset($options[$key]) ? $options[$key] : null;
}