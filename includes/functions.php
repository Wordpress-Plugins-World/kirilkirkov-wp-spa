<?php

// Register settings menu
require dirname(__FILE__) . '/settings.php';

// If plugin is enabled
if((int)get_option('kk_wp_spa_option_enabled') !== 1) {
    return;
}

if(get_option('kk_wp_spa_option_dir_name') !== false) {
    // Create rewrite rule for SPA app
    function SPA_rewrite_basic() {
        flush_rewrite_rules();
        add_rewrite_rule('^(.*)$', 'wp-content/themes/' . get_option('kk_wp_spa_option_dir_name') . '/index.php', 'top');
    }
    add_action('init', 'SPA_rewrite_basic');
}

// Remove posts redirects to real slugs
remove_filter('template_redirect', 'redirect_canonical');
