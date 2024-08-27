<?php

namespace App\Models;

use App\Dbh;
use PDO;

class Products extends Dbh
{
    private $products = [];

    public function __construct()
    {
        // Get the connection
        $conn = $this->connect();

        // Check if the connection was successful
        if ($conn) {
            $sql = "SELECT * FROM products";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $this->products = $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Failed to connect to the database.";
        }
    }

    public function getProducts()
    {

     return ($this->products);

    }


    public function addProduct()
    {
        $conn = $this->connect();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Debugging statement
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';

            if (isset($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['type'], $_POST['attrribute'])) {
                $sku = $_POST['sku'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $type = $_POST['type'];
                $attribute = $_POST['attrribute'];
                $sql = "INSERT INTO products (`sku`, `name`, `price`, `type`, `attrribute`) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$sku, $name, $price, $type, $attribute]);
                echo "Product added successfully";
                header('Location: '."/");
                exit();
            } else {
                echo "Missing required fields";
            }
        }
    }



//    public function addProduct()
//    {
//        $conn = $this->connect();
//
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            // Debugging statement
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//
//            if (isset($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['type'],$POST['attribute'])) {
//                $sku = $_POST['sku'];
//                $name = $_POST['name'];
//                $price = $_POST['price'];
//                $type = $_POST['type'];
//                $attribute = $POST['attribute'];
//
//
//
//                // Prepare the SQL statement
//                $sql = "INSERT INTO products (sku, name, price, type, attribute) VALUES (?, ?, ?, ?, ?)";
//                $stmt = $conn->prepare($sql);
//
//                // Debugging statement
//                echo '<pre>';
//                echo "SQL: $sql\n";
//                echo "Values: " . implode(", ", [$sku, $name, $price, $type, $attribute]);
//                echo '</pre>';
//
//                try {
//                    // Execute the statement
//                    $stmt->execute([$sku, $name, $price, $type, $attribute]);
//                    echo "Product added successfully";
//                } catch (PDOException $e) {
//                    echo "Error: " . $e->getMessage();
//                }
//            } else {
//                echo "Missing required fields.";
//            }
//        }
//    }



    public function editProduct()
    {
        $conn = $this->connect();

        // Parse PUT request data
        parse_str(file_get_contents("php://input"), $_PUT);

        // Check if the request method is PUT
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            // Ensure required fields are present
            if (isset($_PUT['sku'], $_PUT['name'], $_PUT['price'], $_PUT['type'], $_PUT['attrribute'])) {
                $sku = $_PUT['sku'];
                $name = $_PUT['name'];
                $price = $_PUT['price'];
                $type = $_PUT['type'];
                $attribute = $_PUT['attrribute'];

                // Prepare the SQL statement with a WHERE clause to specify which record to update
                $sql = "UPDATE products SET `name` = ?, `price` = ?, `type` = ?, `attrribute` = ? WHERE `sku` = ?";
                $stmt = $conn->prepare($sql);

                try {
                    // Execute the statement
                    $stmt->execute([$name, $price, $type, $attribute, $sku]);
                    echo "Product edited successfully";
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } else {
                echo "Missing required fields";
            }
        } else {
            echo "Invalid request method";
        }
    }
    public function deleteProduct($sku)
    {
        $conn = $this->connect();

        // Prepare the SQL statement to delete the product by SKU
        $sql = "DELETE FROM products WHERE `sku` = ?";
        $stmt = $conn->prepare($sql);

        try {
            // Execute the statement
            $stmt->execute([$sku]);
            echo "Product with SKU $sku deleted successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }



}