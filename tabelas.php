<?php

require_once 'db_crud.php';

/**
Objetivo: Classe responsável por representar todas as operações com o cliente do negócio.


Atributos:
$nome- nome do cliente
$sobrenome - sobrenome do cliente
$email - email do cliente
$idade - idade do cliente

Métodos:
insert - insere um cliente na tabela cliente
update - atualiza um cliente na tabela cliente
**/

class Usuario extends CRUD{
	
	protected $table ='usuario';
	
	
	private $nome;
	private $sobrenome;
	private $email;
	private $senha;
	private $celular;
	
	
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}

	public function setSobrenome($sobrenome){
		$this->sobrenome = $sobrenome;
	}
	public function getSobrenome(){
		return $this->sobrenome;
	}

	public function setEmail($email){
		$this->email = $email;
	}
	public function getEmail(){
		return $this->email;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}
	
	public function getSenha(){
		return $this->senha;
	}

	public function setCelular($celular){
		$this->celular = $celular;
	}
	public function getCelular(){
		return $this->celular;
	}
	

	public function insert(){
		$sql="INSERT INTO $this->table (nome,sobrenome,email,senha,celular) VALUES (:nome,:sobrenome,:email,:senha,:celular)";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':sobrenome', $this->sobrenome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':celular', $this->celular);
		return $stmt->execute();
		
	}
	
	public function update($id){
		$sql="UPDATE $this->table SET nome = :nome, sobrenome = :sobrenome, email = :email , celular = :celular WHERE id = :id ";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':sobrenome', $this->sobrenome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':celular', $this->celular);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	public function update_password($id){
		$sql="UPDATE $this->table SET nome = :nome, sobrenome = :sobrenome, email = :email , idade = :idade WHERE id = :id ";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	public function login(){
		$sql="SELECT * FROM $this->table WHERE email = :email";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':email', $this->email);
		$stmt->execute();
		return $stmt->fetch();
	}
	
}

?>