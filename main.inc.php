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
  $js = <<<EOT
    function insertCopyButton() {
    var element = document.querySelector('p.imageComment');
    var button = document.createElement('button');
    button.textContent = 'Copy';
    button.addEventListener('click', function() {
        var content = element.textContent;
        var tempInput = document.createElement('textarea');
        tempInput.style.position = 'fixed';
        tempInput.style.opacity = 0;
        tempInput.value = content;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
    });
    element.parentNode.insertBefore(button, element.nextSibling);
    }
    function insertDiv(id, titleText, contentText) {
        var categories = document.getElementById("Categories");
        var newDiv = document.createElement("div");
        newDiv.id = id;
        newDiv.className = "imageInfo";
        var title = document.createElement("dt");
        title.innerText = titleText;
        var content = document.createElement("dd");
        content.innerText = contentText;
        newDiv.appendChild(title);
        newDiv.appendChild(content);
        categories.parentNode.insertBefore(newDiv, categories);
    }

    function parseInfo(infoString) {
        const targetInfo = infoString;
        const regex = /([A-Z][\s\w\d]+):\s(("[^"]+")|([\s\w\d\+]+))/g;
        let match;
        let infoObj = {};

        while ((match = regex.exec(targetInfo)) !== null) {
            const key = match[1].trim();
            const value = match[2].trim();
            // Remove the quotes if they exist
            const finalValue = value[0] === '"' ? value.slice(1, -1) : value;
            infoObj[key] = finalValue;
        }

        return infoObj;
    }
    
    var data = document.querySelector('p.imageComment').innerText.replaceAll('\\n', ',');
    obj = parseInfo(data)
    for (const [key, value] of Object.entries(obj)) {
        insertDiv(key, key, value);
    }
    insertCopyButton();
  EOT;
  $template->block_footer_script('', $js);
}

add_event_handler('loc_end_picture', 'add_prompts_detail');
