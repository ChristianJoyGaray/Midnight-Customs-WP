<?php

/**

ACF allow fields updates JSON modifications.*/
add_filter("acf/settings/load_json", function($paths) {
    $paths = array();

    $paths[] = get_template_directory() . "/acf-json";

    return $paths;
});

?>