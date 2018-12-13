<?php
	
	namespace App\Controllers;
	use Core\Controller;

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