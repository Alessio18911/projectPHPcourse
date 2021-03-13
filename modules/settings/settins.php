<?php

$settings = R::getAssoc('SELECT section_title, section_text FROM settings');

$site_title = htmlspecialchars($settings['site_title']);
$site_slogan = htmlspecialchars($settings['site_slogan']);
$status_checkbox = htmlspecialchars($settings['status_checkbox']);
$status = htmlspecialchars($settings['status']);
$status_detailed = htmlspecialchars($settings['status_detailed']);
$status_page_link = htmlspecialchars($settings['status_page_link']);
$copyrights_author = htmlspecialchars($settings['copyrights_author']);
$copyrights_year = htmlspecialchars($settings['copyrights_year']);
$social_yt = htmlspecialchars($settings['social_yt']);
$social_insta = htmlspecialchars($settings['social_insta']);
$social_fb = htmlspecialchars($settings['social_fb']);
$social_vk = htmlspecialchars($settings['social_vk']);
$social_in = htmlspecialchars($settings['social_in']);
$social_github = htmlspecialchars($settings['social_github']);



