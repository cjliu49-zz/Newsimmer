<?php

    // configuration
    require("../includes/config.php"); 

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["url"]))
        {
            apologize("Please enter a URL to add to your list of links.");
        }
        
        else
        {
            $parsed = parse_url ($_POST["url"]);
            if (empty($parsed["scheme"]))
            {
                $_POST["url"] = "http://" . ltrim($_POST["url"], "/");
            }
            if (!filter_var($_POST["url"], FILTER_VALIDATE_URL) === false)
            {
                $add = query("UPDATE links SET url = ?, description = ? WHERE row_id = ?", $_POST["url"], $_POST["description"], $_POST["row_id"]);
                redirect("index.php");
            }
            else
            {
                apologize("That doesn't seem like a valid URL - check again please.");
            }
        }
              
    }
    
    // else
    // {
    //     render("edit_form.php", ["title" => "Edit Link", "url_value" => $url_value, "description_value" => $description_value]);
    // }

?>
