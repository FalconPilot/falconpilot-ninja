<?php

  function renderPage ($path) {
    $pageContent = include(__DIR__.'/'.$path);
    include(__DIR__.'/templates/default.php');
  }

  function renderWithTheme ($path, $themePath) {
    $pageContent = include(__DIR__.'/'.$themePath);
    $themeContent = include(__DIR__.'/'.$path);
  }

  // Switch current request URI to actual view
  $request = '/'.ltrim(rtrim($_SERVER['REQUEST_URI'], '/'));
  switch ($request) {

    case '/':
      renderPage('pages/index.html');
      break;

    case '/akhemar':
      renderWithTheme('pages/akhemar/index.html', 'themes/akhemar.php');
      break;

    default:
      renderPage('pages/404.html');
      break;
  }
?>
