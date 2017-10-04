<?php 
$highlightTitle = $slice->getPrimary()->getStructuredText("title");
$highlightHeadline = $slice->getPrimary()->getStructuredText("headline");
?>


<section class="highlight content-section">
  <div class="highlight-left">
    <?= $highlightTitle->asHtml($prismic->linkResolver); ?>
    <?= $highlightHeadline->asHtml($prismic->linkResolver); ?>
    
    <?php
      // if there is a button link and button text
      if ( $slice->getPrimary()->getLink("link") && $slice->getPrimary()->getText("link_label") ) {
    ?>
    <p><a href="<?= $slice->getPrimary()->getLink('link')->getUrl($prismic->linkResolver) ?>"><?= $slice->getPrimary()->getText("link_label") ?></a></p>
    <?php } ?>
  </div>
  
  <div class="highlight-right">
    <img src="<?= $slice->getPrimary()->getImage("featured_image")->getUrl() ?>"/>
  </div>
</section>