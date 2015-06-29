<!DOCTYPE html>

<html>

    <head>

        <link href="/~CalvinLiu/Newsimmer/public/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/~CalvinLiu/Newsimmer/public/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/~CalvinLiu/Newsimmer/public/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Newsimmer: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Newsimmer: Stir the Pot</title>
        <?php endif ?>

        <script src="/~CalvinLiu/Newsimmer/public/js/jquery-1.10.2.min.js"></script>
        <script src="/~CalvinLiu/Newsimmer/public/js/bootstrap.min.js"></script>
        <script src="/~CalvinLiu/Newsimmer/public/js/scripts.js"></script>

    </head>
    
    <br>

    <body>

        <div class="container">

            <div id="top">
                <a href="/~CalvinLiu/Newsimmer/public"><img alt="Newsimmer.com" src="/~CalvinLiu/Newsimmer/public/img/newsimmer_icon"/></a>
            </div>

            <div id="middle">
    
