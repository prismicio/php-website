<?php

$textSectionSlice = $slice;
$textSection = $slice->getValue();

// Add the class that defines the number of columns
if ( $textSectionSlice->getLabel() ) {
  $sectionClass = "text-section-" . $textSectionSlice->getLabel();
} else { 
  $sectionClass = "text-section-1col";
}
?>

<section class="content-section <?= $sectionClass ?>">
  <?= $textSectionSlice->asHtml($prismic->linkResolver) ?>
</section>