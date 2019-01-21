<?php
use Prismic\Dom\Link;
use Prismic\Dom\RichText;

$prismic = $WPGLOBAL['prismic'];
$pageContent = $WPGLOBAL['pageContent'];
$menuContent = $WPGLOBAL['menuContent'];

$title = SITE_TITLE;
$isHomepage = true;

?>

<?php include 'header.php'; ?>

<?php $banner = $pageContent->data->homepage_banner[0]; ?> 
<section class="homepage-banner" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url(<?= $banner->image->url ?>)">
  <div class="banner-content container">
    <h2 class="banner-title"><?= RichText::asText($banner->title) ?></h2>
    <p class="banner-description"><?= RichText::asText($banner->tagline) ?></p>
    
    <?php 
      // If both the button link and button text are defined in the prismic.io repo
      $button_link = $banner->button_link;
      $button_label = RichText::asText($banner->button_label);

      if ( $button_link->link_type != "Any" && strlen($button_label) > 1 )  {
    ?>
    <a href="<?= Link::asUrl($button_link, $prismic->linkResolver) ?>" class="banner-button"><?= $button_label ?></a>
    <?php } ?>
    
  </div>
</section>

<div class="container"  data-wio-id=<?= $pageContent->id ?>>
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