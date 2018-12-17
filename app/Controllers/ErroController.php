<?php
	
	namespace App\Controllers;
	use Core\Controller;

	class ErroController extends Controller
	{
		/**
		* Metódo que retorna a página ão encontrada
		*@author Lukau Garcia <lukau.dev@gmail.com>
		*@return
		**/
		public function erro_404()
		{
			$this->view->titulo = "Erro 404 - Página Não encontrada";
			$this->rederizarVisao('erros/404', 'layout');
		}

		public function proibido()
		{
			$this->view->titulo = "Proibido - Falta de Permissão";
			$this->rederizarVisao('erros/proibido', 'layout');
		}
	}