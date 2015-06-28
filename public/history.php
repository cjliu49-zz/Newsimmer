<?php

    // configuration
    require("../includes/config.php"); 
    
    $rows = query("SELECT datetime, symbol, shares, action, price FROM history WHERE id = ?", $_SESSION["id"]);
    
    $positions = [];
    foreach ($rows as $row)
    {

            $positions[] = [
            "datetime" => $row["datetime"],
            "symbol" => $row["symbol"],
            "shares" => $row["shares"],
            "action" => $row["action"],
            "price" => $row["price"]
            ];

    }
    
    render("history_display.php", ["positions" => $positions, "title" => "History"]);

?>
