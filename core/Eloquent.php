<?php
	
	use Illuminate\Database\Capsule\Manager as Capsule;

	$config = require_once __DIR__ . "/../app/Database.php";
	$capsule = new Illuminate\Database\Capsule\Manager;
	if($config['driver'] == 'mysql'){
		$capsule->addConnection([
			    'driver'    => 'mysql',
			    'host'      => $config['mysql']['host'],
			    'database'  => $config['mysql']['database'],
			    'username'  => $config['mysql']['user'],
			    'password'  => $config['mysql']['pass'],
			    'charset'   => $config['mysql']['charset'],
			    'collation' => $config['mysql']['collation'],
			    'prefix'    => '',
			]);
	}elseif($config['driver'] == 'sqlite'){
		$capsule->addConnection([
			    'driver'    => 'sqlite',
			    'database'  => __DIR__ . "/../storege/database/".$config['sqlite']['database']
			]);
	}
	$capsule->setAsGlobal();
	$capsule->bootEloquent();