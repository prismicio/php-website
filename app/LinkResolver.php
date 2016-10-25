<?php

use Prismic\LinkResolver;

/**
 * The link resolver is the code building URLs for pages corresponding to
 * a Prismic document.
 *
 * If you want to change the URLs of your site, you need to update this class
 * as well as the routes in app.php.
 */
class PrismicLinkResolver extends LinkResolver
{
  private $prismic;

  public function __construct($prismic)
  {
    $this->prismic = $prismic;
  }

  public function resolve($link)
  {
    // For pages
    if ($link->getType() == 'page') {
      return '/' . $link->getUid();
    }
    
    // Default case returns the homepage
    return '/';
  }
}

