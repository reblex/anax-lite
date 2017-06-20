<!doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
<?php
$pos = strpos($_SERVER['REQUEST_URI'], "~siwa15");
$prepend = "";
if ($pos != false) {
    $prepend = "/~siwa15";
}
?>
<link rel="stylesheet" href="<?=$prepend?>/dbwebb-kurser/oophp/me/anax-lite/theme/compiled/style.min.css">

<header class="header">
    <div class="headerTop">
        <div class="headerLogo">
                Simon Wahlström
        </div>
        <?php require ANAX_INSTALL_PATH."/view/navbar/navbar.php"; ?>
    </div>
</header>

<div class="content"> <!-- Start of Content -->
