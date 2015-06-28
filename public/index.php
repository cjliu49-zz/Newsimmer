<?php

    // configuration
    require("../includes/config.php"); 
    
    $rows = query("SELECT symbol, shares FROM portfolios WHERE id = ?", $_SESSION["id"]);
    
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
            "name" => $stock["name"],
            "price" => $stock["price"],
            "shares" => $row["shares"],
            "symbol" => $row["symbol"],
            "total" => $stock["price"] * $row["shares"]
            ];
        }
    }
            
    $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        

    $value = $cash[0]["cash"];
    foreach ($positions as $position)
    {
    
        $value = $value + ($position["total"]); 

    }
    

    
    render("portfolio.php", ["positions" => $positions, "cash" => $cash[0]["cash"], "title" => "Portfolio", "value" => $value]);

?>
