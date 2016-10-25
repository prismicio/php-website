<?php

$prismic = $WPGLOBAL['prismic'];
$pageContent = $WPGLOBAL['pageContent'];
$menuContent = $WPGLOBAL['menuContent'];

$title = SITE_TITLE;
$isHomepage = true;

?>

<?php include 'header.php'; ?>

<section class="homepage-banner" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url(<?= $pageContent->getImage("homepage.backgroundImage")->getUrl() ?>)">
  <div class="banner-content container">
    <h2 class="banner-title"><?= $pageContent->getText("homepage.title") ?></h2>
    <p class="banner-description"><?= $pageContent->getText("homepage.tagline") ?></p>
    
    <?php 
      // If both the button link and button text are defined in the prismic.io repo
      if  ( $pageContent->getLink("homepage.buttonLink") && $pageContent->getText("homepage.buttonText") ) { 
    ?>
    <a href="<?= $pageContent->getLink('homepage.buttonLink')->getUrl($prismic->linkResolver) ?>" class="banner-button"><?= $pageContent->getText("homepage.buttonText") ?></a>
    <?php } ?>
    
  </div>
</section>

<div class="container">
  <?php 
    // If there are any slices
    if ( $pageContent->getSliceZone('homepage.body') !== null ) {
      
      // Display the slices
      foreach ( $pageContent->getSliceZone('homepage.body')->getSlices() as $slice ) {
        
        //- Render the right markup for a given slice type.
        switch($slice->getSliceType()) {
          case 'heading':
            include("slices/section-heading.php");
            break;
          case 'textSection':
            include("slices/text-section.php");
            break;
          case 'fullWidthImage':
            include("slices/full-width-image.php");
            break;
          case 'highlight':
            include("slices/highlight.php");
            break;
          case 'gallery':
            include("slices/gallery.php");
            break;
        }
      }
    } 
  ?>
</div>

<?php include 'footer.php'; ?>