<?php

	$rotas[] = ['/', 'HomeController@index'];
	$rotas[] = ['/posts', 'PostsController@index'];
	$rotas[] = ['/post/{id}/show', 'PostsController@show'];

	return $rotas;