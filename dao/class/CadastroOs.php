<?php

class CadastroOs {

    private $id_os;
    private $numero_os;
    private $id_funcionario_os;
    private $id_status_os;
    private $data_agendamento_os;
    private $data_cadastro_os;
    private $data_modify_os;

    function getId_os() {
        return $this->id_os;
    }

    function getNumero_os() {
        return $this->numero_os;
    }

    function getId_funcionario_os() {
        return $this->id_funcionario_os;
    }

    function getId_status_os() {
        return $this->id_status_os;
    }

    function getData_agendamento_os() {
        return $this->data_agendamento_os;
    }

    function getData_cadastro_os() {
        return $this->data_cadastro_os;
    }

    function getData_modify_os() {
        return $this->data_modify_os;
    }

    function setId_os_os($id_os) {
        $this->id_os = $id_os;
    }

    function setNumero_os($numero_os) {
        $this->numero_os = $numero_os;
    }

    function setId_os_funcionario_os($id_funcionario_os) {
        $this->id_funcionario_os = $id_funcionario_os;
    }

    function setId_os_status_os($id_status_os) {
        $this->id_status_os = $id_status_os;
    }

    function setData_agendamento_os($data_agendamento_os) {
        $this->data_agendamento_os = $data_agendamento_os;
    }

    function setData_cadastro_os($data_cadastro_os) {
        $this->data_cadastro_os = $data_cadastro_os;
    }

    function setData_modify_os($data_modify_os) {
        $this->data_modify_os = $data_modify_os;
    }

    // Listar cadosfiltrando pelo ID
    public function loadById($id) {
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM cados WHERE id_os= :ID", array(
            ":ID" => $id
        ));

        if (count($results[0]) > 0) {
            $this->setData($results[0]);
        }
        $dados = $results[0];
    }

// Lista Cadastros de O.S por ID
    public static function getOs($id) {
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM cados WHERE id_os = :ID", array(
            ":ID" => $id
        ));

        return $results;
    }

// Lista todos os Cadastros de O.S cadastrados na tabela
    public static function getList() {
        $sql = new Sql();
        //return $sql->select("SELECT * FROM cadosORDER BY nome");
        return $sql->select("SELECT * FROM cados f1 INNER JOIN funcionario f2 ON f1.id_funcionario_os = f2.id_funcionario INNER JOIN status s1 ON f1.id_status_os = s1.id ORDER BY f2.nome ");
    }

// Busca de cadospelo nome, login ou e-mail
    public static function search($pesq) {
        $sql = new Sql();
        return $sql->select("SELECT * FROM cados f1 INNER JOIN funcionario f2 ON f1.id_funcionario_os = f2.id_funcionario INNER JOIN status s1 ON f1.id_status_os = s1.id WHERE nome LIKE :NOME OR descricao LIKE :DESCRICAO OR numero_os = :NUMEROOS  ORDER BY nome", array(
            ':NOME' => "%" . $pesq . "%",
            ':DESCRICAO' => "%" . $pesq . "%",
            ':NUMEROOS' => $pesq 
        ));
    }

    public function setData($data) {

        $this->setId_os($data['id_os']);
        $this->setNumero_os($data['numero_os']);
        $this->setId_os_funcionario_os($data['id_funcionario_os']);
        $this->setId_os_status_os($data['id_status_os']);
        $this->setData_agendamento_os(new Date($data['data_agendamento_os']));
        $this->setData_cadastro_os(new DateTime($data['data_cadastro_os']));
        $this->setData_modify_os(new DateTime($data['data_modify_os']));
    }

    // Insere Cadastro O.S
    public function insert($data) {
        $this->setNumero_os(($data['numero_os']));
        $this->setId_os_funcionario_os($data['id_funcionario_os']);
        $this->setId_os_status_os($data['id_status_os']);
        $this->setData_agendamento_os($data['data_agendamento_os']);

        $sql = new Sql();
        $sql->query("INSERT INTO cados (numero_os, id_funcionario_os, id_status_os, data_agendamento_os, data_cadastro_os) VALUES (:NUMEROOS, :IDFUNCIONARIO, :IDSTATUS, :DATAAGENDAMENTO, NOW())", array(
            ':NUMEROOS' => $this->getNumero_os(),
            ':IDFUNCIONARIO' => $this->getId_funcionario_os(),
            ':IDSTATUS' => $this->getId_status_os(),
            ':DATAAGENDAMENTO' => $this->getData_agendamento_os()
        ));

        //var_dump($data);
        //exit;
    }

    // Altera dados do funcionário
    public function update($data) {
        $id = $data['id_os'];
        $this->setNumero_os(($data['numero_os']));
        $this->setId_os_funcionario_os($data['id_funcionario_os']);
        $this->setId_os_status_os($data['id_status_os']);
        $this->setData_agendamento_os($data['data_agendamento_os']);
        

        $sql = new Sql();
        $sql->query("UPDATE cados SET numero_os = :NUMEROOS, id_funcionario_os = :IDFUNCIONARIO, id_status_os = :IDSTATUS, data_agendamento_os = :DATAAGENDAMENTO, data_modify_os = NOW() WHERE id_os= :ID", array(
            ':ID' => $id,
            ':NUMEROOS' => $this->getNumero_os(),
            ':IDFUNCIONARIO' => $this->getId_funcionario_os(),
            ':IDSTATUS' => $this->getId_status_os(),
            ':DATAAGENDAMENTO' => $this->getData_agendamento_os()
        ));
    }

    // Deleta Funcionário
    public function delete($id) {
        $sql = new Sql();
        $sql->query("DELETE FROM cados WHERE id_os = :ID", array(
            ':ID' => $id
        ));

        $this->setId_os_os(0);
        $this->setNumero_os(0);
        $this->setId_os_funcionario_os(0);
        $this->setId_os_status_os(0);
        $this->setData_agendamento_os(new DateTime());
        $this->setData_cadastro_os(new DateTime());
        $this->setData_modify_os(new DateTime());
    }

    public function __toString() {
        return json_encode(array(
            "id_os" => $this->getId_os(),
            "numero_os" => $this->getNumero_os(),
            "id_funcionario_os" => $this->getId_funcionario_os(),
            "id_status_os" => $this->getId_status_os(),
            "data_agendamento_os" => $this->getData_agendamento_os()->format('d/m/Y'),
            "fun_data_cadastro" => $this->getDataCadastro()->format('d/m/Y H:i:s'),
            "fun_data_modify" => $this->getDataModify()->format('d/m/Y H:i:s')
        ));
    }

}
