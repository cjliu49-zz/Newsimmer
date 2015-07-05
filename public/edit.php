<?php

    // configuration
    require("../includes/config.php"); 

    $row_id = $_GET["id"];
    $row_query = mysql_query("SELECT url, description FROM links WHERE row_id = $row_id");
    $url_value = mysql_fetch_row($row_query);

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
                $add = query("INSERT INTO links (id, url, description) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE id=id", $_SESSION["id"], $_POST["url"], $_POST["description"]);
                redirect("index.php");
            }
            else
            {
                apologize("That doesn't seem like a valid URL - check again please.");
            }
        }
              
    }
    
    else
    {
        render("edit_form.php", ["title" => "Edit Link", "url_value" => $url_value]);
    }

?>
