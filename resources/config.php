<?php

include_once(__DIR__.'/../vendor/autoload.php');

$PRISMIC_URL = "https://your-repo-name.prismic.io/api";
$PRISMIC_TOKEN = null;

defined("TEMPLATES_PATH") or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

class Routes
{
  private static function baseUrl()
  {
    $host = $_SERVER["HTTP_HOST"];
    $protocol = "http";
    if (isset($_SERVER['HTTPS'])) {
      $protocol = $protocol . 's';
    }
    $protocol = $protocol . '://';

    return $protocol . $host;
  }

  public static function index()
  {
    $parameters = array();
    $queryString = http_build_query($parameters);

    if ($queryString == null)
      return Routes::baseUrl();
    else
      return Routes::baseUrl() . '/index.php?' . $queryString;
  }
  
  public static function page($pageUID)
  {
    $parameters = array('uid'=>$pageUID);
    $queryString = http_build_query($parameters);

    if ($queryString == null)
      return Routes::baseUrl() . '/page.php';
    else
      return Routes::baseUrl() . '/page.php?' . $queryString;
  }
}

class LinkResolver extends \Prismic\LinkResolver {
  public function resolve($link) {
    if ( $link->getType() == "page" ) {
      return Routes::page($link->getUid());
    }
    return Routes::index();
  }
};
$linkResolver = new LinkResolver();

function handlePrismicException($e)
{
  $response = $e->getResponse();
  if ($response->getStatusCode() == 403) {
    exit('Forbidden');
  } elseif ($response->getStatusCode() == 404) {
    header("HTTP/1.0 404 Not Found");
    exit("Not Found");
  } else {
    setcookie(Prismic\PREVIEW_COOKIE, "", time() - 1);
    header('Location: ' . '/');
  }
}


