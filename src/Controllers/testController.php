<?php

namespace App\Controllers;
use App\Controller;
use App\Models\Products;
class testController extends Controller
{

    public function test()
        {
            $ProductsModel = new Products();
            $products = $ProductsModel->getProducts();

            $this->render('productListView', ['products' => $products]);
        }

   public function addProduct(){
        $ProductsModel = new Products();
       $products = $ProductsModel->getProducts();
       $this->render('addProductView', ['products' => $products]);

   }
    public function testAdd()
    {
        $ProductsModel = new Products();
        $ProductsModel->addProduct();
        // Redirect to product list after adding the product
        header("/");
        exit();
    }
    public function testEdit(){
        $ProductsModel3 = new Products();
        $ProductsModel3->editProduct();
    }

//    public function testDelete(){
//        $ProductsModel3 = new Products();
//        $ProductsModel3->deleteProduct();
//    }

    public function deleteProducts()
    {
        $ProductsModel = new Products();

        // Debugging: Print the POST data to check what is being received
        print_r($_POST);

        // Check if the request is POST and if the sku array exists
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sku']) && !empty($_POST['sku'])) {
            $skus = $_POST['sku'];

            foreach ($skus as $sku) {
                $ProductsModel->deleteProduct($sku);
            }
            header("Location: /");
            echo "Selected products deleted successfully";
        } else {
            echo "No products selected for deletion";
        }
    }





}