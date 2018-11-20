<?php

class Dashboard {

// Lista todos os Cadastros de O.S cadastrados na tabela
	public static function getList() {
		$sql = new Sql();
		return $sql->select("SELECT os.id_os, os.id_status_os,os.id_funcionario_os, os.numero_os, func.nome, fun.funcao_descricao, sta.descricao, os.data_agendamento_os  FROM cados os 
			JOIN funcionario func 
			ON os.id_funcionario_os = func.id_funcionario
			JOIN status sta 
			ON os.id_status_os = sta.id
			JOIN funcao fun on func.id_funcao = fun.funcao_id
			WHERE os.data_agendamento_os = CURRENT_DATE() AND func.id_funcao = 8 GROUP BY os.id_funcionario_os ORDER BY func.nome");

	}

	// Soma a quantidade de O.S com status Pendente
	
	public static function getResultPentende(){
		$sql = new Sql();

		return $sql->select("SELECT os.numero_os, func.nome, fun.funcao_descricao, sta.descricao, os.data_agendamento_os,
			count(os.id_status_os) from cados os 
			join funcionario func 
			on os.id_funcionario_os = func.id_funcionario
			join status sta 
			on os.id_status_os = sta.id
			join funcao fun on func.id_funcao = fun.funcao_id
			where os.data_agendamento_os = CURRENT_DATE() 
			AND func.id_funcao = 8 AND sta.id = 4  group by os.id_funcionario_os having count(os.id_status_os)"
		);
	}

	public static function getStatusPentende($id){
		$sql = new Sql();

		return $sql->select("SELECT os.id_status_os, count(status) from cados os 
			join funcionario func 
			on os.id_funcionario_os = func.id_funcionario
			join status sta 
			on os.id_status_os = sta.id
			join funcao fun on func.id_funcao = fun.funcao_id
			where os.data_agendamento_os = CURRENT_DATE() AND os.id_funcionario_os = :ID
			AND func.id_funcao = 8 AND sta.id = 4  group by os.id_funcionario_os having count(status)", array(
				":ID" => $id
			));
	}
}
