<?php
	
	/**
	 * @author Lukau Garcia <lukau.dev@gmail.com>
	 */
	
	namespace Core;

	class Sessao
	{
		/**
		 * Metódo que permite criar uma sessão
		 * @param  string $chave
		 * @param  string $valor
		 * @return
		 */
		public static function criar($chave, $valor){
			$_SESSION[$chave] = $valor;
		}

		/**
		 * Metódo que permite pegar o valor de uma sessão
		 * @param  string $chave
		 * @return string, boolean
		 */
		public static function pegaSessao($chave){
			if(@$_SESSION[$chave])
				return $_SESSION[$chave];
			return false;
		}

		/**
		 * Metódo que permite destruir uma sessão ou várias sessões
		 * @param  string, array $chave
		 * @return
		 */
		public static function destruirSessao($chaves){
			if(is_array($chaves)){
				foreach ($chaves as $$chave) {
					unset($_SESSION[$chave]);
				}
			}else{
				unset($_SESSION[$chave]);
			}
		}
	}