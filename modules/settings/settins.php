<?php

$settings = R::getAssoc('SELECT section_title, section_text FROM settings');

$site_title = $settings['site_title'];
$site_slogan = $settings['site_slogan'];
$status_checkbox = $settings['status_checkbox'];
$status = $settings['status'];
$status_detailed = $settings['status_detailed'];
$copyrights_author = $settings['copyrights_author'];
$copyrights_year = $settings['copyrights_year'];
$social_yt = $settings['social_yt'];
$social_insta = $settings['social_insta'];
$social_fb = $settings['social_fb'];
$social_vk = $settings['social_vk'];
$social_in = $settings['social_in'];
$social_github = $settings['social_github'];



