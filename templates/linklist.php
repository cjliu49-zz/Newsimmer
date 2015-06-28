<ul class="nav nav-pills">
	<li><a href="settings.php">Settings</li>
	<li><a href="logout.php">Log Out</li>
</ul>

<?php foreach ($links as $link): ?>

	<?= $link["timestamp"] ?>
	<?= $link["link"] ?>
	<?= $link["description"] ?>
	<br>

<?php endforeach ?>

		</div>

<div>
	<br>
	<a href="logout.php">Log Out</a>