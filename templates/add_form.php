<form action="add.php" method="post">
<br>
<p>
<strong>Add a link to your reading list:</strong>
</p>
<fieldset>
        <div class="form-group">
            <input class="form-control" name="url" placeholder="Paste URL to Add" type="text"/> 
        </div>

        <div class="form-group">
            <textarea class="form-control" name="description" rows="7" cols="70" placeholder="Describe your link (Optional)"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default">Add Link</button>
        </div>
    </fieldset>
</form>
<div>
   <br>
    <a href="index.php">Cancel</a>
</div>
