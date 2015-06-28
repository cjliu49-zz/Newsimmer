<ul class="nav nav-pills">
    <li><a href="stockprice.php">Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="logout.php"><strong>Log Out</strong></a></li>
</ul>

<table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Date, Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach ($positions as $position): ?>

        <tr>
            <td><?= $position["action"] ?></td>
            <td><?= $position["datetime"] ?></td>
            <td><?= $position["symbol"] ?></td>
            <td><?= number_format($position["shares"], 0) ?></td>
            <td><?= number_format($position["price"], 2) ?></td>
        </tr>

    <?php endforeach ?>
        
    </tbody>

</table>
            </div>



<div>
    <br>
    <a href="index.php">Back to Portfolio</a>

