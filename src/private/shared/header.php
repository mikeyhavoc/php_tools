<?php $page_title = 'Garys Tool Selling Site'; ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116676832-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-116676832-1');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <meta name="description" content="Garys tools, retired bodyman selling his body tools locally in bradenton fl.">
    <link href="https://fonts.googleapis.com/css?family=Supermercado+One" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo url_for('public/css/main.css'); ?>">

    <title><?php echo $page_title; ?></title>
</head>
<body>
    <header role="banner" class='container-fluid'>
      <section class='row'>
        <h1 class="col-12 col-md-4 tools logo__section logo">
            <a class="logo__title logo" href="<?php echo url_for( 'index.php'); ?>">Garys Tools</a>
        </h1>
      </section>
     </header>

