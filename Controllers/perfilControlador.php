<?php
require_once "../Controllers/LoginSignInController.php";
include("Head.php");

if (!isset($_SESSION['user'])) {
    header('Location: acessoUsuario.php');
    exit;
}

$userId = $_SESSION['user'];

$host = 'localhost:3306';
$dbname = 'supermercado';
$username = 'root';
$password = '';

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_user'])) {
    $editUserId = $_POST['user_id'];
    $newName = $_POST['nome'];
    $newCpf = $_POST['cpf'];
    $newEmail = $_POST['email'];
    $newTelephone = $_POST['telefone'];
    $newAddress = $_POST['endereco'];

    if ($editUserId == $userId) {
        $updateQuery = "UPDATE usuario SET nome = :nome, cpf = :cpf, email = :email, telefone = :telefone, endereco = :endereco WHERE idUser = :id";
        $updateStmt = $connection->prepare($updateQuery);
        $updateStmt->bindValue(':nome', $newName);
        $updateStmt->bindValue(':cpf', $newCpf);
        $updateStmt->bindValue(':email', $newEmail);
        $updateStmt->bindValue(':telefone', $newTelephone);
        $updateStmt->bindValue(':endereco', $newAddress);
        $updateStmt->bindValue(':id', $editUserId);
        $updateStmt->execute();
    } else {
        header('Location: ../Views/perfil.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user'])) {
    $deleteUserId = $_POST['user_id'];

    if ($deleteUserId == $userId) {
        header('Location: index.php');
        exit;
    }

    $deleteQuery = "DELETE FROM usuario WHERE idUser = :id";
    $deleteStmt = $connection->prepare($deleteQuery);
    $deleteStmt->bindValue(':id', $deleteUserId);
    $deleteStmt->execute();

    header('Location: index.php');
    exit;
}

$query = "SELECT * FROM usuario";
$stmt = $connection->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
