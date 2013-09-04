<?php

include_once 'htdocs/BookmarksPHP/Config/config.php';

class Model extends Config {
	
	var $handle;
	
	function Connect() {
		if(!$this->handle) {
		switch($this->type) {
			case "MySQL":
				$this->handle = mysql_pconnect($this->host,$this->user,$this->password);
				if(!$this->handle) {
					die("Error ao conectar ao servidor<br/>".mysql_error($this->handle));
				}
			break;
		}
	}
	}
	
	function Disconnect() {
		switch ($this->type) {
			case "MySQL":
				mysql_close($this->handle);
				break;
		}
	}
	
	function __construct() {
		$this->Connect();
	}
	
	function __destruct() {
		$this->Disconnect();
	}

	function Query($query) {
		$this->Connect();
		return mysql_query($query, $this->handle);
	}

	function Login($usuario, $senha) {
		$this->Connect();
		$consulta = $this->Query("SELECT * FROM ".$this->login_table." WHERE user='".mysql_real_escape_string($usuario)."'AND password='".mysql_real_escape_string($senha)."'");
		if(mysql_num_rows($consulta) == 1) {
			$resultado = mysql_fetch_assoc($consulta);
			$retorno = Array("Existe" => true,
							"id" => $resultado['id'],
							"nome" => $resultado['nome'],
							"email" => $resultado['email']);
		} else {
			$retorno = Array("Existe" => false);
		}
		
		return $retorno;
	}

}

?>