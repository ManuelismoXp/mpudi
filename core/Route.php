<?php
	
	namespace Core;

	Class Route
	{
		private $rotas;

		public function __construct(array $rotas)
		{
			$this->rotas = $rotas;
			$this->correr();
		}

		/**
		 * Metódo que altera a rota
		 * @author Lukau Garcia <lukau.dev@gmail.com>
		 * @return 
		 */
		private function altRota($rotas)
		{
			foreach ($rotas as $rota) {
				$rotaExplode = explode('@', $rota[1]);
				$r = [$route[0]$rotaExplode[0]$explo]
			}
		}

		/**
		 * Metódo que pega a url digitada pelo utilizador
		 * @author Lukau Garcia <lukau.dev@gmail.com>
		 * @return $url
		 */
		private function pegaUrl()
		{
			$url = str_replace('/mpudi/public', '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
			return $url;
		}

		/**
		 * Metódo que permite executar o projecto
		 * @author Lukau Garcia <lukau.dev@gmail.com>
		 * @return
		 */
		private function correr()
		{
			$url = $this->pegaUrl();
			$urlArray = explode('/', $url);

			foreach ($this->rotas as $rota)
			{
				$rotaArray = explode('/', $rota[0]);
				for($i = 2; $i < count($rotaArray); $i++){
					if((strpos($rotaArray[$i], "{") !== false) && (count($urlArray) == count($rotaArray))){
						$rotaArray[$i] = $urlArray[$i];
					}
					$rota[0] = implode($rotaArray, '/');
				}
				if($url == $rota[0]){
					echo $rota[0]. '<br>';
					echo $rota[1]. '<br>';
				}
			}
		}
	}