<?php
	
	namespace App\Controllers;

	use Core\Models\Classe;
	use Core\Controller;
	use Core\Database;
	use Core\Container;

	class BasicoController extends Controller
	{
		/**
		* Metódo index
		*@author Lukau Garcia <lukau.dev@gmail.com>
		*@return
		**/
		public function index()
		{
			$this->view->titulo = "Bem-vindo ao MpuDi";
			$this->rederizarVisao('index', 'layout');
		}
	}