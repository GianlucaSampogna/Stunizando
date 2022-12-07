<?php
require_once 'config.php';

class Database
{
	private static $conexao;
	public static function getInstance()
	{

		if (!isset(self::$conexao)) {
			try {
				self::$conexao = new PDO('pgsql:host=' . DB_HOST . '; port=' . DB_PORT . '; dbname=' . DB_NAME, DB_USER, DB_PASS);
				//Configurações 
				self::$conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_BOTH);
			} catch (PDOException $e) {
				echo $e->getMessage();
				echo 'Não foi possível conectar ao banco de dados';
			}
		}
		return self::$conexao;
	}
	public static function prepare($sql)
	{
		return self::getInstance()->prepare($sql);
	}
}