<?php

	namespace Core;

	abstract class Controller
	{
		protected $view;
		private $caminhoVisao;
		private $caminhoLayout;

		public function __construct(){
			$this->view = new \stdClass;
		}

		protected function rederizarVisao($caminhoVisao, $caminhoLayout = null)
		{
			$this->caminhoVisao = $caminhoVisao;
			$this->caminhoLayout = $caminhoLayout;
			if($caminhoLayout){
				$this->layout();
			}else{
				$this->content();
			}
		}

		protected function content()
		{
			if(file_exists(__DIR__ . "/../app/Views/{$this->caminhoVisao}.phtml")){
				require_once __DIR__ . "/../app/Views/{$this->caminhoVisao}.phtml";
			}else{
				echo "Error: Visão não encontrada";
			}
		}

		protected function layout()
		{
			if(file_exists(__DIR__ . "/../app/Views/{$this->caminhoLayout}.phtml")){
				require_once __DIR__ . "/../app/Views/{$this->caminhoLayout}.phtml";
			}else{
				echo "Error: Layout não encontrada";
			}
		}
	}