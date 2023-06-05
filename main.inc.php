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
    $search = '</body>';
    $replace = '
        <script>
            console.log("hulucc");
        </script>
    </body>';

    return str_replace($search, $replace, $content);
}


function add_prompts_detail() {
  global $template;
  $template->set_prefilter('picture', 'add_js');
}
