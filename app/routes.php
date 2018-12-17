<?php
	
	/**
	 * @author Lukau Garcia <lukau.dev@gmail.com>
	 */

	$rotas[] = ['/', 'BasicoController@index'];
	$rotas[] = ['/proibido', 'ErroController@proibido'];

	return $rotas;