<?php
	
	/**
	 * @author Lukau Garcia <lukau.dev@gmail.com>
	 */
	
	if(!session_id()) session_start();
	$rotas = require_once __DIR__ . "/../app/routes.php";
	$rota = new \Core\Route($rotas);