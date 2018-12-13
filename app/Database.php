<?php
	
	/**
	 * @author Lukau Garcia <lukau.dev@gmail.com>
	 */
	
	return [
		/**
		* Conexão com bancos
		**/
		'driver' => 'mysql',

		'sqlite' => [
			'host' => 'database.db'
		],

		'mysql' => [
			'host' => 'localhost',
			'database' => 'reino',
			'user' => 'root',
			'pass' => '',
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci'
		]
	];