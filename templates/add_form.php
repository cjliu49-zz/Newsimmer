<form action="add.php" method="post">
<br>
<p>
<strong>Add a link to your reading list:</strong>
</p>
<fieldset>
<!--         <div class="form-group">
            <input class="form-control" name="url" size = "35" placeholder="Paste a URL (Required)" type="text" id="addlink"/> 
        </div> -->

            <form action="/update">
                <div class = "form-group">

                    <input class="form-control" size = "35" placeholder="Paste a URL (Required)" id = "url" type="text" name="url"/>           
                    <div class="selector-wrapper"></div>
                </div>
            </form>

            <script>
                $('#url').preview({key:'93eaa2c8d1d44957ad6b9645c62475d0'})

                $('#url').on('loading', function(){$('.loading').show()});

                $('form').on('submit', function(){
                  $(this).addInputs($('#url').data('preview'));
                  return true;
                });
            
            </script>

<!--         <div class="form-group">
            <input class="form-control" name="url_title" size = "70" placeholder="Title your link (Optional)" type="text"/> 
        </div> -->

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
