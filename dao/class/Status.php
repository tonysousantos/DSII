<?php

/**
 * Description of status
 *
 * @copyright (c) year, Antônio Sousa
 */
class Status {

    private $id;
    private $descricao;

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function getDescricao() {
        return $this->descricao;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    // Listar Funcão filtrando pelo ID
    public function loadById($id) {
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM status WHERE id = :ID", array(
            ":ID" => $id
        ));

        if (count($results[0]) > 0) {
            $this->setData($results[0]);
        }
        $dados = $results[0];
    }

    // Lista todas as Status cadastradas na tabela
    public static function getFunc($id) {
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM status WHERE id = :ID", array(
            ":ID" => $id
        ));

        return $results;
    }

    // Lista todos as Status cadastradas na tabela
    public static function getList() {
        $sql = new Sql();
        return $sql->select("SELECT * FROM status ORDER BY descricao");
    }

    // Busca de status pela descricao
    public static function search($pesq) {
        $sql = new Sql();
        return $sql->select("SELECT * FROM status WHERE descricao LIKE :DESCRICAO ORDER BY descricao", array(
                    ':DESCRICAO' => "%" . $pesq . "%"
        ));
    }

    public function setData($data) {
        $this->setId($data['id']);
        $this->setDescricao($data['descricao']);
        $this->setDataCadastro(new DateTime($data['data_cadastro']));
        $this->setDataModify(new DateTime($data['data_modify']));
    }

    public function insert($data) {
        $this->setDescricao(ucwords(strtolower(utf8_decode($data['descricao']))));

        $sql = new Sql();
        $sql->query("INSERT INTO status (descricao, data_cadastro) VALUES (:DESCRICAO, NOW())", array(
            ':DESCRICAO' => $this->getDescricao()
        ));
    }

    public function update($data) {
        $id = $data['id'];
        $this->setDescricao(ucwords(strtolower(utf8_decode($data['descricao']))));

        $sql = new Sql();
        $sql->query("UPDATE status SET descricao = :DESCRICAO, data_modify = NOW() WHERE id = :ID", array(
            ':ID' => $id,
            ':DESCRICAO' => $this->getDescricao()
        ));
    }

    public function delete($id) {
        $sql = new Sql();
        $sql->query("DELETE FROM status WHERE id = :ID", array(
            ':ID' => $id
        ));

        $this->setId(0);
        $this->setDescricao("");
    }

    public function __toString() {
        return json_encode(array(
            "id" => $this->getId(),
            "descricao" => $this->getDescricao(),
            "data_cadastro" => $this->getDataCadastro()->format('d/m/Y H:i:s'),
            "data_modify" => $this->getDataModify()->format('d/m/Y H:i:s')
        ));
    }

}
