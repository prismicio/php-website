<section class="gallery content-section">
  
  <?php
    // Loop through the gallery items
    foreach ( $slice->getItems()->getArray() as $galleryItem ) {
  ?>
  
  <div class="gallery-item">
    <img src="<?= $galleryItem->getImage("image")->getUrl() ?>"/>
    <?= $galleryItem->getStructuredText("image_description")->asHtml($prismic->linkResolver); ?>

    <?php
      // if there is a link and text text
      if ( $galleryItem->getLink("link") && $galleryItem->getText("link_label") ) {
    ?>
    <p class="gallery-link"><a href="<?= $galleryItem->getLink('link')->getUrl($prismic->linkResolver) ?>"><?= $galleryItem->getText("link_label") ?></a></p>
    <?php } ?>
  </div>
  <?php } ?>
</section>