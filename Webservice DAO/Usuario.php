<?php

class Usuario {
	protected $id;
	protected $firstname;
    protected $lastname;
    protected $email;
	protected $password;
	protected $is_admin;
	protected $is_active;
	protected $action;
	//protected $newpassword;
	
	/*
	public function __construct($id, $firstname, $lastname, $email, $password, $is_admin, $is_active) {
		$this->id = $id;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->email = $email;
		$this->password = $password;
		$this->is_admin = $is_admin;
		$this->is_active = $is_active;
	}
	*/
	
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}
	
	public function getFirstname(){
		return $this->firstname;
	}
	
	public function setFirstname($firstname){
		$this->firstname = $firstname;
	}
	
	public function getLastname(){
		return $this->lastname;
	}
	
	public function setLastname($lastname){
		$this->lastname = $lastname;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}
	
	public function getPassword(){
		return $this->password;
	}
	
	public function setPassword($password){
		$this->password = $password;
	}
	
	public function getIsAdmin(){
		return $this->is_admin;
	}
	
	public function setIsAdmin($is_admin){
		$this->is_admin = $is_admin;
	}
	
	public function getIsActive(){
		return $this->is_active;
	}
	
	public function setIsActive($is_active){
		$this->is_active = $is_active;
	}
	
	public function getAction(){
		return $this->action;
	}
	
	public function setAction($action){
		$this->action = $action;
	}
	
	/*public function getNewPassword(){
		return $this->newpassword;
	}
	
	public function setNewPassword($newpassword){
		$this->newpassword = $newpassword;
	}
	
	*/
	
}

?>