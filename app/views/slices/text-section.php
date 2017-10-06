<?php

// Add the class that defines the number of columns
if ( $slice->getLabel() ) {
  $sectionClass = "text-section-" . $slice->getLabel();
} else { 
  $sectionClass = "text-section-1col";
}
?>

<section class="content-section <?= $sectionClass ?>">
  <?= $slice->getPrimary()->getStructuredText('rich_text')->asHtml(); ?>
</section>