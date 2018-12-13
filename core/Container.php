<?php
	
	/**
	 * @author Lukau Garcia <lukau.dev@gmail.com>
	 */
	
	namespace Core;

	class Container
	{
		public static function newController($controller){
			$objcontroller = "App\\Controllers\\" . $controller;
			return new $objcontroller;
		}

		public static function pegaModel($model){
			$objModel = "\\App\\Models\\" . $model;
			return new $objModel(Database::pegaBaseDados());
		}
	}