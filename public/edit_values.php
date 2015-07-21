<?php

    // configuration
    require("../includes/config.php"); 

    $row_id = $_GET["id"];

    $sql = "SELECT url, description FROM links WHERE row_id = $row_id";
    static $access;
    if (!isset($access))
    {
        try
        {
            // connect to database
            $access = new PDO("mysql:dbname=" . DATABASE . ";host=" . SERVER, USERNAME, PASSWORD);

            // ensure that PDO::prepare returns false when passed invalid SQL
            $access->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
        }
        catch (Exception $e)
        {
            // trigger (big, orange) error
            trigger_error($e->getMessage(), E_USER_ERROR);
            exit;
        }
    }

    // prepare SQL statement
    $statement = $access->prepare($sql);
    if ($statement === false)
    {
        // trigger (big, orange) error
        trigger_error($access->errorInfo()[2], E_USER_ERROR);
        exit;
    }

    // execute SQL statement
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $url_value = null;
    $description_value = null;
    foreach ($results as $urldata)
    {
        $url_value = $urldata['url'];
        $description_value = $urldata['description'];
    }
    
    render("edit_form.php", ["title" => "Edit Link", "url_value" => $url_value, "description_value" => $description_value, "row_id" => $row_id]);

?>
