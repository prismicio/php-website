<?php

function views_dir()
{
  return __DIR__.'/../views/';
}

function render($app, $page, $data = array())
{
  global $WPGLOBAL;

  foreach ($data as $key => $value) {
    $WPGLOBAL[$key] = $value;
  }

  $file_path = views_dir().'/'.$page.'.php';
  if (file_exists($file_path)) {
    require $file_path;
  } else {
    not_found($app);
  }
}

function not_found($app)
{
  $file_path = views_dir().'/404.php';
  if (file_exists($file_path)) { // Avoid an infinite loop
   render($app, '404');
  } else {
   echo '<h1>404 Not found</h1>';
  }
}