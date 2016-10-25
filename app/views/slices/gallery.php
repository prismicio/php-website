<section class="gallery content-section">
  
  <?php
    // Loop through the gallery items
    foreach ( $slice->getValue()->getArray() as $galleryItem ) {
  ?>
  
  <div class="gallery-item">
    <img src="<?= $galleryItem->getImage("image")->getUrl() ?>"/>
    <?= $galleryItem->getStructuredText("description")->asHtml($prismic->linkResolver); ?>

    <?php
      // if there is a link and text text
      if ( $galleryItem->getLink("link") && $galleryItem->getText("linkText") ) {
    ?>
    <p class="gallery-link"><a href="<?= $galleryItem->getLink('link')->getUrl($prismic->linkResolver) ?>"><?= $galleryItem->getText("linkText") ?></a></p>
    <?php } ?>
  </div>
  <?php } ?>
</section>