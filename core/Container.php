<?php
	
	namespace Core;

	class Container
	{
		public static function newController($controller){
			$objcontroller = "App\\Controllers\\" . $controller;
			return new $objcontroller;
		}
	}