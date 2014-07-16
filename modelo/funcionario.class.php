<?php

class Funcionario{
	//atributos
	private $idFuncionario;
	private $nome;
	private $salario;
	private $rg;
	private $cpf;
	private $endereco;
	private $telefone1;
	private $telefone2;
	private $email;
	private $obs;
	
	//métodos mágicos
	public function __get($atributo){
		return $this->$atributo;	
	}//fecha __get

	public function __set($atributo,$valor){
		$this->$atributo=$valor;
	}//fecha __set
	
	public function __toString(){
		return 'ID Funcionario: '.$this->idFuncionario.
			   '<br />Nome: '.$this->nome.
			   '<br />Salario: '.$this->salario.
			   '<br />RG: '.$this->rg.
			   '<br />CPF: '.$this->cpf.
			   '<br />Endere&ccedil;o: '.$this->endereco.
			   '<br />Telefone 1: '.$this->telefone1.
			   '<br />Telefone 2: '.$this->telefone2.
			   '<br />Email: '.$this->email.
			   '<br />Observações: '.$this->obs;
	}//fecha __toString
}//fecha classe
?>