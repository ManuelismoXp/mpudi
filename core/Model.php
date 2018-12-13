<?php
	
	/**
	 * @author Lukau Garcia <lukau.dev@gmail.com>
	 */
	
	namespace Core;
	use PDO;

	abstract class Model
	{
		private $pdo;
		protected $tabela;

		public function __construct(PDO $pdo){
			$this->pdo = $pdo;
		}

		/**
		 * Metódo que retorna todos os dados de uma tabela
		 * @return array
		 */
		public function todos(){
			$query = "SELECT * FROM {$this->tabela}";
			$stmt = $this->pdo->prepare($query);
			$stmt->execute();
			$resultado = $stmt->fetchAll();
			$stmt->closeCursor();
			return $resultado;
		}

		/**
		 * Metódo que busca um elemento por id
		 * @param  int $id
		 * @return object
		 */
		public function encontraPorId($id){
			$query = "SELECT * FROM {$this->tabela} WHERE id=:id";
			$stmt = $this->pdo->prepare($query);
			$stmt->bindValue(':id', $id);
			$stmt->execute();
			$resultado = $stmt->fetch();
			$stmt->closeCursor();
			return $resultado;
		}

		/**
		 * Metódo que insere uma informação no base de dados
		 * @param  array  $dados
		 * @return boolean
		 */
		public function salvar(array $dados){
			$dados = $this->prepararDadosASalvar($dados);
			$query = "INSERT INTO {$this->tabela} ($dados[0]) VALUES($dados[1])";
			$stmt = $this->pdo->prepare($query);
			for ($i=0; $i < count($dados[2]); $i++) { 
				$stmt->bindValue("{$dados[2][$i]}", $dados[3][$i]);
			}
			$resultado = $stmt->execute();
			$stmt->closeCursor();
			return $resultado;
		}

		/**
		 * Metódo de preparação dos paramentros da query
		 * @param  array  $dados
		 * @return array
		 */
		private function prepararDadosASalvar(array $dados){
			$strChaves = "";
			$strBinds = "";
			$binds = [];
			$valores = [];
			foreach($dados as $chave => $valor){
				$strChaves = "{$strChaves}, {$chave}";
				$strBinds = "{$strBinds},:{$chave}";
				$binds[] = ":{$chave}";
				$values[] = $valor;
			}
			$strChaves = substr($strChaves, 1);
			$strBinds = substr($strBinds, 1);

			return [$strChaves, $strBinds, $binds, $valores];
		}

		/**
		 * Metódo de actualizar dados na base de dados
		 * @param  array  $dados
		 * @param  int $id
		 * @return boolean
		 */
		public function actualizar(array $dados, $id){
			$dados = $this->prepararDadosAActualizar($dados);
			$query = "UPDATE {$this->tabela} SET {$dados[0]} WHERE id=:id";
			$stmt = $this->pdo->prepare($query);
			$stmt->bindValue(':id', $id);
			for ($i=0; $i < count($dados[1]); $i++) { 
				$stmt->bindValue("{$dados[1][$i]}", $dados[2][$i]);
			}
			$resultado = $stmt->execute();
			$stmt->closeCursor();
			return $resultado;
		}

		/**
		 * Metódo de preparação dos paramentros da query
		 * @param  array  $dados
		 * @return array
		 */
		private function prepararDadosAActualizar(array $dados){
			$strChavesBinds = "";
			$binds = [];
			$valores = [];
			foreach($dados as $chave => $valor){
				$strChavesBinds = "{$strChavesBinds},{$chave}=:{$chave}";
				$binds[] = ":{$chave}";
				$values[] = $valor;
			}
			$strChavesBinds = substr($strChavesBinds, 1);

			return [$strChavesBinds, $binds, $valores];
		}

		/**
		 * Metódo que permite eliminar um dado da base de dados
		 * @param  int $id
		 * @return boolean
		 */
		public function eliminar($id){
			$query = "DELETE FROM {$this->tabela} WHERE id=:id";
			$stmt = $this->pdo->prepare($query);
			$stmt->bindValue(':id', $id);
			$resultado = $stmt->execute();
			$stmt->closeCursor();
			return $resultado;
		}

	}