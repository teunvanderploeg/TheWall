<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <?php include('header.php'); ?>
    <form
      action="bewaar_afbeelding.php"
      method="post"
      enctype="multipart/form-data"
    >
      <h5>Title:</h5>
      <input require type="text" name="titel" /><br />
      <h5>aurteur:</h5>
      <input require type="text" name="auteur" /><br />
      <h5>bijschrift:</h5>
      <input require type="text" name="bijschrift" /><br />
      <h5>Select image to upload:</h5>
      <input
      require
        type="file"
        name="fileToUpload"
        id="fileToUpload"
        accept="image/*"
      />
      <br>
      <input type="submit" value="supmit" name="submit" />
    </form>
  </body>
</html>
