<?php
	
	return [
		/**
		* Opções (mysql, sqlite)
		**/
		'driver' => 'sqlite',

		'sqlite' => [
			'host' => 'database.db'
		],

		'mysql' => [
			'host' => 'localhost',
			'database' => '',
			'user' => '',
			'pass' => '',
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci'
		]
	];