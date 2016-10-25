<?php

$prismic = $WPGLOBAL['prismic'];
$pageContent = $WPGLOBAL['pageContent'];
$menuContent = $WPGLOBAL['menuContent'];

$title = SITE_TITLE;
$isHomepage = false;

?>

<?php include 'header.php'; ?>
    
<div class="container">
  <?php 
    // If there are any slices
    if ( $pageContent->getSliceZone('page.body') !== null ) {
      
      // Display the slices
      foreach ( $pageContent->getSliceZone('page.body')->getSlices() as $slice ) {
        
        //- Render the right markup for a given slice type.
        switch($slice->getSliceType()) {
          case 'heading':
            require("slices/section-heading.php");
            break;
          case 'textSection':
            require("slices/text-section.php");
            break;
          case 'fullWidthImage':
            require("slices/full-width-image.php");
            break;
          case 'highlight':
            require("slices/highlight.php");
            break;
          case 'gallery':
            require("slices/gallery.php");
            break;
        }
      }
    } 
  ?>
</div>

<?php include 'footer.php'; ?>