<?php

  function parseSelfURL () {
    return [
      'scheme' => $_SERVER['SERVER_PORT'] === 443 ? 'https' : 'http',
      'host' => $_SERVER['HTTP_HOST'],
      'path' => strtok($_SERVER['REQUEST_URI'], '?')
    ];
  }

  $URIOBJECT = parseSelfURL();

  function renderPage ($path, $uriObject) {
    $pageContentPath = __DIR__.'/'.$path;

    if (!$pageTitle) {
      $pageTitle = 'FalconPilot Ninja';
    }

    if (!$pageDescription) {
      $pageDescription = 'Channel your inner ninja...';
    }

    $SELF_URL = $uriObject;

    include(__DIR__.'/templates/default.php');
  }

  function renderWithTheme ($path, $themePath, $uriObject) {
    $themeContentPath = __DIR__.'/'.$path;
    renderPage($themePath, $uriObject);
  }

  // Switch current request URI to actual view
  $renderingFunction = [
  
    '/' => function ($uriObject) {
      renderPage('pages/index.html', $uriObject);
    },

    '/akhemar' => function ($uriObject) {
      renderWithTheme('pages/akhemar/index.html', 'themes/akhemar.php', $uriObject);
    }

  ][$URIOBJECT['path']];

  if (!$renderingFunction) {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    renderPage('pages/404.html', $URIOBJECT);
  } else {
    $renderingFunction($URIOBJECT);
  }
?>
