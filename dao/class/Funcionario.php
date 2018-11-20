<?php

class Funcionario {

    private $id_funcionario;
    private $nome;
    private $email;
    private $cpf;
    private $id_funcao;
    private $fun_data_cadastro;
    private $fun_data_modify;

    function getId() {
        return $this->id_funcionario;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getId_funcao() {
        return $this->id_funcao;
    }

    function getfun_data_cadastro() {
        return $this->fun_data_cadastro;
    }

    function getfun_data_modify() {
        return $this->fun_data_modify;
    }

    function setId($id) {
        $this->id_funcionario = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setId_funcao($id_funcao) {
        $this->id_funcao = $id_funcao;
    }

    function setfun_data_cadastro($fun_data_cadastro) {
        $this->fun_data_cadastro = $fun_data_cadastro;
    }

    function setfun_data_modify($fun_data_modify) {
        $this->fun_data_modify = $fun_data_modify;
    }

// Listar funcionario filtrando pelo ID
    public function loadById($id) {
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM funcionario WHERE id_funcionario = :ID", array(
            ":ID" => $id
        ));

        if (count($results[0]) > 0) {
            $this->setData($results[0]);
        }
        $dados = $results[0];
    }

// Lista funcionarios por ID
    public static function getUser($id) {
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM funcionario WHERE id_funcionario = :ID", array(
            ":ID" => $id
        ));

        return $results;
    }

// Lista todos os funcionarios cadastrados na tabela
    public static function getList() {
        $sql = new Sql();
        //return $sql->select("SELECT * FROM funcionario ORDER BY nome");
        return $sql->select("SELECT * FROM funcionario f1 INNER JOIN funcao f2 ON f1.id_funcao = f2.funcao_id");
    }

//Todos os Funcionario
    public static function getAll() {
        $sql = new Sql();
        return $sql->select("SELECT * FROM funcionario ORDER BY nome" );
    }

// Busca de funcionario pelo nome, login ou e-mail
    public static function search($pesq) {
        $sql = new Sql();
        return $sql->select("SELECT * FROM funcionario f1 INNER JOIN funcao f2 ON f1.id_funcao = f2.funcao_id WHERE nome LIKE :NOME OR cpf LIKE :CPF OR email LIKE :EMAIL  ORDER BY nome", array(
            ':NOME' => "%" . $pesq . "%",
            ':CPF' => "%" . $pesq . "%",
            ':EMAIL' => "%" . $pesq . "%"
        ));
    }

    public function setData($data) {

        $this->setId($data['id_funcionario']);
        $this->setNome($data['nome']);
        $this->setEmail($data['email']);
        $this->setCpf($data['cpf']);
        $this->setId_funcao($data['id_funcao']);
        $this->setDataCadastro(new DateTime($data['fun_data_cadastro']));
        $this->setDataModify(new DateTime($data['fun_data_modify']));
    }

    // Insere Funcionário
    public function insert($data) {
        $this->setNome(ucwords(strtolower(utf8_decode($data['nome']))));
        $this->setEmail(utf8_decode($data['email']));
        $this->setCpf($data['cpf']);
        $this->setId_funcao((int)$data['id_funcao']);

        $sql = new Sql();
        $sql->query("INSERT INTO funcionario (nome, email, cpf, id_funcao, fun_data_cadastro) VALUES (:NOME, :EMAIL, :CPF, :IDFUNCAO, NOW())", array(
            ':NOME' => $this->getNome(),
            ':EMAIL' => $this->getEmail(),
            ':CPF' => $this->getCpf(),
            ':IDFUNCAO' => $this->getId_funcao()
        ));

        //var_dump($data);
        //exit;
    }

    // Altera dados do funcionário
    public function update($data) {
        $id = $data['id_funcionario'];
        $this->setNome(ucwords(strtolower(utf8_decode($data['nome']))));
        $this->setEmail(utf8_decode($data['email']));
        $this->setCpf($data['cpf']);
        $this->setId_funcao($data['id_funcao']);

        $sql = new Sql();
        $sql->query("UPDATE funcionario SET nome = :NOME, email = :EMAIL, cpf = :CPF, id_funcao = :IDFUNCAO, fun_data_modify = NOW() WHERE id_funcionario = :ID", array(
            ':ID' => $id,
            ':NOME' => $this->getNome(),
            ':EMAIL' => $this->getEmail(),
            ':CPF' => $this->getCpf(),
            ':IDFUNCAO' => $this->getId_funcao()
        ));
    }

    // Deleta Funcionário
    public function delete($id) {
        $sql = new Sql();
        $sql->query("DELETE FROM funcionario WHERE id_funcionario = :ID", array(
            ':ID' => $id
        ));

        $this->setId(0);
        $this->setNome("");
        $this->setEmail("");
        $this->setCpf("");
        $this->setId_funcao(0);
        $this->setfun_data_cadastro(new DateTime());
        $this->setfun_data_modify(new DateTime());
    }

    public function __toString() {
        return json_encode(array(
            "id" => $this->getId(),
            "nome" => $this->getNome(),
            "email" => $this->getEmail(),
            "cpf" => $this->getCpf(),
            "id_funcao" => $this->getId_funcao(),
            "nivel_acesso" => $this->getNivelAcesso(),
            "fun_data_cadastro" => $this->getfun_data_cadastro()->format('d/m/Y H:i:s'),
            "fun_data_modify" => $this->getfun_data_modify()->format('d/m/Y H:i:s')
        ));
    }

}

?>