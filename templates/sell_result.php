<div>
    
    <?php 
    $shares_format = number_format($shares, 0);
    $proceeds_format = number_format($proceeds, 2);
    print("You "."$action" ." " . $shares_format . " shares of " . $name . " (" .$symbol .") for a total of $" . $proceeds_format . ".");
    ?>
</div>

<div>
   <br>
    <a href="index.php">Skip This Step</a>
</div>
