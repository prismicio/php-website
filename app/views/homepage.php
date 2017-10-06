<?php

$prismic = $WPGLOBAL['prismic'];
$pageContent = $WPGLOBAL['pageContent'];
$menuContent = $WPGLOBAL['menuContent'];

$title = SITE_TITLE;
$isHomepage = true;

?>

<?php include 'header.php'; ?>

<?php $banner = $pageContent->getGroup('homepage.homepage_banner')->getArray()[0]; ?> 
<section class="homepage-banner" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url(<?= $banner->getImage("image")->getUrl() ?>)">
  <div class="banner-content container">
    <h2 class="banner-title"><?= $banner->getText("title") ?></h2>
    <p class="banner-description"><?= $banner->getText("tagline") ?></p>
    
    <?php 
      // If both the button link and button text are defined in the prismic.io repo
      if  ( $banner->getLink("button_link") && $banner->getText("button_label") ) { 
    ?>
    <a href="<?= $banner->getLink("button_link")->getUrl($prismic->linkResolver) ?>" class="banner-button"><?= $banner->getText("button_label") ?></a>
    <?php } ?>
    
  </div>
</section>

<div class="container"  data-wio-id=<?= $pageContent->getId() ?>>
  <?php 
    // If there are any slices
    if ( $pageContent->getSliceZone('homepage.page_content') !== null ) {
      
      // Display the slices
      foreach ( $pageContent->getSliceZone('homepage.page_content')->getSlices() as $slice ) {
        
        //- Render the right markup for a given slice type.
        switch($slice->getSliceType()) {
          case 'text_section':
            include("slices/text-section.php");
            break;
          case 'quote':
            include("slices/quote.php");
            break;
          case 'full_width_image':
            include("slices/full-width-image.php");
            break;
          case 'image_gallery':
            include("slices/gallery.php");
            break;
          case 'image_highlight':
            include("slices/highlight.php");
            break;
        }
      }
    } 
  ?>
</div>

<?php include 'footer.php'; ?>