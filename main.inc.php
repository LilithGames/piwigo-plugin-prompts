<?php
/*
Plugin Name: piwigo-plugin-prompts
Version: 1.0
Description: better support for prompts
Author: hulucc
*/

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

add_event_handler('loc_end_picture', 'add_prompts_detail');

function add_js($content, $smarty)
{
    // 在模板的底部添加 JavaScript 代码
    $js = '
    <script>
        console.log("hulucc");
    </script>
    ';

    // 将 JavaScript 代码添加到模板的底部
    return $content . $js;
}


function add_prompts_detail() {
  global $template;
  $template->set_prefilter('picture', 'add_js');
}
