<?php

require_once '../resources/config.php';
include_once(__DIR__.'/../vendor/autoload.php');

use Prismic\Api;

try {
  $api = Api::get($PRISMIC_URL, $PRISMIC_TOKEN);
  $pageContent = $api->getByUID("homepage", "homepage");
  $menuContent = $api->getByUID("menu", "main-nav");
} catch (Guzzle\Http\Exception\BadResponseException $e) {
  handlePrismicHelperException($e);
}

$title="PHP Sample Website";
$isHomepage = true;

require_once(TEMPLATES_PATH . "/header.php");
?>


<section class="homepage-banner" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url(<?= $pageContent->getImage("homepage.backgroundImage")->getUrl() ?>)">
  <div class="banner-content container">
    <h2 class="banner-title"><?= $pageContent->getText("homepage.title") ?></h2>
    <p class="banner-description"><?= $pageContent->getText("homepage.tagline") ?></p>
    
    <?php 
      // If both the button link and button text are defined in the prismic.io repo
      if  ( $pageContent->getLink("homepage.buttonLink") && $pageContent->getText("homepage.buttonText") ) { 
    ?>
    <a href="<?= $pageContent->getLink('homepage.buttonLink')->getUrl($linkResolver) ?>" class="banner-button"><?= $pageContent->getText("homepage.buttonText") ?></a>
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
            require(TEMPLATES_PATH . "/section-heading.php");
            break;
          case 'textSection':
            require(TEMPLATES_PATH . "/text-section.php");
            break;
          case 'fullWidthImage':
            require(TEMPLATES_PATH . "/full-width-image.php");
            break;
          case 'highlight':
            require(TEMPLATES_PATH . "/highlight.php");
            break;
          case 'gallery':
            require(TEMPLATES_PATH . "/gallery.php");
            break;
        }
      }
    } 
  ?>
</div>

<?php
  require_once(TEMPLATES_PATH . "/footer.php");
