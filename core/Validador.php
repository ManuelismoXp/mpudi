<?php
	
	/**
	 * @author Lukau Garcia <lukau.dev@gmail.com>
	 */

	namespace Core;

	class Validador
	{
		/**
		* Metódo que faz a validação dos campos de um formulário
		*@param array $dados, array $regras
		*@return 
		**/
		public static function analisa(array $dados, array $regras){
			$erros = null;
			foreach ($regras as $chaveRegra => $valorRegra) {
				foreach ($dados as $chaveDado => $valorDado) {
					if($chaveRegra == $chaveDado){
						$itensValor = [];
						if(strpos($valorRegra, '|')){
							$itensValor = explode('|', $valorRegra);
							foreach ($itensValor as $itemValor) {
								$subItem = [];
								if(strpos($itemValor, ':')){
									$subItem = explode(":", $itemValor);
									switch ($subItem[0]) {
										case 'min':
											if(strlen($valorDado) < $subItem[1]):
												$erros["$chaveRegra"] = 'O campo {$chaveRegra} deve ter no minimo de {$subItem[1]} caracteres.';
											break;
										case 'max':
											if(strlen($valorDado) > $subItem[1]):
												$erros["$chaveRegra"] = 'O campo {$chaveRegra} deve ter no minimo de {$subItem[1]} caracteres.';
											break;
										default:
											break;
									}
								}else{
									switch ($itemValor) {
										case 'required':
											if($valorDado == '' || empty($valorDado))
												$erros["$chaveRegra"] = 'O campo {$chaveRegra} deve ser preenchido.';
											break;
										case 'email':
											if(!filter_var($valorDado, FILTER_VALIDATE_EMAIL))
												$erros["$chaveRegra"] = 'O campo {$chaveRegra} não é válido.';
											break;
										case 'float':
											if(!filter_var($valorDado, FILTER_VALIDATE_FLOAT))
												$erros["$chaveRegra"] = 'O campo {$chaveRegra} só deve ter números reais.';
											break;
										case 'int':
											if(!filter_var($valorDado, FILTER_VALIDATE_INT))
												$erros["$chaveRegra"] = 'O campo {$chaveRegra} só deve ter números inteiros.';
											break;
										case 'boolean':
											if(!filter_var($valorDado, FILTER_VALIDATE_BOOLEAN))
												$erros["$chaveRegra"] = 'O campo {$chaveRegra} só deve booleano.';
											break;
										default:
											break;
									}
								}
							}
						}elseif(strpos($valorRegra, ':')){
							$item = explode(":", $valorRegra);
							switch ($item[0]) {
								case 'min':
									if(strlen($valorDado) < $item[1]):
										$erros["$chaveRegra"] = 'O campo {$chaveRegra} deve ter no minimo de {$subItem[1]} caracteres.';
									break;
								case 'max':
									if(strlen($valorDado) > $item[1]):
										$erros["$chaveRegra"] = 'O campo {$chaveRegra} deve ter no minimo de {$subItem[1]} caracteres.';
									break;
								default:
									break;
							}
						}else{
							switch ($valorRegra) {
								case 'required':
									if($valorDado == '' || empty($valorDado))
										$erros["$chaveRegra"] = 'O campo {$chaveRegra} deve ser preenchido.';
									break;
								case 'email':
									if(!filter_var($valorDado, FILTER_VALIDATE_EMAIL))
										$erros["$chaveRegra"] = 'O campo {$chaveRegra} não é válido.';
									break;
								case 'float':
									if(!filter_var($valorDado, FILTER_VALIDATE_FLOAT))
										$erros["$chaveRegra"] = 'O campo {$chaveRegra} só deve ter números reais.';
									break;
								case 'int':
									if(!filter_var($valorDado, FILTER_VALIDATE_INT))
										$erros["$chaveRegra"] = 'O campo {$chaveRegra} só deve ter números inteiros.';
									break;
								case 'boolean':
									if(!filter_var($valorDado, FILTER_VALIDATE_BOOLEAN))
										$erros["$chaveRegra"] = 'O campo {$chaveRegra} só deve booleano.';
									break;
								default:
									break;
							}
						}
					}
				}
			}
			if($erros){
				Sessao::criar('erros', $erros);
				Session::criar('inputs', $data);
				return true;
			}else{
				Sessao::destruirSessao(['erros', 'inputs']);
				return false;
			}
		}
	}