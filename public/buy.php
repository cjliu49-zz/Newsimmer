<?php

    // configuration
    require("../includes/config.php"); 

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["symbol"]))
        {
            apologize("Please pick a stock symbol to buy.");
        }
        else
        {
            $stock = lookup($_POST["symbol"]);
            if ($stock == false)
            {
                apologize("That's not a valid stock symbol. Try a different one.");
            }
        }
        
        if (empty($_POST["shares"]))
        {
            apologize("Please specify how many shares to buy.");
        }
        
        if (preg_match("/^\d+$/", $_POST["shares"]) == false)
        {
            apologize("Please enter a positive integer number of shares");
        }
        
        else
        {

           
                $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
                $cost = $stock["price"] * $_POST["shares"];
                if ($cost > $cash[0]["cash"])
                {
                    apologize("You don't have enough cash to do that.");
                }
                else
                {
                    $buy = query("INSERT INTO portfolios (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"]);
                    $new_cash = query("UPDATE users SET cash = cash - ? WHERE id = ?", $cost, $_SESSION["id"]);
                    $history = query("INSERT INTO history (id, symbol, shares, action, price) VALUES(?, ?, ?, ?, ?)", $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"], "BUY", $stock["price"]);
                    
                    $email = query("SELECT email, username FROM users WHERE id = ?", $_SESSION["id"]);
                    if ($email[0]["email"] == false)
                    {
                        render("sell_result.php", ["action"=>"purchased", "proceeds" => $cost, "shares" => $_POST["shares"], "symbol" => $_POST["symbol"], "name" => $stock["name"], "title" => "Stock Purchased"]);
                    }
                    else
                    {
                    require_once("PHPMailer/class.phpmailer.php");
                    // instantiate mailer
                    $mail = new PHPMailer();

                    // use your ISP's SMTP server (e.g., smtp.fas.harvard.edu if on campus or smtp.comcast.net if off campus and your ISP is Comcast)
                    $mail->IsSMTP();

                    $mail->SMTPDebug = 2;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = "tls";
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = 587;
                    $mail->Username = "csfinance7@gmail.com";
                    $mail->Password = "csfinance";
            
                    // set From:
                    $mail->SetFrom("cs50finance7@gmail.com");

                    // set To:
                    $mail->AddAddress($email[0]["email"]);

                    // set Subject:
                    $mail->Subject = "Transaction Receipt";

                    // set body

                    $mail->Body = "You (" .$email[0]["username"] . ") purchased " . number_format($_POST["shares"], 0) . " shares of " . $stock["name"] . " (" . strtoupper($_POST["symbol"]) .") for a total of $" . number_format($cost, 2) . ".";

                    // send mail
                    if ($mail->Send() === false)
                    {
                        apologize("We couldn't email you your transaction receipt. Sorry.");
                    }
                        redirect("index.php");
                    }
                     
                }
            
        }
    }
    else
    {
        render("buy_form.php", ["title" => "Buy Stock"]);
    }

?>
