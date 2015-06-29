<?php

    // configuration
    require("../includes/config.php"); 


    if( ! ini_get('date.timezone') )
    {
        date_default_timezone_set('GMT');
    }
    $rows = query("SELECT datetime, url, description FROM links WHERE id = ? ORDER BY datetime DESC", $_SESSION["id"]);
    
    $links = [];
    foreach ($rows as $row)
    {
        $date = date_create($row["datetime"]);

        $links[] = [
        "date" => date_format($date, 'F j\, Y'),
        "url" => $row["url"],
        "description" => $row["description"]
        ];
        
    }
    
    render("readinglist.php", ["links" => $links, "title" => "Reading List"]);

?>
