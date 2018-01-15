<?php $page_title = 'Garys Tool Selling Site'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Sirin+Stencil" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo url_for('public/css/bootstrap-full.css'); ?>">
   <!--<link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/helpers.css">-->
    <link rel="stylesheet" href="<?php echo url_for('public/css/main.css'); ?>">

    <title><?php $page_title; ?></title>
</head>
<body>
    <header class='container-fluid'>
      <div class='row'>
        <h1 class="col-xs-12 col-md-6 tools">
            <a href="<?php echo url_for( 'index.php'); ?>">Garys Tool List</a>
        </h1>
     </header>
