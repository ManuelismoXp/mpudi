<?php
	
	/**
	 * @author Lukau Garcia <lukau.dev@gmail.com>
	 */
	
	namespace Core;

	Class Route
	{
		private $rotas;

		/**
		 * Metódo construtor
		 *@param array $rotas
		 * @return
		 */
		public function __construct(array $rotas)
		{
			$this->altRota($rotas);
			$this->correr();
		}

		/**
		 * Metódo que altera recontroi a url
		 * @return
		 */
		private function altRota($rotas)
		{
			foreach ($rotas as $rota) {
				$rotaExplode = explode('@', $rota[1]);
				$r = [$rota[0], $rotaExplode[0], $rotaExplode[1]];
				$novaRotas[] = $r;
			}
			$this->rotas = $novaRotas;
		}

		/**
		 * Metódo que pega as requisições get que são envidas para o controller
		 * @return
		 */
		private function pegaRequisicao(){
			$obj = new \stdClass;
			foreach ($_GET as $key => $value) {
				$obj->get->$key = $value;
			}
			foreach ($_POST as $key => $value) {
				$obj->post->$key = $value;
			}
			return $obj;
		}

		/**
		 * Metódo que pega a url digitada pelo utilizador
		 * @return $url
		 */
		private function pegaUrl()
		{
			$url = str_replace('/mpudi/public', '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
			return $url;
		}

		/**
		 * Metódo que permite executar o projecto
		 * @return
		 */
		private function correr()
		{
			$url = $this->pegaUrl();
			$urlArray = explode('/', $url);
			foreach ($this->rotas as $rota)
			{
				$rotaArray = explode('/', $rota[0]);
				$param = [];
				for($i = 2; $i < count($rotaArray); $i++){
					if((strpos($rotaArray[$i], "{") !== false) && (count($urlArray) == count($rotaArray))){
						$rotaArray[$i] = $urlArray[$i];
						$param[] = $urlArray[$i];
					}
					$rota[0] = implode($rotaArray, '/');
				}
				if($url == $rota[0]){
					$encontrada = true;
					$controller = $rota[1];
					$accao = $rota[2];
					break;
				}else{
					$encontrada = false;
				}
			}
			if($encontrada){
				$controller = Container::newController($controller);
				switch(count($param)){
					case 1:
						$controller->$accao($param[0], $this->pegaRequisicao());
						break;
					case 2:
						$controller->$accao($para[0], $param[1], $this->pegaRequisicao());
						break;
					case 3:
						$controller->$accao($param[0], $param[1], $param[2], $this->pegaRequisicao());
						break;
					default:
						$controller->$accao($this->pegaRequisicao());
						break;
				}
			}else{
				$controller = Container::newController('ErroController');
				$accao = "erro_404";
				$controller->$accao($this->pegaRequisicao());
			}
		}
	}