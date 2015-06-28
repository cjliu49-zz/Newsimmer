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
            <th>Name</th>
            <th>Symbol</th>
            <th>Price</th>
            <th>Shares</th>
            <th>TOTAL</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach ($positions as $position): ?>

        <tr>
            <td><?= $position["name"] ?></td>
            <td><?= $position["symbol"] ?></td>
            <td><?= number_format($position["price"], 2) ?></td>
            <td><?= number_format($position["shares"], 0) ?></td>
            <td><?= number_format($position["total"], 2) ?></td>
        </tr>

    <?php endforeach ?>
        <tr>
        <td colspan="4">Cash</td>

        <td><?= number_format($cash, 2) ?></td>
        </tr>
        <tr>
        <td colspan="4"><b>TOTAL VALUE</b></td>

        <td><b><?= number_format($value, 2) ?></b></td>
        </tr>
    </tbody>

</table>
            </div>



<div>
    <br>
    <a href="logout.php">Log Out of Portfolio</a>

