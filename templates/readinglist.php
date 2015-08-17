<ul class="nav nav-pills">
    <li><a href="add.php"><strong>Click Here to Add a New Link</strong></a></li>
</ul>

<table class="table table-striped">

    <thead>
        <tr>
            <th>Date Added</th>
            <th>URL</th>
            <th>Description</th>
            <th></th>
            <th></th>

        </tr>
    </thead>

    <tbody>

        <?php foreach ($links as $link): ?>

<!--         <?php
        $sites_html = file_get_contents($link["url"]);
        $html = new DOMDocument();
        @$html->loadHTML($sites_html);
        $title = null;

        foreach($html->getElementsByTagName('meta') as $meta)
        {
            if(@$meta->getAttribute('property')=='og:title')
            {
                $title = $meta->getAttribute('content');
            }
        }
        ?> -->

        <tr>
            <td><?= $link["date"] ?></td>
            <td><a href = <?=$link["url"]?> target="_blank"><?= $link["url"] ?> </a></td>
            <td><?= $link["description"] ?></td>
            <td><a href = "edit_values.php?id=<?= $link["row_id"] ?>"><i>Edit</i></a></td>    
            <td><a href = "delete.php?id=<?= $link["row_id"] ?>"><i>Delete</i></a></td>
        </tr>

    <?php endforeach ?>
        
    </tbody>

</table>
            </div>

<div>
    <br>
    <a href="logout.php">Log Out</a>

