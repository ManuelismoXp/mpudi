<?php
	
	/**
	 * @author Lukau Garcia <lukau.dev@gmail.com>
	 */
	
	if(!session_id()) session_start();

	/**
	 * Variavel que recebe todas as rotas do ficheiro /app/routes.php
	 * @var array $rotas
	 */
	$rotas = require_once __DIR__ . "/../app/routes.php";
	$rota = new \Core\Route($rotas);