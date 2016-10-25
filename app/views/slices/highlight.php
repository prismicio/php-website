<?php $highlight = $slice->getValue()->getArray()[0]; ?>
<section class="highlight content-section">
  <div class="highlight-left">
    <?= $highlight->getStructuredText("title")->asHtml($prismic->linkResolver); ?>
    <?= $highlight->getStructuredText("headline")->asHtml($prismic->linkResolver); ?>
    
    <?php
      // if there is a button link and button text
      if ( $highlight->getLink("link") && $highlight->getText("linkText") ) {
    ?>
    <p><a href="<?= $highlight->getLink('link')->getUrl($prismic->linkResolver) ?>"><?= $highlight->getText("linkText") ?></a></p>
    <?php } ?>
  </div>
  
  <div class="highlight-right">
    <img src="<?= $highlight->getImage("image")->getUrl() ?>"/>
  </div>
</section>