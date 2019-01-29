<?php
use Prismic\Dom\Link;
use Prismic\Dom\RichText;

if (!isset($title)) {
  $title = SITE_TITLE;
}
if (!isset($description)) {
  $description = SITE_DESCRIPTION;
}
if (!isset($isHomepage)) {
  $isHomepage = false;
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; Charset=UTF-8" http-equiv="Content-Type" />
    <title><?= $title ?></title>
    <meta name="description" content="<?php echo $description; ?>">
    <link rel="stylesheet" href="/stylesheets/reset.css">
    <link rel="stylesheet" href="/stylesheets/common.css">
    <link rel="stylesheet" href="/stylesheets/style.css">
    <link rel="icon" type="image/png" href="/images/punch.png" />
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <? /* Required for previews and experiments */ ?>
    <script>
      window.prismic = {
        endpoint: '<?= PRISMIC_URL ?>'
      };
    </script>
    <script src="//static.cdn.prismic.io/prismic.js"></script>
  </head>
  <body class="page<?= $isHomepage ? " homepage" : "" ?>">
    
    <header class="site-header">
      <a href="/">
        <div class="logo">John Doe</div>
      </a>
      
      <?php
        // if the navigation is set up in prismic.io
        if ( $menuContent->data != new stdClass() && $menuContent != null ) { 
      ?>
      <nav>
        <ul>
          
          <?php 
            // loop through each menu item
            foreach ( $menuContent->data->menu_links as $link ) { 
          ?>
          <li><a href="<?= Link::asUrl($link->link, $prismic->linkResolver) ?>"><?= RichText::asText($link->label) ?></a></li>
          <?php } ?>
        </ul>
      </nav>
      <?php } ?>
      
    </header>