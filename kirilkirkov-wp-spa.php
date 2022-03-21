<?php
/*
Plugin Name: WP Spa
Plugin URI: https://github.com/Wordpress-Plugins-World/kirilkirkov-wp-spa
Description: Plugin for usage of wordpress like backend only for SPA Application (Vue, React)
Version: 1.0
Author: Kiril Kirkov
Author URI: https://github.com/kirilkirkov
License: GPLv2 or later
Text Domain: kirilkirkov-wp-spa
*/

if(!class_exists('KirilKirkovWPSpa')) {
    class KirilKirkovWPSpa
    {
        private static $instance = false;

		private function __construct()
		{
			$this->init(); // Sets up all the actions and filters
		}

		public static function getInstance()
		{
			if ( !self::$instance ) {
				self::$instance = new KirilKirkovWPSpa();
			}

			return self::$instance;
		}

        public function init()
        {
            require dirname(__FILE__) . '/includes/functions.php';
        }
    }
    
    $kk_wp_spa_instance = KirilKirkovWPSpa::getInstance();
}