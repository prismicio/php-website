<?php

$prismic = $WPGLOBAL['prismic'];
$pageContent = $WPGLOBAL['pageContent'];
$menuContent = $WPGLOBAL['menuContent'];

$title = SITE_TITLE;
$isHomepage = false;

?>

<?php include 'header.php'; ?>
    
<div class="container" data-wio-id=<?= $pageContent->id ?>>
  <?php 
    // Get the slices from the page
    $slices = $pageContent->data->page_content;
    // Display the slices
    foreach ( $slices as $slice ) {
      
      //- Render the right markup for a given slice type.
      switch($slice->slice_type) {
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
  ?>
</div>

<?php include 'footer.php'; ?>