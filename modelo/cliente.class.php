<?php

class Cliente{
	//atributos
	private $idCliente;
	private $nome;
	private $razaoSocial;
	private $cnpj;
	private $endereco;
	private $telefone1;
	private $telefone2;
	private $email;
	private $site;
	private $obs;
	
	//métodos mágicos
	public function __get($atributo){
		return $this->$atributo;	
	}//fecha __get

	public function __set($atributo,$valor){
		$this->$atributo=$valor;
	}//fecha __set
	
	public function __toString(){
		return '<br />ID Cliente: '.$this->idCliente.
			   '<br />Nome: '.$this->nome.
			   '<br />Raz&atilde;o Social: '.$this->razaoSocial.
			   '<br />CNPJ: '.$this->cnpj.
			   '<br />Endere&ccedil;o: '.$this->endereco.
			   '<br />Telefone 1: '.$this->telefone1.
			   '<br />Telefone 2: '.$this->telefone2.
			   '<br />Email: '.$this->email.
			   '<br />Site: '.$this->site.
			   '<br />Observações: '.$this->obs;
	}//fecha __toString
}//fecha classe
?>