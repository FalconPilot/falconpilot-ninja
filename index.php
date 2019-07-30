<?php

  // renderPage function should only be called once at the same time !
  function renderPage ($path) {
    $pageContent = include(__DIR__.'/'.$path);
    include(__DIR__.'/templates/default.php');
  }

  // Switch current request URI to actual view
  $request = rtrim($_SERVER['REQUEST_URI'], '/');
  switch ($request) {

    case '':
      renderPage('pages/index.html');
      break;

    default:
      renderPage('pages/404.html');
      break;
  }
?>
