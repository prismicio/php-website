<?php
use Prismic\Dom\RichText;

// Add the class that defines the number of columns
if ( $slice->slice_label ) {
  $sectionClass = "text-section-" . $slice->slice_label;
} else { 
  $sectionClass = "text-section-1col";
}
?>

<section class="content-section <?= $sectionClass ?>">
  <?= RichText::asHtml($slice->primary->rich_text) ?>
</section>