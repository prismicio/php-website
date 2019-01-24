<?php use Prismic\Dom\RichText ?>
<section class="content-section quote">
  <blockquote>
    <?= RichText::asText($slice->primary->quote_text) ?>
  </blockquote>
</section>