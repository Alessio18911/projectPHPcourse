<?

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

if (isset($_POST['settings_edit'])) {
  $site_title = $settings['site_title'] = isset($_POST['site_title']) ? trim($_POST['site_title']) : '';
  $site_slogan = $settings['site_slogan'] = isset($_POST['site_slogan']) ? trim($_POST['site_slogan']) : '';
  $status_checkbox = $settings['status_checkbox'] = !empty($_POST['status_checkbox']) ? 'on' : NULL;
  $status = $settings['status'] = isset($_POST['status']) ? trim($_POST['status']) : '';
  $status_detailed = $settings['status_detailed'] = isset($_POST['status_detailed']) ? trim($_POST['status_detailed']) : '';
  $copyrights_author = $settings['copyrights_author'] = isset($_POST['copyrights_author']) ? trim($_POST['copyrights_author']) : '';
  $copyrights_year = $settings['copyrights_year'] = isset($_POST['copyrights_year']) ? trim($_POST['copyrights_year']) : '';
  $social_yt = $settings['social_yt'] = isset($_POST['social_yt']) ? trim($_POST['social_yt']) : '';
  $social_insta = $settings['social_insta'] = isset($_POST['social_insta']) ? trim($_POST['social_insta']) : '';
  $social_fb = $settings['social_fb'] = isset($_POST['social_fb']) ? trim($_POST['social_fb']) : '';
  $social_vk = $settings['social_vk'] = isset($_POST['social_vk']) ? trim($_POST['social_vk']) : '';
  $social_in = $settings['social_in'] = isset($_POST['social_in']) ? trim($_POST['social_in']) : '';
  $social_github = $settings['social_github'] = isset($_POST['social_github']) ? trim($_POST['social_github']) : '';

  if (!$site_title || !$site_slogan) {
    $_SESSION['errors']['site_name_slogan_empty'][] = "empty";
  }

  if (!$status || !$status_detailed) {
    $_SESSION['errors']['status'][] = "empty";
  }

  if (!$copyrights_author && !$copyrights_year) {
    $_SESSION['errors']['copyrights'][] = "empty";
  }

  if (empty($_SESSION['errors'])) {
    foreach($settings as $setting_name => $setting_value) {
      R::exec('UPDATE settings SET section_text = ? WHERE section_title = ?', [$setting_value, $setting_name]);
    }

    $_SESSION['success']['settings_updated'][] = "success";
  }
}

ob_start();
include ROOT . "admin/templates/settings/settings.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
