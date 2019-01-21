<?php 
use Prismic\Dom\RichText;
use Prismic\Dom\Link;
?>


<section class="highlight content-section">
  <div class="highlight-left">
    <?= RichText::asHtml($slice->primary->title, $prismic->linkResolver); ?>
    <?= RichText::asHtml($slice->primary->headline, $prismic->linkResolver); ?>
    
    <?php
      // if the optional link and text are present, render them
      $link = $slice->primary->link;
      $link_label = RichText::asText($slice->primary->link_label);

      if ( $link->link_type != "Any" && strlen($link_label) > 0 )  {
    ?>
    <p><a href="<?= Link::asUrl($link, $prismic->linkResolver) ?>"><?= $link_label ?></a></p>
    <?php } ?>
  </div>
  
  <div class="highlight-right">
    <img src="<?= $slice->primary->featured_image->url ?>"/>
  </div>
</section>