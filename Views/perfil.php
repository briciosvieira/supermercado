<?php
require_once "../Controllers/perfilControlador.php"; 

?>

<!DOCTYPE html>
<html>
<body>
<?php foreach ($users as $user): ?>
<div class="container h-100" style="margin-block: 1%;">
    <div class="card-wrapper">
        <div class="card fat">
            <div class="card-body">
            <center><h2>Bem vindo (a), <?php echo $user['nome']; ?>.</h2></center><br>
                <?php if ($user['idUser'] != $userId): ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome-pagamento">Nome Completo</label>
                        <input type="text" class="form-control" disabled id="nomecliente" placeholder="<?php echo $user['nome']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="nome-pagamento">CPF</label>
                        <input type="text" class="form-control" disabled id="cpf" placeholder="<?php echo $user['cpf']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nome-pagamento">Email</label>
                        <input type="text" class="form-control" disabled id="email" placeholder="<?php echo $user['email']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-2">
                        <label for="nome-pagamento">Telefone</label>
                        <input type="text" class="form-control" disabled id="telefone" placeholder="<?php echo $user['telefone']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nome-pagamento">Endereço</label>
                        <input type="text" class="form-control" disabled id="enderenco" placeholder="<?php echo $user['endereco']; ?>" required autofocus>
                    </div>

                    
                    <br><br>
                    <center>
                    <form method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $user['idUser']; ?>">
                        <a href='./perfil-editar.php'>
                            <button type="submit" class="btn btn-warning btn-block" style=" font-size: 25px;">
                                <span style="color: white">Editar Perfil</span></a>
                            </button>
                        
                            <button type="submit" name="delete_user"class="btn btn-danger btn-block" style=" font-size: 25px;">
                                Excluir Perfil
                            </button>
                    </form>
                    </center>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php require "Footer.php"; ?>

</body>
</html>