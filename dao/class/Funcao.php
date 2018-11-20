<?php

/**
 * Description of Funcao
 *
 * @copyright (c) year, Antônio Sousa
 */
class Funcao {

    private $funcao_id;
    private $funcao_descricao;

    function getId() {
        return $this->funcao_id;
    }

    function setId($id) {
        $this->funcao_id = $id;
    }
    
    function getfuncao_descricao() {
        return $this->funcao_descricao;
    }

    function setfuncao_descricao($funcao_descricao) {
        $this->funcao_descricao = $funcao_descricao;
    }

    // Listar Funcão filtrando pelo ID
    public function loadById($id) {
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM funcao WHERE funcao_id = :ID", array(
            ":ID" => $id
        ));

        if (count($results[0]) > 0) {
            $this->setData($results[0]);
        }
        $dados = $results[0];
    }

    // Lista todas as Funcoes cadastradas na tabela
    public static function getFunc($id) {
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM funcao WHERE funcao_id = :ID", array(
            ":ID" => $id
        ));

        return $results;
    }

    // Lista todos as Funcoes cadastradas na tabela
    public static function getList() {
        $sql = new Sql();
        return $sql->select("SELECT * FROM funcao ORDER BY funcao_descricao");
    }

    // Busca de funcao pela funcao_descricao
    public static function search($pesq) {
        $sql = new Sql();
        return $sql->select("SELECT * FROM funcao WHERE funcao_descricao LIKE :DESCRICAO ORDER BY funcao_descricao", array(
                    ':DESCRICAO' => "%" . $pesq . "%"
        ));
    }

    public function setData($data) {
        $this->setId($data['funcao_id']);
        $this->setfuncao_descricao($data['funcao_descricao']);
        $this->setDataCadastro(new DateTime($data['data_cadastro']));
        $this->setDataModify(new DateTime($data['data_modify']));
    }

    public function insert($data) {
        $this->setfuncao_descricao(ucwords(strtolower(utf8_decode($data['funcao_descricao']))));

        $sql = new Sql();
        $sql->query("INSERT INTO funcao (funcao_descricao, data_cadastro) VALUES (:DESCRICAO, NOW())", array(
            ':DESCRICAO' => $this->getfuncao_descricao()
        ));
    }

    public function update($data) {
        $id = $data['funcao_id'];
        $this->setfuncao_descricao(ucwords(strtolower(utf8_decode($data['funcao_descricao']))));

        $sql = new Sql();
        $sql->query("UPDATE funcao SET funcao_descricao = :DESCRICAO, data_modify = NOW() WHERE funcao_id = :ID", array(
            ':ID' => $id,
            ':DESCRICAO' => $this->getfuncao_descricao()
        ));
    }

    public function delete($id) {
        $sql = new Sql();
        $sql->query("DELETE FROM funcao WHERE funcao_id = :ID", array(
            ':ID' => $id
        ));

        $this->setId(0);
        $this->setfuncao_descricao("");
    }

    public function __toString() {
        return json_encode(array(
            "funcao_id" => $this->getId(),
            "funcao_descricao" => $this->getfuncao_descricao(),
            "data_cadastro" => $this->getDataCadastro()->format('d/m/Y H:i:s'),
            "data_modify" => $this->getDataModify()->format('d/m/Y H:i:s')
        ));
    }

}
