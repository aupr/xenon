<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XENON - LunchBD</title>
    <link rel="icon" href="image/self/sw.png" type="image/png" sizes="16x16">
    <link type="text/css" rel="stylesheet" href="application/vendor/bootstrap-3.3.7/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="application/style/main.css">
    <script src="application/vendor/jquery-3.1.1/jquery.min.js"></script>
    <script src="application/script/main.js"></script>
</head>
<body>


<div style="max-width: 800px; margin: auto; padding-top: 10px;">
    <a href="<?=$url->applink('expose')?>" class="btn btn-default btn-lg">LunchBD</a>
    <a href="<?=$url->applink('addmember')?>" class="btn btn-warning btn-lg">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <a href="<?=$url->applink('memberlist')?>" class="btn btn-primary btn-lg">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
    </a>
    <a href="<?=$url->applink('updatelunch')?>" class="btn btn-primary btn-lg">
        UL
    </a>
    <a href="<?=$url->applink('findmember')?>" class="btn btn-primary btn-lg">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    </a>
    <hr>