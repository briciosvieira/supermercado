<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "supermercado";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

if(isset($_POST['search'])){
    $searchTerm = $_POST['search'];

    $sql = "SELECT * FROM produto WHERE nomeProduto LIKE '%$searchTerm%'";

    $result = $conn->query($sql);

    $products = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
}

$conn->close();
include 'pesquisa.php';
?>
