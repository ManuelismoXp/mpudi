<?php
	
	/**
	 * @author Lukau Garcia <lukau.dev@gmail.com>
	 */
	
	namespace Core;

	class Redirect
	{
		/**
		 * Metódo que redireciona para outra página
		 * @param  string $url
		 * @return string 
		 */
		public static function rota($url, $com = []){
			if(count($com) > 0){
				foreach ($com as $chave => $valor) {
					Session::criar($chave, $valor);
				}
			}
			return header("location: $url");
		}
	}