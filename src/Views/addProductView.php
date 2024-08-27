<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/assets/css/styles.css" rel="stylesheet">
    <title>Add Product</title>
</head>
<body class="bg-dark">
<div class="container-fluid row p-2">
    <h1 class="text-white col align-self-start m-2">Product Add</h1>
    <div class="col-8 d-flex justify-content-end align-self-center gap-2">
        <button class="btn btn-warning" id="saveBtn" type="submit" form="productAdd">Save</button>
        <a href="/"> <button class="btn btn-warning" id="cancelBtn" type="button">Cancel</button></a>
    </div>
</div>

<form method="POST" action="/add-product" id="productAdd" class="container">
    <div id="errorMessage" class="error hidden"></div>
    <div class="row gap-2 p-2 w-50">
        <input type="text" id="sku" name="sku" placeholder="SKU" class="form-control" required />
    </div>
    <div class="row gap-2 p-2 w-50">
        <input type="text" id="name" name="name" placeholder="Name" class="form-control" required />
    </div>
    <div class="row gap-2 p-2 w-50">
        <input type="number" id="price" name="price" placeholder="Price" class="form-control" required />
    </div>
    <div class="row gap-2 p-2 w-50">
        <select id="type" name="type" class="form-control" onchange="showInputField()" required>
            <option value="">Select Type</option>
            <option value="DVD">DVD</option>
            <option value="Furniture">Furniture</option>
            <option value="Book">Book</option>
        </select>
    </div>
    <div id="dvdFields" class="row gap-2 p-2 w-50 hidden">
        <input type="number" id="size"  placeholder="Size (MB)" class="form-control" />
    </div>
    <div id="bookFields" class="row gap-2 p-2 w-50 hidden">
        <input type="number" id="weight"  placeholder="Weight (Kg)" class="form-control" />
    </div>
    <div id="furnitureFields" class="row gap-2 p-2 w-50 hidden">
        <input type="number" id="height"  placeholder="Height (CM)" class="form-control" />
        <input type="number" id="width"  placeholder="Width (CM)" class="form-control" />
        <input type="number" id="length"  placeholder="Length (CM)" class="form-control" />
    </div>

    <input type="hidden" id="attrribute"  name="attrribute" placeholder="attrribute"/>

    <div id="typeDescription" class="text-warning hidden"></div>
</form>

<script>
    function showInputField() {
        const type = document.getElementById('type').value;

        document.getElementById('dvdFields').classList.toggle('hidden', type !== 'DVD');
        document.getElementById('bookFields').classList.toggle('hidden', type !== 'Book');
        document.getElementById('furnitureFields').classList.toggle('hidden', type !== 'Furniture');

        const description = {
            'DVD': "Please, provide size (in MB)",
            'Book': "Please, provide weight (in Kg)",
            'Furniture': "Please, provide dimensions (HxWxL in CM)"
        };

        const descElement = document.getElementById('typeDescription');
        if (description[type]) {
            descElement.textContent = description[type];
            descElement.classList.remove('hidden');
        } else {
            descElement.classList.add('hidden');
        }
    }

    document.getElementById('saveBtn').addEventListener('submit', function (event) {


        let attributeValue = '';

        // Handle dynamic attribute field based on the type
        const type = document.getElementById('type').value;
        if (type === 'Furniture') {
            const height = document.getElementById('height').value || '0';
            const width = document.getElementById('width').value || '0';
            const length = document.getElementById('length').value || '0';

            attributeValue = `${height}x${width}x${length}`;
        } else if (type === 'DVD') {
            const size = document.getElementById('size').value || '0';
            attributeValue = size;
        } else if (type === 'Book') {
            const weight = document.getElementById('weight').value || '0';
            attributeValue = weight;
        }

        document.getElementById('attrribute').value = attributeValue;





    });
</script>
</body>
</html>
