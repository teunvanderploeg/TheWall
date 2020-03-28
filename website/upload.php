<?php include('login_check.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style/center.css" />
    <title>Document</title>
  </head>
  <body>
    <?php include('header.php'); ?>
    <form
      action="bewaar_afbeelding.php"
      method="post"
      enctype="multipart/form-data"
    >
    <div class="wrapper">
    <h1>Upload</h1>
    <div class="form">
    <label for="">Titel</label>
      <input require type="text" name="titel" /><br />
      <label for="">Bijschrift</label>
      <input require type="text" name="bijschrift" /><br />
      <label for="">Selecteer de afbeelding</label>
      <input
      require
        type="file"
        name="fileToUpload"
        id="fileToUpload"
        accept="image/*"
      />
      <br>
      <input type="submit" value="Upload" name="submit" />
      </div>
      </div>
    </form>
  </body>
</html>
