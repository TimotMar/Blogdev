<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Blog pour tous ! ">
    <meta name="author" content="Timothee Marissal">

    <title>
        <?php
       echo isset($title)
        ? $title.' - ' . WEBSITE_NAME
        : WEBSITE_NAME .'- Un blog pour tous :';
       ?>
    </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" src="../views/public/assets/js/google-code-prettify/prettify.css"/>
    <link rel="stylesheet" href="../views/public/assets/css/main.css"/>
    <!-- Custom styles for this template -->

</head>
<body>

<?php include('../views/partials/_menu.php'); ?>
<?php include('../views/partials/_flash.php'); ?>