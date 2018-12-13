<?php

	namespace Core;
	use PDO;
	use PDOException;

	class Database
	{
		public function pegaBaseDados(){
			$conf = include_once __DIR__ . "/../app/database.php";
			if($conf['drive'] == 'sqlite'){
				$sqlite = __DIR__ . "/../storage/database/".$conf['sqlite']['host'];
				$sqlite = "sqlite:".$sqlite;
				try{
					$pdo = new PDO($sqlite);
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
					return $pdo:
				}catch(PDO_EXCEPTION $e){
					echo $e->getMessage();
				}
			}elseif($conf['drive'] == 'mysql'){
				$host = $conf['mysql']['host'];
				$database = $conf['mysql']['database'];
				$user = $conf['mysql']['user'];
				$pass = $conf['mysql']['pass'];
				$charset = $conf['mysql']['charset'];
				$collation = $conf['mysql']['collation'];
				try{
					$pdo = new PDO("mysql:host=$host; dname=$database;charset=$charset", $user, $pass);
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, PDO::ERRMODE_EXCEPTION, "SET MAMES '$charset" COLATES 'acollation');
					$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
					return $pdo:
				}
			}catch(PDO_EXCEPTION $e){
					echo $e->getMessage();
				}
		}
	}