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

            "symbol" => $row["symbol"],

            ];
        }

    }
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("Please pick one of your stocks to sell.");
        }

        else
        {
            $selling = lookup($_POST["symbol"]);
            $sale = query("SELECT shares FROM portfolios WHERE symbol = ? and id = ?", $_POST["symbol"], $_SESSION["id"]);
            $sold = query("DELETE FROM portfolios WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
            
            $proceeds = $sale[0]["shares"] * $selling["price"];
            $cash = query("UPDATE users SET cash = cash + ? WHERE id = ?", $proceeds, $_SESSION["id"]);
            $history = query("INSERT INTO history (id, symbol, shares, action, price) VALUES(?, ?, ?, ?, ?)", $_SESSION["id"], $_POST["symbol"], $sale[0]["shares"], "SELL", $selling["price"]);
            
            $email = query("SELECT email, username FROM users WHERE id = ?", $_SESSION["id"]);
            if ($email[0]["email"] == false)
            {
                render("sell_result.php", ["action"=>"sold", "proceeds" => $proceeds, "shares" => $sale[0]["shares"], "symbol" => $selling["symbol"], "name" => $selling["name"], "title" => "Stock Sold"]);
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

            $mail->Body = "You (" .$email[0]["username"]. ") sold " . number_format($sale[0]["shares"], 0) . " shares of " . $selling["name"] . " (" . $selling["symbol"] .") for a total of $" . number_format($proceeds, 2) . ".";

            // send mail
            if ($mail->Send() === false)
            {
                apologize("We couldn't email you your transaction receipt. Sorry.");
            }
            redirect("index.php");
            }
        }

    }
    else
    {
        // else render form
        render("sell_form.php", ["positions" => $positions, "title" => "Sell Stock"]);
    }

?>
