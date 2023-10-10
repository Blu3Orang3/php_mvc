<!DOCTYPE html>
<html>

<head>
  <title>Upload</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
  <h1>Home Page</h1>
  <hr />
  <div>
    <h2>Invoice</h2>
    <?php if (! empty($invoice)) : ?>
    <p>Invoice ID: <?= htmlspecialchars($invoice['id'], ENT_QUOTES)  ?></p>
    <p>Invoice Amount: <?= htmlspecialchars($invoice['amount'], ENT_QUOTES)  ?></p>
    <p>User: <?= htmlspecialchars($invoice['full_name'], ENT_QUOTES)  ?></p>
    <?php endif; ?>
  </div>
</body>

</html>