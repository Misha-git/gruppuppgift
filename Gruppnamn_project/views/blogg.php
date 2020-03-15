
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/body.css" type="text/css" rel="stylesheet" />

    <title>Blogg</title>
</head>
<body>

<div class="row">

<!----------------------Här skriver man blogg-inlägg--------------------------->
    <form method="POST" action="./handlers/uploads.php" enctype="multipart/form-data">
    <form method="POST" action="./handlers/handlePost.php"> 
      
   
        <h2>Titel: </h2><br />
        <input type="text" name="title" />
        <h3>Inlägg: </h3><br />
        <textarea name="description" rows="30" cols="50"></textarea><br />

        <label for="category">Välj en kategori:</label><br />
        <select name="category" value="category">
            <option value="Allmänt" selected>Allmänt</option>
            <option value="Recept">Recept</option>
            <option value="Mode">Mode</option>
            <option value="Musik">Musik</option>
            <option value="Inredning">Inredning</option>
        </select> <br />

    
        Select image :
        <input type="file" name="picture" value="picture" /><br/>
        <button type="submit" name="submit">Ladda upp</button>
        

  
        </form>
        </form>
        


</div>
    
</body>
</html>