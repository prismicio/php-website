<?php
use Prismic\Dom\RichText;
use Prismic\Dom\Link;
?>

<section class="image-gallery content-section">
  <?= RichText::asHtml($slice->primary->gallery_title); ?>
  <div class="gallery">
    <?php
    // Loop through the gallery items
    foreach ( $slice->items as $galleryItem ) {
    ?>

    <div class="gallery-item">
      <img src="<?= $galleryItem->image->url ?>"/>
      <?= RichText::asHtml($galleryItem->image_description, $prismic->linkResolver); ?>

      <?php
        // if there is a link and text text
        $link = $galleryItem->link;
        $link_label = RichText::asText($galleryItem->link_label);

        if ( $link->link_type != "Any" && strlen($link_label) > 1 )  {
      ?>
      <p class="gallery-link"><a href="<?= Link::asUrl($link, $prismic->linkResolver) ?>"><?= $link_label ?></a></p>
      <?php } ?>
    </div>
    <?php } ?>
  </div>
</section>