<?php

require_once '../resources/config.php';
include_once(__DIR__.'/../vendor/autoload.php');

use Prismic\Api;

$pageUID = $_GET["uid"];

try {
  $api = Api::get($PRISMIC_URL, $PRISMIC_TOKEN);
  $pageContent = $api->getByUID("page", $pageUID);
  $menuContent = $api->getByUID("menu", "main-nav");
} catch (Guzzle\Http\Exception\BadResponseException $e) {
  handlePrismicHelperException($e);
}

$title="PHP Sample Website";
$isHomepage = false;

require_once(TEMPLATES_PATH . "/header.php");
?>


<div class="container">
  <?php 
    // If there are any slices
    if ( $pageContent->getSliceZone('page.body') !== null ) {
      
      // Display the slices
      foreach ( $pageContent->getSliceZone('page.body')->getSlices() as $slice ) {
        
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
