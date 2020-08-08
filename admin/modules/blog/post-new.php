<?php

$minCoverWidth = 600;
$minCoverHeight = 300;
$smallCoverWidth = 290;
$smallCoverHeight = 230;
$maxCoverWeight = 12582912;
$coverNamePrefix = "290-";
$coverFolderLocation = ROOT . "usercontent/blog/";

$postTitle = isset($_POST['title']) ? trim($_POST['title']) : '';
$postContent = isset($_POST['content']) ? trim($_POST['content']) : '';

if (isset($_POST['post-submit'])) {
  if (!$postTitle) $_SESSION['errors']['postTitle'][] = "empty";
  if (!$postContent) $_SESSION['errors']['postContent'][] = "empty";

  if (empty($_SESSION['errors'])) {
    $post = R::dispense('posts');
    $post->title = $postTitle;
    $post->content = $postContent;
    $post->timestamp = time();

    if (!$_FILES['cover']['error']) {
      $fileParams = validateUploadedFile($_FILES['cover'], $minCoverWidth, $minCoverHeight, $maxCoverWeight);

      if (!empty($fileParams)) {
        processUploadedFile($coverFolderLocation, $fileParams, $coverNamePrefix, $minCoverWidth, $minCoverHeight, $smallCoverWidth, $smallCoverHeight);

        $post->cover = $fileParams['dbFileName'];
        $post->coverSmall = $coverNamePrefix . $fileParams['dbFileName'];
      }
    }

    if (empty($_SESSION['errors']['file'])) {
      R::store($post);
      $_SESSION['success']['newPost'][] = "success";
      header("Location: " .HOST. "admin/blog");
      exit();
    }
  }
}

ob_start();

include ROOT . "admin/templates/blog/post-new.tpl";

$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>
