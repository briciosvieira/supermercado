<?php
require_once '/Models/Produto.php';

class ProductController {
    public function index() {
        $products = Produto::getAll();
        require '/Views/product_list.php';
    }
}
?>
