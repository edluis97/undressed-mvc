<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="<?= $site['baseURL'] ?>assets/plugins/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $site['baseURL'] ?>assets/themes/default/css/global.css" rel="stylesheet">
    <script src="<?= $site['baseURL'] ?>assets/plugins/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    
    <?php require_once $siteInfo['root'].'/App/Views/_static/header.php';?>
    <?php require_once $siteInfo['root'].'/App/Views/'.$page.'.view.php'; ?>
    
    <?php require_once $siteInfo['root'].'/App/Views/_static/footer.php';?>
    
  </body>
</html>