<!DOCTYPE html>

<html>

    <head>

        <link href="/~CalvinLiu/Newsimmer/public/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/~CalvinLiu/Newsimmer/public/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/~CalvinLiu/Newsimmer/public/css/styles.css" rel="stylesheet"/>

        <link rel="stylesheet" href="http://cdn.embed.ly/jquery.preview-0.3.2.css" />


        <?php if (isset($title)): ?>
            <title>Newsimmer: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Newsimmer: Stir the Pot</title>
        <?php endif ?>

        <script src="/~CalvinLiu/Newsimmer/public/js/jquery-1.10.2.min.js"></script>
        <script src="/~CalvinLiu/Newsimmer/public/js/bootstrap.min.js"></script>
        <script src="/~CalvinLiu/Newsimmer/public/js/scripts.js"></script>

        <script src="http://cdn.embed.ly/jquery.embedly-3.0.5.min.js" type="text/javascript"></script>
        <script src="http://cdn.embed.ly/jquery.preview-0.3.2.min.js" type="text/javascript"></script>


    </head>
    
    <br>

    <body>

        <div class="container">

            <div id="top">
                <a href="/~CalvinLiu/Newsimmer/public"><img alt="Newsimmer.com" src="/~CalvinLiu/Newsimmer/public/img/newsimmer_icon"/></a>
            </div>

            <div id="middle">
    
