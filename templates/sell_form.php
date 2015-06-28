<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <select class="form-control" name="symbol">
            <option value="">Symbol</option>
            

            <?php foreach ($positions as $position): ?>
            
            <option><?= $position["symbol"] ?>            
            
            <?php endforeach ?>
            </select>
        </div>
    </fieldset>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Sell Shares</button>
        </div>

</form>
<div>
   <br>
    <a href="index.php">Back to Portfolio</a>
</div>
