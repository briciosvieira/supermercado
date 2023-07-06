<?php
// Load the configuration
require_once 'config.php';

// Load the Products model
require_once 'Models/Produto.php';

// Get all products
$products = Produto::getAll();

// Rest of your code...

// Refresh the page every time a new product is added
if (isset($_SESSION['addedToCart'])) {
    unset($_SESSION['addedToCart']);
    header('Refresh: 0');
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
</head>
<body>
    <h2>Products</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product->getIdProduto(); ?></td>
                <td><?php echo $product->getNomeProduto(); ?></td>
                <td><?php echo $product->getPrecoProduto(); ?></td>
                <td>
                    <form method="post" action="index.php?controller=cart&action=addToCart">
                        <input type="hidden" name="idProduto" value="<?php echo $product->getIdProduto(); ?>">
                        <input type="number" name="quantidade" value="1">
                        <button type="submit">Add to Cart</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
