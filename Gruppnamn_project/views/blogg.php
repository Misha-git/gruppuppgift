

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/body.css" type="text/css" rel="stylesheet" />

    <title>Document</title>
</head>
<body>

<div class="header">
  <h2>Blog Name</h2>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      
      <h2>TITLE HEADING</h2>
      <h5>Title description, Dec 7, 2017</h5>
      <div class="fakeimg" style="height:200px;">Image</div>
      <p>Some text..</p>

    <form method="POST" action="../handlers/handlePost.php"> <!-- alla våra inlägg kommer landa i post-arrayen på sida handlepost..php-->
        <!-- <h2>Användare: </h2><br />
        <input type="text" name="user_id" required /><br /> -->
        <h2>Titel: </h2><br />
        <input type="text" name="title">
        <h2>Inlägg: </h2><br />
        <textarea name="description" rows="30" cols="100"></textarea><br />
        <input type="submit" value="Skicka inlägg" />
    </form> 

    </div>

  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>
    
</body>
</html>