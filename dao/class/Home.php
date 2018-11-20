<?php

class Home {

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
        return $sql->select("SELECT * FROM cados f1 INNER JOIN funcionario f2 ON f1.id_funcionario_os = f2.id_funcionario INNER JOIN status s1 ON f1.id_status_os = s1.id WHERE f1.data_agendamento_os = CURRENT_DATE() ");
    }

// Busca de cadospelo nome, login ou e-mail
    public static function search($pesq) {
        $sql = new Sql();
        return $sql->select("SELECT * FROM cados f1 INNER JOIN funcionario f2 ON f1.id_funcionario_os = f2.id_funcionario INNER JOIN status s1 ON f1.id_status_os = s1.id WHERE f1.data_agendamento_os = CURRENT_DATE() and nome LIKE :NOME OR f1.data_agendamento_os = CURRENT_DATE() AND descricao LIKE :DESCRICAO OR f1.data_agendamento_os = CURRENT_DATE() AND numero_os = :NUMEROOS  ORDER BY nome", array(
            ':NOME' => "%" . $pesq . "%",
            ':DESCRICAO' => "%" . $pesq . "%",
            ':NUMEROOS' => $pesq 
        ));
    }

}
