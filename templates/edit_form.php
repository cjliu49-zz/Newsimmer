<form action="edit.php" method="post">
<br>
<p>
<strong>Edit your reading list link:</strong>
</p>
<fieldset>
        <div class="form-group">
            <input class="form-control" name="url" value="<?= $url_value ?>" type="text"/> 
<!--             <a href = <?=$url_value?> target = _blank> Test Link </a>
 -->        </div>

        <div class="form-group">
            <textarea class="form-control" name="description" rows="7" cols="70"> <?= $description_value ?> </textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default">Edit Link</button>
        </div>
            <input type="hidden" name="row_id" value = "<?= $row_id ?>">
    </fieldset>
</form>
<div>
   <br>
    <a href="index.php">Cancel</a>
</div>