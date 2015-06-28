<?php

	// configuration
	require("../includes/config.php");

	$rows = query("SELECT link, description, DATE(timestamp) AS timestamp FROM links WHERE id = ? ORDER BY DATE(timestamp) DESC, timestamp ASC", $_SESSION["id"]);

	$listtitle = query("SELECT title FROM users WHERE id = ?", $_SESSION["id"]);

	$links = [];
	foreach ($rows as $row)
	{
		$links[] = [
		"link" => $rows["link"],
		"description" => $rows["description"],
		"timestamp" => $rows["timestamp"]
		];
	}

	render("linklist.php", ["title" = $listtitle, "links" => $links]);

?>