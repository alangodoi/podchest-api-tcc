<?php 

class Podcast {
	protected $id;
	protected $nome;
	protected $descricao;
	protected $autor_id;
	protected $categoria_id;
	protected $link;
	protected $imagem;

	/*public function __construct($id, $nome, $descricao, $autor_id, $categoria_id, $link, $imagem){
		$this->id = $id;
		$this->nome = $nome;
		$this->descricao = $descricao;
		$this->autor_id = $autor_id;
		$this->categoria_id = $categoria_id;
		$this->link = $link;
		$this->imagem = $imagem;
	}*/

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
	
	public function getDescricao(){
		return $this->descricao;
	}	
	
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	
		public function getAutorId(){
		return $this->autor_id;
	}
	
	public function setAutorId($autor_id){
		$this->autor_id = $autor_id;
	}
	
	public function getCategoriaId(){
		return $this->categoria_id;
	}
	
	public function setCategoriaId($categoria_id){
		$this->categoria_id = $categoria_id;
	}
	
	public function getLink(){
		return $this->link;
	}
	
	public function setLink($link){
		$this->link = $link;
	}
	
	public function getImagem(){
		return $this->imagem;
	}
	
	public function setImagem($imagem){
		$this->imagem = $imagem;
	}
	
}
?>