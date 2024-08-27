<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../public/assets/css/styles.css" rel="stylesheet" >
    <title>Product List</title>
</head>
<body class="bg-dark">
<div class="container-fluid row p-2">
    <h1 class="text-white col align-self-start m-2" id="productList">Product List</h1>
    <div class="col-8 d-flex justify-content-end align-self-center gap-2">
      <a href="/add-product"> <button class="btn btn-warning">ADD</button></a>
        <button type="submit" class="btn btn-warning" id="mass-delete-btn" form="massDeleteForm">MASS DELETE</button>
    </div>
</div>

<form id="massDeleteForm" method="POST" action="/delete-products">
    <div class="d-flex flex-wrap container gap-3">
        <?php foreach ($products as $product) { ?>
            <div class="d-flex flex-wrap flex-column container bg-secondary rounded w-10 h-10 text-white">
                <div>
                    <input type="checkbox" class="delete-checkbox" name="sku[]" value="<?= htmlspecialchars($product->sku, ENT_QUOTES, 'UTF-8') ?>" />
                </div>
                <div class="text-center">
                    <p><?= htmlspecialchars($product->sku, ENT_QUOTES, 'UTF-8') ?></p>
                    <p><?= htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') ?></p>
                    <p><?= htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8') ?> $</p>
                    <p><?= htmlspecialchars($product->type, ENT_QUOTES, 'UTF-8') ?></p>
                    <p><?= htmlspecialchars($product->attrribute, ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
         setTimeout(document.getElementById('productList').classList.add('hidden'),10000);
         setTimeout(document.getElementById('productList').classList.remove('hidden'),10000);
</script>
</body>
</html>
