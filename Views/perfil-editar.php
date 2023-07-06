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
            <center><h2>Editar o perfil de <?php echo $user['nome']; ?>.</h2></center><br>
                <?php if ($user['idUser'] != $userId): ?>
                <div class="form-row">
                <form method="POST">
                <input type="hidden" name="user_id" value="<?php echo $user['idUser']; ?>">
                    <div class="form-group col-md-6">
                        <label for="nome-pagamento">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $user['nome']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="nome-pagamento">CPF</label>
                        <input type="text" class="form-control" name="cpf" value="<?php echo $user['cpf']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nome-pagamento">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-2">
                        <label for="nome-pagamento">Telefone</label>
                        <input type="text" class="form-control" name="telefone" value="<?php echo $user['telefone']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nome-pagamento">Endereço</label>
                        <input type="text" class="form-control" name="enderenco" value="<?php echo $user['endereco']; ?>" required autofocus>
                    </div>

                    
                    <br><br>
                    <center>
                    <input type="hidden" name="user_id" value="<?php echo $user['idUser']; ?>">
                        <a href='./perfil.php'>
                            <button type="submit" class="btn btn-warning btn-block" style=" font-size: 25px;">
                                <span style="color: white">Cancelar</span></a>
                            </button>
                            
                            <button type="submit" name="save_user"class="btn btn-success btn-block" style=" font-size: 25px;">
                                Salvar
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