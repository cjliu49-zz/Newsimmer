<ul class="nav nav-pills">
    <li><a href="add.php"><strong>Click Here to Add a New Link</strong></a></li>
</ul>

<table class="table table-striped">

    <thead>
        <tr>
            <th>Date Added</th>
            <th>URL</th>
            <th>Description</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach ($links as $link): ?>

        <tr>
            <td><?= $link["date"] ?></td>
            <td><a href = <?=$link["url"]?> target="_blank"><?= $link["url"] ?> </a></td>
            <td><?= $link["description"] ?></td>
            <td><a href = "edit.php"><i>Edit</i></a></td>
            <td><a href = "delete.php"><i>Delete</i></a></td>
        </tr>

    <?php endforeach ?>
        
    </tbody>

</table>
            </div>



<div>
    <br>
    <a href="logout.php">Log Out</a>

