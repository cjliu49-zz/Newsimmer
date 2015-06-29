<?php

    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide a username.");
        }
        else if (empty($_POST["email"]))
        {
            apologize("You must provide an email.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide a password.");
        }
        else if ($_POST["password"] !== $_POST["confirmation"])
        {
            apologize("The two passwords you provided do not match.");
        }
        
        // TODO here. need to figure out how to work with SQL. need a query to check if username is taken, THEN insert.
        $result = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
        
        if (count($result) != 0)
        {
            apologize("That username is taken. Please choose a new one.");
        }
        else
        {
            $insert = query("INSERT INTO users (username, hash, email) VALUES (?, ?, ?)", $_POST["username"], crypt($_POST["password"]), $_POST["email"]);
            if ($insert === false)
            {
                apologize("Couldn't register you.");
            }
            else
            {
                $rows = query("SELECT LAST_INSERT_ID() AS id");
                
                // so id is stored in $id. need to store it in session.
                $_SESSION["id"] = $rows[0]["id"];   
                
                // redirect to index
                redirect("index.php");        
            }
        }
            
    }
    
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    } 
?>
