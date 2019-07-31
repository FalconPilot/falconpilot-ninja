<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="/public/main.css" />
    <title><?php echo $pageTitle; ?></title>

    <meta property="og:title" content="<?php echo $pageTitle; ?>" />
    <meta property="og:description" content="<?php echo $pageDescription; ?>" />
    <meta property="og:url" content="<?php echo rtrim(implode('', [
      $SELF_URL['scheme'],
      '://',
      $SELF_URL['host'],
      $SELF_URL['path']
    ]), '/'); ?>" />
  </head>
  <body>
    <?php include($pageContentPath); ?>
  </body>
</html>
