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
                $add = query("INSERT INTO links (id, url, description) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE id=id", $_SESSION["id"], $_POST["url"], $_POST["description"]);
                    
                    /*
                    $email = query("SELECT email, username FROM users WHERE id = ?", $_SESSION["id"]);

                    {
                    require_once("/~CalvinLiu/Sites/PHPMailer/class.phpmailer.php");
                    // instantiate mailer
                    $mail = new PHPMailer();

                    // use your ISP's SMTP server (e.g., smtp.fas.harvard.edu if on campus or smtp.comcast.net if off campus and your ISP is Comcast)
                    $mail->IsSMTP();

                    $mail->SMTPDebug = 2;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = "tls";
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = 587;
                    $mail->Username = "newsimmer.com@gmail.com";
                    $mail->Password = "newsimmer";
            
                    // set From:
                    $mail->SetFrom("newsimmer.com@gmail.com", 'Newsimmer Support');

                    // set To:
                    $mail->AddAddress($email[0]["email"]);

                    // set Subject:
                    $mail->Subject = "Newsimmer Support";

                    // set body

                    $mail->Body = "You (" . $email[0]["username"] . ") added the link " . $_POST["url"] . " to your reading list.";

                    // send mail
                    if ($mail->Send() === false)
                        {
                            apologize("We couldn't email you. Sorry.");
                        }
                    
                    redirect("index.php");
                    }
                 */    
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
        render("add_form.php", ["title" => "Add Link"]);
    }

?>
