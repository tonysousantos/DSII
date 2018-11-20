<?php 

class Usuario {
	private $id;
	private $nome;
	private $login;
	private $senha;
	private $email;
	private $nivel_acesso;
	private $data_cadastro;
	private $data_modify;


	public function getId(){
		return $this->id;
	}

	public function setId($valeu){
		$this->id = $valeu;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($valeu){
		$this->nome = $valeu;
	}

	public function getLogin(){
		return $this->login;
	}

	public function setLogin($valeu){
		$this->login = $valeu;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($valeu){
		$this->senha = $valeu;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($valeu){
		$this->email = $valeu;
	}

	public function getNivelAcesso(){
		return $this->nivel_acesso;
	}

	public function setNivelAcesso($valeu){
		$this->nivel_acesso = $valeu;
	}

	public function getDataCadastro(){
		return $this->data_cadastro;
	}

	public function setDataCadastro($valeu){
		$this->data_cadastro = $valeu;
	}

	public function getDataModify(){
		return $this->data_modify;
	}

	public function setDataModify($valeu){
		$this->data_modify = $valeu;
	}

// Listar usuario filtrando pelo ID
	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM usuario WHERE id = :ID", array(
			":ID" => $id
		));

		if(count($results[0]) > 0){
			$this->setData($results[0]);
		}
		$dados = $results[0];
	}

// Lista todos os usuarios cadastrados na tabela
	public static function getUser($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM usuario WHERE id = :ID", array(
			":ID" => $id
		));

		return $results;
	}

// Lista todos os usuarios cadastrados na tabela
	public static function getList(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM usuario ORDER BY nome");
	}

// Busca de usuario pelo nome, login ou e-mail
	public static function search($pesq){
		$sql = new Sql();
		return $sql->select("SELECT * FROM usuario WHERE nome LIKE :NOME OR login LIKE :LOGIN OR email LIKE :EMAIL  ORDER BY login", array(
			':NOME' => "%".$pesq."%",
			':LOGIN' => "%".$pesq."%",
			':EMAIL' => "%".$pesq."%"
		));
	}

// Carrega um usuario usando login e SENHA
	public function login($login, $senha){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM usuario WHERE login = :LOGIN AND senha = :SENHA LIMIT 1", array(
			":LOGIN" => $login,
			":SENHA" => $senha
		));
		/*
		if(count($results) > 0){
			$this->setData($results[0]);
		}else{
			throw new Exception("Login e/ou senha inválidos.");
		}
		*/
		return $results;
	}

	public function setData($data){

		$this->setId($data['id']);
		$this->setNome($data['nome']);
		$this->setLogin($data['login']);
		$this->setSenha($data['senha']);
		$this->setEmail($data['email']);
		$this->setNivelAcesso($data['nivel_acesso']);
		$this->setDataCadastro(new DateTime($data['data_cadastro']));
		$this->setDataModify(new DateTime($data['data_modify']));
	}

	public function insert($data){
		$this->setNome(ucwords(strtolower(utf8_decode($data['nome']))));
		$this->setLogin(utf8_decode($data['login']));
		$this->setSenha(utf8_decode($data['senha']));
		$this->setEmail(utf8_decode($data['email']));
		$this->setNivelAcesso(isset($data['nivel_acesso']) ? $data['nivel_acesso'] : 0);

		$sql = new Sql();
		$sql->query("INSERT INTO usuario (nome, login, senha, email, nivel_acesso, data_cadastro) VALUES (:NOME, :LOGIN, :SENHA, :EMAIL, :NIVELACESSO, NOW())", array(
			':NOME' 	=> $this->getNome(),
			':LOGIN' 	=> $this->getLogin(),
			':SENHA' 	=> $this->getSenha(),
			':EMAIL' 	=> $this->getEmail(),
			':NIVELACESSO' 	=> $this->getNivelAcesso()
		));
	}

	public function update($data){
		$id = $data['id'];
		$this->setNome(ucwords(strtolower(utf8_decode($data['nome']))));
		$this->setLogin(utf8_decode($data['login']));
		$this->setSenha(utf8_decode($data['senha']));
		$this->setEmail(utf8_decode($data['email']));
		$this->setNivelAcesso(isset($data['nivel_acesso']) ? $data['nivel_acesso'] : 0);

		$sql = new Sql();
		$sql->query("UPDATE usuario SET nome = :NOME, login = :LOGIN, senha = :SENHA, email = :EMAIL, nivel_acesso = :NIVELACESSO, data_modify = NOW() WHERE id = :ID", array(
			':ID'		=> $id,
			':NOME' 	=> $this->getNome(),
			':LOGIN' 	=> $this->getLogin(),
			':SENHA' 	=> $this->getSenha(),
			':EMAIL' 	=> $this->getEmail(),
			':NIVELACESSO' 	=> $this->getNivelAcesso()
		));
	}

	public function delete($id){
		$sql = new Sql();
		$sql->query("DELETE FROM usuario WHERE id = :ID", array(
			':ID' => $id
		));

		$this->setId(0);
		$this->setNome("");
		$this->setLogin("");
		$this->setSenha("");
		$this->setEmail("");
		$this->setNivelAcesso(0);	
		$this->setDataCadastro(new DateTime());
		$this->setDataModify(new DateTime());

	}

	public function __toString(){
		return json_encode(array(
			"id"	=>$this->getId(),
			"nome"	=>$this->getNome(),
			"login"	=>$this->getLogin(),
			"senha"	=>$this->getSenha(),
			"email"	=>$this->getEmail(),
			"nivel_acesso"	=>$this->getNivelAcesso(),
			"data_cadastro"	=>$this->getDataCadastro()->format('d/m/Y H:i:s'),
			"data_modify"	=>$this->getDataModify()->format('d/m/Y H:i:s')
		));
	}




}

?>