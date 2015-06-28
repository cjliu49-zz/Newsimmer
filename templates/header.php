<!DOCTYPE html>

<html>

	<head>

		<link href="/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
		<link href="/css/styles.css" rel = "stylesheet"/>

		<?php if (isset($title)): ?>
			<title>Newsimmer: <?= htmlspecialchars($title) ?></title>
		<?php else: ?>
			<title>Newsimmer</title>
		<?php endif ?>

		<script src="/js/jquery-1.10.2.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/scripts.js"></script>

	</head>

	<body>

		<div class="container">

			<div id="top">
				NEWSIMMER
				<!-- <a href="/"><img alt="Newsimmer" src="/img/logo.gif"></a> -->
			</div>

			<div id="middle">