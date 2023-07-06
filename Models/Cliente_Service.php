<?php
class ClienteService{

	public function create(){
		$query = 'insert into usuario
			(nome, cpf, email, telefone, endereco, password)
		values
			(:nome, :cpf, :email, :telefone, :endereco, :senha)';
    
	$stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':nome',$this->cadastro->__get('nome'));
    $stmt->bindValue(':cpf',$this->cadastro->__get('cpf'));
	$stmt->bindValue(':email',$this->cadastro->__get('email'));
    $stmt->bindValue(':telefone',$this->cadastro->__get('telefone'));
    $stmt->bindValue(':endereco',$this->cadastro->__get('endereco'));
	$stmt->bindValue(':senha',$this->cadastro->__get('password'));
		$stmt->execute();

	}

	public function read(){
		$query = 'select
			nome, cpf, email, telefone, endereco, password
		from usuario';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function update(){		
		$query = "update usuario SET
			nome = :nome, cpf = :cpf, email = :email, telefone = :telefone, endereco = :endereco, senha = :senha
        WHERE idUser= :idUser";

		$stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nome',$this->cadastro->__get('nome'));
		$stmt->bindValue(':cpf',$this->cadastro->__get('cpf'));
        $stmt->bindValue(':email',$this->cadastro->__get('email'));
        $stmt->bindValue(':telefone',$this->cadastro->__get('telefone'));
        $stmt->bindValue(':endereco',$this->cadastro->__get('endereco'));
        $stmt->bindValue(':senha',$this->cadastro->__get('password'));
		$stmt->bindValue(':idUser',$this->cadastro->__get('idUser'));
		return $stmt->execute();
	}


	public function delete(){
		$query = 'delete from usuario WHERE idUser = :idUser';
		$stmt= $this->conexao->prepare($query);
		$stmt->bindValue(':idUser',$this->cadastro->__get('idUser'));
		$stmt->execute();
	}

	public function getClientes() {
		try {
		  $conexao =Conexao::conectar();
		  $sql = "SELECT * FROM usuario";
		  $stmt = $conexao -> prepare($sql);	
		  $stmt -> execute();
		  
		  $clientes = array();
	
		  while ($data = $stmt->fetch()) {
			$cliente = new ClienteModel($data['idUser'], $data['nome'], $data['cpf'], $data['email'],  $data['telefone'],  $data['endereco'], $data['senha']);
			$cliente->setIdUser($data["idUser"]);
			$cliente->setNome($data["nome"]);
			$cliente->setCpf($data["cpf"]);
			$cliente->setEmail($data["email"]);
			$cliente->setTelefone($data["telefone"]);
			$cliente->setEndereco($data["endereco"]);
			array_push($clientes, $cliente);
		  }
	
		  return $clientes;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	  }

	  public static function checkEmail($email){
		try {
            $conexao = Conexao::conectar();

            $sql = $conexao->prepare("SELECT u.idUser, u.senha from supermercado.usuario as u where u.email = :email ");
            $sql->bindParam(":email", $email);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $query =  $sql->fetch(PDO::FETCH_ASSOC);

            if ($query == false) {
                return 'falso';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
	  }

	  public static function checkSenha($email){
		try {
            $conexao = Conexao::conectar();

            $sql = $conexao->prepare("SELECT u.senha from supermercado.usuario as u where u.email = :email ");
            $sql->bindParam(":email", $email);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $query =  $sql->fetch(PDO::FETCH_ASSOC);

            if ($query['senha'] !== $_POST['password']) {
                return false;
            } else return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
	  }

	  public static function getClienteById($idUser){
		try {
			$conexao = Conexao::conectar();
			$sql = $conexao->prepare("SELECT * from supermercado.usuario as u where u.idUser = :idUser");
			$sql->bindParam("idUser", $idUser);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			$data = $sql->fetch(PDO::FETCH_ASSOC);
			$usuario = new ClienteModel($data['idUser'], $data['nome'], $data['cpf'], $data['email'],  $data['telefone'],  $data['endereco'], $data['senha']);

			$idUser = $usuario->getIdUser();

			$user = new ClienteModel(
				$usuario->getNome(),
				$usuario->getCpf(),
				$usuario->getEmail(),
				$usuario->getTelefone(),
				$usuario->getEndereco(),
				$usuario->getSenha(),
				$id,
			);

			return $user;
		} catch (PDOException $e) {
            echo $e->getMessage();
        }
	  }

	  public static function getCliente($email){
		try {
            $conexao = Conexao::conectar();
            $sql = $conexao->prepare("SELECT * from supermercado.usuario as u where u.email = :email");
            $sql->bindParam(":email", $email);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $usuario = new ClienteModel($data['idUser'], $data['nome'], $data['cpf'], $data['email'],  $data['telefone'],  $data['endereco'], $data['senha']);

			$id = $usuario->getIdUser();
			$user = new ClienteModel(
				$usuario->getNome(),
				$usuario->getCpf(),
				$usuario->getEmail(),
				$usuario->getTelefone(),
				$usuario->getEndereco(),
				$usuario->getSenha(),
				$id,
			);

            return $user;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
	  }

	  public static function getNomeCliente($email)
	  {
		try {
            $conexao = Conexao::conectar();
            $sql = $conexao->prepare("SELECT * from supermercado.usuario as u where u.email = :email");
            $sql->bindParam(":email", $email);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $usuario = new ClienteModel($data['idUser'], $data['nome'], $data['cpf'], $data['email'],  $data['telefone'],  $data['endereco'], $data['senha']);

			$nome = $usuario->getNome();
			$_SESSION['nomeCliente'] = $nome;
            return $_SESSION['nomeCliente'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
	  }

	  public static function getIdUser($email){
		try {
            $conexao = Conexao::conectar();
            $sql = $conexao->prepare("SELECT * from supermercado.usuario as u where u.email = :email");
            $sql->bindParam(":email", $email);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $usuario = new ClienteModel($data['idUser'], $data['nome'], $data['cpf'], $data['email'],  $data['telefone'],  $data['endereco'], $data['senha']);

			$id = $usuario->getIdUser();
			$_SESSION['idCliente'] = $id;
            return $_SESSION['idCliente'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
	  }
}


?>