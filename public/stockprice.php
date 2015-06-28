<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("Please provide a stock symbol.");
        }
        
        $stock = lookup($_POST["symbol"]);
        
        if ($stock == false)
        {
            apologize("Please provide a valid stock symbol.");
        }
        else
        {
            render("quote.php", ["quote" => $stock["price"], "name" => $stock["name"], "symbol" => $stock["symbol"]]);
        }

    }
    else
    {
        // else render form
        render("stockprice_form.php", ["title" => "Get Quote"]);
    }

?>
