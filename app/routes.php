<?php
	
	/**
	 * Ficheiro que contém todas as rotas do sistema. 
	 * Estas rotas deste ficheiro são definidas pelo programador.
	 * @author Lukau Garcia <lukau.dev@gmail.com>
	 */

	$rotas[] = ['/', 'BasicoController@index'];
	$rotas[] = ['/proibido', 'ErroController@proibido'];

	return $rotas;