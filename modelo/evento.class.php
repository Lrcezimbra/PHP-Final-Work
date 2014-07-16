<?php

class Evento{
	//atributos
	private $idEvento;
	private $nome;
	private $descricao;
	private $local;
	private $data;
	private $horario;
	private $obs;

	//métodos mágicos
	public function __get($atributo){
		return $this->$atributo;	
	}//fecha __get

	public function __set($atributo,$valor){
		$this->$atributo=$valor;
	}//fecha __set
	
	public function __toString(){
		return 'ID Cliente: '.$this->idEvento.
			   '<br />Nome: '.$this->nome.
			   '<br />Descri&ccedil;&atilde;o: '.$this->descricao.
			   '<br />Local: '.$this->local.
			   '<br />Data: '.$this->data.
			   '<br />Hor&aacute;rio: '.$this->horario.
			   '<br />Observações: '.$this->obs;
	}//fecha __toString
}//fecha classe
?>