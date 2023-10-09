<!DOCTYPE html>
<html>

<head>
  <title>Upload</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
  <h1>Hello <?= $name ?>, You can upload here </h1>
  <form action="/upload" method="post" enctype="multipart/form-data">
    <input type="file" name="myFile" />
    <button type="submit">Upload</button>
  </form>
</body>

</html>