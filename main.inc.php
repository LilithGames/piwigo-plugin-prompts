<?php
/*
Plugin Name: piwigo-plugin-prompts
Version: 1.0
Description: better support for prompts
Author: hulucc
*/

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

function add_prompts_detail() {
  global $template;
  $js = '
    console.log("hi hulucc");
    $(document).ready(function() {});
  ';
  $template->block_footer_script('', $js);
}

add_event_handler('loc_end_picture', 'add_prompts_detail');
