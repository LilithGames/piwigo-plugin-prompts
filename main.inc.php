<?php
/*
Plugin Name: piwigo-plugin-prompts
Version: 1.0
Description: better support for prompts
Author: hulucc
*/

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');


function add_prompts_detail() {
    $js = '
    <script>
        console.log("hulucc");
    </script>
    '
    return $js
}

add_event_handler('block_footer_script', 'add_prompts_detail');
