<?php 
	function Conectar(){
		$conn=null;
		$host='127.0.0.1';
		$db='integracion';
		$user='root';
		$pwd='';
		try{

			$conn = new PDO('mysql:host='.$host.';dbname='.$db,$user,$pwd);
		}catch(PDOExection $e){
			echo ':(error al conectar la base de datos'.$e;
			exit;
		}

		return $conn;
	}



 ?>