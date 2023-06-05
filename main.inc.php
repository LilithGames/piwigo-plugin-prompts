<?php
/*
Plugin Name: piwigo-plugin-prompts
Version: 1.0
Description: better support for prompts
Author: hulucc
*/

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

add_event_handler('loc_end_picture', 'add_prompts_detail');

function add_prompts_detail() {
  global $template;
  $js = '
  $(document).ready(function() {
    console.log("hi hulucc");
  });
  ';
  $template->add_footer_script($js, 'SCRIPT');
}
