<?php

class Sugestao {
	protected $id;
	protected $nome;
	protected $id_usuario;
	protected $link;
	protected $dt_sugestao;
	protected $dt_aprovacao;
	protected $estado_aprovacao;
	protected $email;
	
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function getUsuarioId(){
		return $this->id_usuario;
	}
	
	public function setUsuarioId($id_usuario){
		$this->id_usuario = $id_usuario;
	}
	
	public function getLink(){
		return $this->link;
	}
	
	public function setLink($link){
		$this->link = $link;
	}
	
	public function getDataSugestao(){
		return $this->dt_sugestao;
	}
	
	public function setDataSugestao($dt_sugestao){
		$this->dt_sugestao = $dt_sugestao;
	}
	
	public function getDataAprovacao(){
		return $this->dt_aprovacao;
	}
	
	public function setDataAprovacao($dt_aprovacao){
		$this->dt_aprovacao = $dt_aprovacao;
	}
	
	public function getEstado(){
		return $this->estado_aprovacao;
	}
	
	public function setEstado($estado_aprovacao){
		$this->estado_aprovacao = $estado_aprovacao;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}
}