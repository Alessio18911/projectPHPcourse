<?

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

if (isset($_POST['settings_edit'])) {
  $site_title = $settings['site_title'] = isset($_POST['site_title']) ? trim($_POST['site_title']) : '';
  $site_slogan = $settings['site_slogan'] = isset($_POST['site_slogan']) ? trim($_POST['site_slogan']) : '';
  $status_checkbox = $settings['status_checkbox'] = !empty($_POST['status_checkbox']) ? 'on' : NULL;
  $status = $settings['status'] = isset($_POST['status']) ? trim($_POST['status']) : '';
  $status_page_link = $settings['status_page_link'] = !empty($_POST['status_page_link']) ? trim($_POST['status_page_link']) : NULL;
  $status_detailed = $settings['status_detailed'] = isset($_POST['status_detailed']) ? trim($_POST['status_detailed']) : '';
  $copyrights_author = $settings['copyrights_author'] = isset($_POST['copyrights_author']) ? trim($_POST['copyrights_author']) : '';
  $copyrights_year = $settings['copyrights_year'] = isset($_POST['copyrights_year']) ? trim($_POST['copyrights_year']) : '';
  $social_yt = $settings['social_yt'] = !empty($_POST['social_yt']) ? trim($_POST['social_yt']) : NULL;
  $social_insta = $settings['social_insta'] = !empty($_POST['social_insta']) ? trim($_POST['social_insta']) : NULL;
  $social_fb = $settings['social_fb'] = !empty($_POST['social_fb']) ? trim($_POST['social_fb']) : NULL;
  $social_vk = $settings['social_vk'] = !empty($_POST['social_vk']) ? trim($_POST['social_vk']) : NULL;
  $social_in = $settings['social_in'] = !empty($_POST['social_in']) ? trim($_POST['social_in']) : NULL;
  $social_github = $settings['social_github'] = !empty($_POST['social_github']) ? trim($_POST['social_github']) : NULL;

  if (!$site_title || !$site_slogan) {
    $_SESSION['errors']['site_name_slogan_empty'][] = "empty";
  }

  if (!$status || !$status_detailed || empty($settings['status_page_link'])) {
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
