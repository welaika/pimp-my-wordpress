<?php
  /*
  Plugin Name: Wordless Extender
  Plugin URI: https://github.com/welaika/wordless-extender
  Description: Wordless Extender is a starting point for every WordPress web developer. Give a list of plugin we usually install on every installation, or we need to remember to install!
  Author: Welaika
  Version: 1
  Author URI: http://dev.welaika.com
  */

// If this file is called directly, abort.


if ((defined( 'WPINC' )) && (php_sapi_name() != 'cli')) { // This will let wp-cli works

    function __autoload($classname) {
        $filename = plugin_dir_path( __FILE__ ) ."wordless-extender/". $classname .".php";
        if (is_readable($filename))
            include_once($filename);
    }

    require_once WordlessExtender::$path . 'functions.php';

    try {
        new WordlessExtender(plugin_dir_path( __FILE__ ));
    } catch ( Exception $e) {
        echo $e->getMessage(), "\n";
    }

    require_once WordlessExtender::$path . 'admin.php';

    $wordless_extender_security = new WordlessExtenderSecurity;

}
