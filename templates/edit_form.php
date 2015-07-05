<form action="edit.php" method="post">
<br>
<p>
<strong>Edit your reading list link:</strong>
</p>
<fieldset>
        <div class="form-group">
            <input class="form-control" name="url" value="<?= $url_value ?>" type="text"/> 
        </div>

        <div class="form-group">
            <textarea class="form-control" name="description" rows="5" cols="50" value="Describe your link (Optional)"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default">Edit Link</button>
        </div>
    </fieldset>
</form>
<div>
   <br>
    <a href="index.php">Cancel</a>
</div>