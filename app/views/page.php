<?php

$prismic = $WPGLOBAL['prismic'];
$pageContent = $WPGLOBAL['pageContent'];
$menuContent = $WPGLOBAL['menuContent'];

$title = SITE_TITLE;
$isHomepage = false;

?>

<?php include 'header.php'; ?>
    
<div class="container" data-wio-id=<?= $pageContent->getId() ?>>
  <?php 
    // If there are any slices
    if ( $pageContent->getSliceZone('page.page_content') !== null ) {
      
      // Display the slices
      foreach ( $pageContent->getSliceZone('page.page_content')->getSlices() as $slice ) {
        
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