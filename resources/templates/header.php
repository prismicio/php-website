<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; Charset=UTF-8" http-equiv="Content-Type" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/stylesheets/reset.css">
    <link rel="stylesheet" href="/stylesheets/common.css">
    <link rel="stylesheet" href="/stylesheets/style.css">
    <link rel="icon" type="image/png" href="/images/punch.png" />
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="/javascript/vendors/analytics.js"></script>
    <? /* Required for previews and experiments */ ?>
    <script>
      window.prismic = {
        endpoint: '<?= $PRISMIC_URL ?>'
      };
    </script>
    <script src="//static.cdn.prismic.io/prismic.js"></script>
  </head>
  <body class="page<?= $isHomepage ? " homepage" : "" ?>">

    <header class="site-header">
      <a href="/">
        <div class="logo">Example Site</div>
      </a>
      
      <?php
        // if the navigation is set up in prismic.io
        if ( $menuContent != null ) { 
      ?>
      <nav>
        <ul>
          
          <?php 
            // loop through each menu item
            foreach ( $menuContent->getGroup('menu.menuLinks')->getArray() as $link ) { 
          ?>
          <li><a href="<?= $link->getLink("link")->getUrl($linkResolver) ?>"><?= $link->getText("label") ?></a></li>
          <?php } ?>
        </ul>
      </nav>
      <?php } ?>
      
    </header>