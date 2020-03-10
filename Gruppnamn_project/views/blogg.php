
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/body.css" type="text/css" rel="stylesheet" />

    <title>Document</title>
</head>
<body>



<div class="row">

<!------------------Här skriver man blogg-inlägg--------------------------->

      <form method="POST" action="./handlers/handlePost.php"> <!-- alla våra inlägg kommer landa i post-arrayen på sida handlepost..php-->
        <h2>Titel: </h2><br />
        <input type="text" name="title">
        <h2>Inlägg: </h2><br />
        <textarea name="description" rows="30" cols="100"></textarea><br />
        <input type="submit" value="Skicka inlägg" />
    </form> 


</div>

<div class="footer">
  <h2>Footer</h2>
</div>
    
</body>
</html>